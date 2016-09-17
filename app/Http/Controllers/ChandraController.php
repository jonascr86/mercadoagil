<?php

namespace App\Http\Controllers;

use View;
use Sentinel;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;

class ChandraController extends Controller
{

    /**
     * Message bag.
     *
     * @var MessageBag
     */
    protected $messageBag = null;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->messageBag = new MessageBag;
    }

    public function showHome()
    {

        if (Sentinel::check()) {
            return view('index');
        }
        else {
            return redirect()->to('login')->with('error', 'You must be logged in!');
        }
    }

    public function showView($name = null)
    {

        if (View::exists('chandra/' . $name)) {
            if(Sentinel::check()) {
                return view('chandra/' . $name);
            }
            else {
                return redirect()->to('login')->with('error', 'You must be logged in!');
            }
        }
        else {
            return view('errors/404');
        }
    }
}
