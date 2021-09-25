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
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        // Listado usuarios
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        // Crear usuarios
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        // Editar 
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        // Listado categorias
        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1]);
        // Crear categorias
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$role1]);
        // Editar categorias
        Permission::create(['name' => 'admin.categorias.edit'])->syncRoles([$role1]);
        // Eliminar Categorias
        Permission::create(['name' => 'admin.categorias.destroy'])->syncRoles([$role1]);

        // Listado etiquetas
        Permission::create(['name' => 'admin.etiquetas.index'])->syncRoles([$role1]);
        // Crear etiquetas
        Permission::create(['name' => 'admin.etiquetas.create'])->syncRoles([$role1]);
        // Editar etiquetas
        Permission::create(['name' => 'admin.etiquetas.edit'])->syncRoles([$role1]);
        // Eliminar etiquetas
        Permission::create(['name' => 'admin.etiquetas.destroy'])->syncRoles([$role1]);

        // Listado posts
        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2]);
        // Crear posts
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);
        // Editar posts
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);
        // Eliminar posts
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1, $role2]);
    }
}
