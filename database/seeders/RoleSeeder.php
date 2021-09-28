<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        // Permisos 
        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2]);

        // Listado usuarios
        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver el listado de usuarios'])->syncRoles([$role1]);
        // Editar usuarios
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un rol'])->syncRoles([$role1]);

        // Listado categorias
        Permission::create(['name' => 'admin.categorias.index',
                            'description' => 'Ver listado de categorias'])->syncRoles([$role1, $role2]);
        // Crear categorias
        Permission::create(['name' => 'admin.categorias.create',
                            'description' => 'Crear categorias'])->syncRoles([$role1]);
        // Editar categorias
        Permission::create(['name' => 'admin.categorias.edit',
                            'description' => 'Editar categorias'])->syncRoles([$role1]);
        // Eliminar Categorias
        Permission::create(['name' => 'admin.categorias.destroy',
                            'description' => 'Eliminar categorias'])->syncRoles([$role1]);

        // Listado etiquetas
        Permission::create(['name' => 'admin.etiquetas.index',
                            'description' => 'Ver listado de etiquetas'])->syncRoles([$role1, $role2]);
        // Crear etiquetas
        Permission::create(['name' => 'admin.etiquetas.create',
                            'description' => 'Crear etiquetas'])->syncRoles([$role1]);
        // Editar etiquetas
        Permission::create(['name' => 'admin.etiquetas.edit',
                            'description' => 'Editar etiquetas'])->syncRoles([$role1]);
        // Eliminar etiquetas
        Permission::create(['name' => 'admin.etiquetas.destroy',
                            'description' => 'eliminar etiquetas'])->syncRoles([$role1]);

        // Listado posts
        Permission::create(['name' => 'admin.posts.index',
                            'description' => 'Ver listado de posts'])->syncRoles([$role1, $role2]);
        // Crear posts
        Permission::create(['name' => 'admin.posts.create',
                            'description' => 'Crear posts'])->syncRoles([$role1, $role2]);
        // Editar posts
        Permission::create(['name' => 'admin.posts.edit',
                            'description' => 'Editar posts'])->syncRoles([$role1, $role2]);
        // Eliminar posts
        Permission::create(['name' => 'admin.posts.destroy',
                            'description' => 'Eliminar posts'])->syncRoles([$role1, $role2]);
    }
}
