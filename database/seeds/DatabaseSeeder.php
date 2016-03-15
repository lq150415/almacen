<?php

use almacen\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'Luis',
            'email' => 'luis',
            'password' => '123456',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
 		User::create([
 		'name' => 'felipe',
            'email' => 'lq150415',
            'password' => bcrypt('1234567'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
    }

}