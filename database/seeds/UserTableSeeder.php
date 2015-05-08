<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder {

    public function run() {
    	DB::table('users')->delete();

    	$user = User::create(['name' => 'admin', 'password' => bcrypt(env('ADMIN_PASSWORD', 'password'))]);
      $user->attachRole(Role::whereName('volunteer')->first());
    }
}
