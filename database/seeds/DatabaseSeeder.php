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
            'NOM_USU' => 'Luis',
            'APA_USU' => 'Quisbert',
            'AMA_USU' => 'Quispe',
            'ARE_USU' => 'TI',
            'CAR_USU' =>'Pasante',
            'CI_USU' =>'7074342',
            'NIV_USU' => '0',
            'NIC_USU' =>'7074342',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
 		User::create([
 		    'NOM_USU' => 'Felipe',
            'APA_USU' => 'Quisbert',
            'AMA_USU' => 'Quispe',
            'ARE_USU' => 'TI',
            'CAR_USU' =>'Pasante',
            'CI_USU' =>'9959333',
            'NIV_USU' => '2',
            'NIC_USU' =>'9959333',
            'password' => bcrypt('abc123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
    }

}