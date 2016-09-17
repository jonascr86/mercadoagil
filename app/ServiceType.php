<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Field\FieldModel;

class ServiceType extends Model
{
    use FieldModel;
    
    protected $fillable = ['description'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
