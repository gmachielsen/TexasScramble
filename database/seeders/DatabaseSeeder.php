<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Player;

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

        $player = Player::create([
            'name'=>'arno',
            'gender'=>'male',
            'handicap'=>'22.8',
        ]);

        $player = Player::create([
            'name'=>'george',
            'gender'=>'male',
            'handicap'=>'25.5',
        ]);

        $player = Player::create([
            'name'=>'michiel',
            'gender'=>'male',
            'handicap'=>'24.6',
        ]);

        $player = Player::create([
            'name'=>'peter',
            'gender'=>'male',
            'handicap'=>'23.8',
        ]);

        $player = Player::create([
            'name'=>'sylvia',
            'gender'=>'female',
            'handicap'=>'29.2',
        ]);

        $player = Player::create([
            'name'=>'jan',
            'gender'=>'male',
            'handicap'=>'26.5',
        ]);

        $player = Player::create([
            'name'=>'bram',
            'gender'=>'male',
            'handicap'=>'23.2',
        ]);

        $player = Player::create([
            'name'=>'ruud',
            'gender'=>'male',
            'handicap'=>'44',
        ]);

        $player = Player::create([
            'name'=>'leon',
            'gender'=>'male',
            'handicap'=>'18.4',
        ]);

        $player = Player::create([
            'name'=>'bart',
            'gender'=>'male',
            'handicap'=>'24.9',
        ]);

        $player = Player::create([
            'name'=>'ornella',
            'gender'=>'female',
            'handicap'=>'39',
        ]);

    }

}
