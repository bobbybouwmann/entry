<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntryDatabaseSeeder extends Seeder {

    public function run()
    {
        $this->command->comment('A seed that fills the following tables: roles, permissions, permission_role');
        $this->command->line('');

        if ($this->command->confirm('Proceed with the seeding? [Yes|no]'))
        {
            $this->command->line('');
            $this->command->info('Start seeding the database...');

            $this->populateRolesTable();
            $this->command->info('roles table seeded');

            $this->populatePermissionsTable();
            $this->command->info('permissions table seeded');

            $this->populatePermissionRoleTable();
            $this->command->info('permission_role table seeded');

            $this->command->info('Done seeding!');
            $this->command->line('');
        }
    }

    private function populateRolesTable()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'display_name' => 'Admin',
                'description' => 'This user can do everything!'
            ],
            [
                'name' => 'Normal',
                'display_name' => '',
                'description' => ''
            ]
        ]);
    }

    private function populatePermissionsTable()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'users.delete',
                'display_name' => 'Delete users',
                'description' => ''
            ],
            [
                'name' => 'users.edit',
                'display_name' => 'Edit users',
                'description' => ''
            ]
        ]);
    }

    private function populatePermissionRoleTable()
    {
        DB::table('permission_role')->insert([
            [
                'role_id' => 1,
                'permission_name' => 'users.delete'
            ],
            [
                'role_id' => 1,
                'permission_name' => 'users.edit'
            ]
        ]);
    }

}