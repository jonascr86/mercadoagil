<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Field\FieldContentModel;

class Service extends Model
{
    use FieldContentModel;

    protected $fillable = ['service_type_id', 'uses_credential', 'description'];

    public function type()
    {
        return $this->belongsTo(ServiceType::class);
    }

}
