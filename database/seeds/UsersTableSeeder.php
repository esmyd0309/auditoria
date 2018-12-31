<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,1)->create();

        Role::Create([
            'name'      =>  'Admin',
            'slug'      =>  'admin',
            'special'   =>  'all-access'
        ]);
    }
}
