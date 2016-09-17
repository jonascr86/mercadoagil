<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentGroup extends Model
{
    const POP = 1;
    const CPE = 2;
    const ATA = 3;

    protected $fillable = ['name'];

    public static function listDefaults()
    {
        return [
            self::POP => 'POP',
            self::CPE => 'CPE',
            self::ATA => 'ATA',
        ];
    }

    public function equipmentType()
    {
        return $this->hasMany(EquipmentType::class);
    }
}
