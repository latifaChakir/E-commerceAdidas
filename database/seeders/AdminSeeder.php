<?php

namespace Database\Seeders;

use App\Models\Permessions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsCount = Permessions::count();
        dd($permissionsCount);

        $role=new Role();
        $role->name='Admin';
        $role->save();
        $i=1;
       while($i<= $permissionsCount){
            $role->belongsToMany(Permessions::class, 'role_permissions', 'id_role', 'id_permissions')->attach($i);
            $i=$i+1;
        }

         User::create([
            'name' => 'Admin',
            'email' => 'a@a.com',
            'password' => bcrypt('1234'), 
            'id_role' => '1', 
        ]);
    }
}
