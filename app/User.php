<?php namespace App;
use Illuminate\Database\Eloquent\Model;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends EloquentUser 
{

	use softDeletes;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	protected $dates = ['deleted_at'];
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'permissions',
        'phone',
        'dob',
        'pic',
        'gender',
        'phone',
        'country',
        'address',
        'zip',
        'activated',
        'facebook',
        'twitter',
        'google_plus',
        'skype',
        'flickr',
        'youtube',
    ];

    public function enderecos()
    {
        return $this->belongsToMany(Endereco::class, 'enderecos_do_usuarios');
    }
}
