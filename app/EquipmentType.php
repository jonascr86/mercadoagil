<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Field\FieldModel;

class EquipmentType extends Model
{
    use FieldModel;

    /**
     * Mass assignment: allow attributes
     *
     * @var array
     */
    protected $fillable = ['name', 'product_id', 'equipment_group_id', 'uses_port'];

    /**
     * Retrive all related equipments
     *
     * @return Equipment
     */
    public function equipments()
    {
      return $this->hasMany(Equipment::class);
    }

    /**
     * Retrive related group
     *
     * @return EquipmentGroup
     */
    public function group()
    {
        return $this->belongsTo(EquipmentGroup::class, 'equipment_group_id');
    }

    /**
     * @param EquipmentGroup $grupo
     * @return Lista de tipo de equipamentos, que utiliza o grupo passado por parâmetro
     */
    public static function listarTipoEquipamentoPorGrupo(EquipmentGroup $grupo)
    {
        return EquipmentType::where('equipment_group_id', $grupo->id)->get();
    }
}
