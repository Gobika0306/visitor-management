<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin','superadmin'];

        foreach($roles as $role)
        {
            $list = ['name'=>$role,"guard_name"=>'api'];
            $store = roles::create($list);
        }
    }
}
