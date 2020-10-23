<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::truncate();
        $adminRole = Role::create(['name'=>'admin']);

        $admin = User::create([
            'name'=>'admin',
            'email'=>'g.machielsen@gmail.com',
            'password'=>bcrypt('Bartje83!'),
            'email_verified_at'=>NOW()
        ]);

        $admin->roles()->attach($adminRole);
    }
}
