<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users
        Permission::create([
            'name'  =>  'Navegar Usuario',
            'slug'  =>  'users.index',
            'description'   => 'Lista y navega todo los usuarios del sistema'
        ]);

        //users
        Permission::create([
            'name'  =>  'Ver el detalle del Usuarios',
            'slug'  =>  'users.show',
            'description'   => 'Ver el detalle de cada usuario del sistema'
        ]);

        //users
        Permission::create([
            'name'  =>  'Edicion del Usuarios',
            'slug'  =>  'users.edit',
            'description'   => 'Editar cualquier dato de  un usuario del sistema'
        ]);

        //users
        Permission::create([
            'name'  =>  'Eliminar  Usuario',
            'slug'  =>  'users.destroy',
            'description'   => 'Eliminar cualquier  usuario del sistema'
        ]);

       






        //roles
        Permission::create([
        'name'  =>  'Navegar roles',
        'slug'  =>  'roles.index',
        'description'   => 'Lista y navega todo los roles del sistema'
        ]);

        //roles
        Permission::create([
            'name'  =>  'Ver el detalle del rol',
            'slug'  =>  'roles.show',
            'description'   => 'Ver el detalle de cada roles del sistema'
        ]);
        //roles
        Permission::create([
            'name'  =>  'Creacion de roles',
            'slug'  =>  'roles.create',
            'description'   => 'Crear roles del sistema'
        ]);

        //roles
        Permission::create([
            'name'  =>  'Edicion del roles',
            'slug'  =>  'roles.edit',
            'description'   => 'Editar cualquier dato de  un rol del sistema'
        ]);

        //roles
        Permission::create([
            'name'  =>  'Eliminar  rol',
            'slug'  =>  'roles.destroy',
            'description'   => 'Eliminar cualquier  rol del sistema'
        ]);



        //Plantillas
        Permission::create([
            'name'  =>  'Navegar plantillas',
            'slug'  =>  'plantillas.index',
            'description'   => 'Lista y navega todo los plantillas del sistema'
            ]);
    
        //Plantillas
        Permission::create([
            'name'  =>  'Ver el detalle del plantilla',
            'slug'  =>  'plantillas.show',
            'description'   => 'Ver el detalle de cada plantillas del sistema'
        ]);
        //Plantillas
        Permission::create([
            'name'  =>  'Creacion de plantillas',
            'slug'  =>  'plantillas.create',
            'description'   => 'Crear plantillas del sistema'
        ]);

        //Plantillas
        Permission::create([
            'name'  =>  'Edicion del plantillas',
            'slug'  =>  'plantillas.edit',
            'description'   => 'Editar cualquier dato de  un plantillas del sistema'
        ]);

        //Plantillas
        Permission::create([
            'name'  =>  'Eliminar  plantilla',
            'slug'  =>  'plantillas.destroy',
            'description'   => 'Eliminar cualquier  plantillas del sistema'
        ]);
        

    }
}
