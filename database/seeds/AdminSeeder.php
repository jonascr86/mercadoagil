<?php

use App\User;

class AdminSeeder extends DatabaseSeeder {

	public function run()
	{
		DB::table('users')->truncate();
		DB::table('roles')->truncate();
		DB::table('role_users')->truncate();

		$jonas = Sentinel::registerAndActivate([
			'email' => 'michel@michel.com',
			'password' => '123',
			'first_name' => 'Michel',
			'last_name' => 'de Conto'
		]);
		

		$adminRole = Sentinel::getRoleRepository()->createModel()->create([
			'name' => 'Admin',
			'slug' => 'admin',
      		'permissions' => ['admin' => 1],
		]);

		Sentinel::getRoleRepository()->createModel()->create([
			'name' => 'User',
      		'slug' => 'user',
		]);

		$jonas->roles()->attach($adminRole);
	}
}
