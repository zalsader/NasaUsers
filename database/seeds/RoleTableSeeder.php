<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder {

	private $insertList = [
		['name' => 'admin','display_name' => 'Admin', 'description' => 'Website Admin'],
		['name' => 'volunteer','display_name' => 'Volunteer', 'description' => 'Our Volunteers'],
	];

    public function run() {
    	DB::table('roles')->delete();

    	Role::insert($this->insertList);
    }
}
