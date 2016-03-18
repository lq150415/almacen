<?php

use almacen\Rubro;
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

        $this->call('RubroTableSeeder');
        $this->command->info('User table seeded!');

        Model::reguard();
    }
}

class RubroTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros')->delete();

        Rubro::create([
            'NOM_RUB' => 'Material de escritorio',
            'DES_RUB' => 'Es una coleccion de material de escritorio basico',
            'CPR_RUB' => '10',
            'ID_ALM' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
 		Rubro::create([
 		    'NOM_RUB' => 'Material de limpieza',
            'DES_RUB' => 'Es una coleccion de material de limpieza basico',
            'CPR_RUB' => '15',
            'ID_ALM' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
    }

}