<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntryDatabaseSeeder extends Seeder {

    public function run()
    {
        $this->comment('A seed that fills the following tables: roles, permissions, permission_role');
        $this->line('');

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
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'display_name' => '',
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
        DB::table('permissions')->truncate();

        DB::table('permissions')->insert([
            [
                'name' => 'Delete users',
                'display_name' => 'Delete users',
                'description' => ''
            ],
            [
                'name' => 'Edit users',
                'display_name' => 'Edit users',
                'description' => ''
            ]
        ]);
    }

    private function populatePermissionRoleTable()
    {
        DB::table('permission_role')->truncate();

        DB::table('permission_role')->insert([
            [
                'role_id' => 1,
                'permission_id' => 1
            ],
            [
                'role_id' => 1,
                'permission_id' => 2
            ]
        ]);
    }

}