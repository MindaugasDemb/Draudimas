<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reg1=array('ABC','DEF','DRH','KRB','JWF','HDT','MJE','ASD','GHB','URE','AER','UGY');
        //$reg2=array('453','765','465','374','753','752','566','379','942','835','741','652');
        $cars=array(
            array('Lancia','Delta'),
            array('Audi','A6'),
            array('Audi','A4'),
            array('Audi','A3'),
            array('BMW','3 series'),
            array('BMW','5 series'),
            array('BMW','1 series'),
            array('Dodge','Challenger'),
            array('Dodge','Charger'),
            array('Ford','Focus'),
            array('Ford','Fiesta'),
            array('Ford','Mondeo'),
            array('Ford','Transit'),
            array('Ford','Mustang'),
            array('Volkswagen','Passat'),
            array('Volkswagen','Golf'),
        );
        $rand_car = array_rand($cars, 1);
        $rand_reg = $reg1[array_rand($reg1, 1)]." ".rand(100,999);
        return [
            'reg_number'=>$rand_reg,
            'brand'=>$cars[$rand_car][0],
            'model'=>$cars[$rand_car][1]
        ];
    }
}
