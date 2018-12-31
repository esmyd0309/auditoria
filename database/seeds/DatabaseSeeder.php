<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()


    {

        //correr migracion de los roles. con seed
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
       
    }
}
