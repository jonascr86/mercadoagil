<?php

namespace App\Http\Controllers;

use Sentinel;
use App\Pool;
use App\TipoDePool;
use Illuminate\Http\Request;
use App\Http\Requests\PoolRequest;

class PoolController extends Controller
{

    public function __construct()
    {
        $this->middleware('SentinelAdmin', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of Pools.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pools = Pool::query();
        if ($request->input('tipo_pool')) {
            $pools->where('id_tipo_pool', $request->input('tipo_pool'));
        }
        if ($request->input('filter-only') ) {
            if ($request->input('filter-only') == 'reservados') {
                $pools->where('reservado', 1);
            } elseif ($request->input('filter-only') == 'em_uso') {
                $pools->where('utilizado', 1);
            }
        }
        $pools = $pools->get();
        $is_admin = Sentinel::inRole('admin');
        return view('pool/index', compact('pools', 'is_admin'));
    }

    /**
     * Show the form for creating a new Pool.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposPool = TipoDePool::lists('descricao', 'id');

        return view('pool/create', compact('tiposPool'));
    }

    /**
     * Apply filters to Pool form request.
     *
     * @param  array
     * @return array
     */
    protected function filterPools($pools)
    {
        $filters = [';', PHP_EOL];
        foreach ($filters as $filter) {
            foreach ($pools as $key => $pool) {
                unset($pools[$key]);
                $arr = explode($filter, $pool);
                foreach ($arr as $p) {
                    $pools[] = trim($p);
                }
            }
        }
        return $pools;
    }

    /**
     * Store a newly created Pool in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PoolRequest $request)
    {
        $pools = $this->filterPools([$request->input('pools')]);

        $count = 0;
        $duplicadas = [];
        foreach ($pools as $pool) {
            if (!$pool) {
                continue;
            }
            $newPool = Pool::firstOrNew([
                'id_tipo_pool' => $request->input('id_tipo_pool'),
                'descricao' => $pool
            ]);
            if (!$newPool->id) {
                $count++;
                $newPool->reservado = false;
                $newPool->utilizado = false;
                $newPool->save();
            }else{
                $duplicadas[] = $pool;
            }
        }

        $return = redirect()->route('pool.index');
        if($count > 0){
            $return->with('success', trans('pool/message.success.create', compact('count')));
        }
        if(count($duplicadas)){
            $duplicadas = implode(', ', $duplicadas);
            $return->with('warning', trans('pool/message.duplicated', compact('duplicadas')));
        }

        return $return;
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {
        $pool = Pool::findOrFail($id);
        $pool->reservado = $request->input('reservado');
        $pool->save();
        return response()->json([
            'success' => true
        ]);
    }

}
