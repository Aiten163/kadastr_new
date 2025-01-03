<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateServicesSeeder extends Seeder
{

    public function run(): void
    {

        Service::create([
            'name' => 'Вынос границ в натуру',
            'text' => 'Вынос в натуру границ земельного участка – процедура восстановления утраченных межевых знаков, определяющих границы земельного участка. Если у вас на есть кадастровая выписка на ваш земельный участок с координатами и вы не знаете где именно надо установить ограждение – данная услуга для вас.',
            'image' => 'img\services\vinos_graniz_v_naturu.jpg',
            'price'=>'700'
        ]);
        Service::create([
            'name' => 'Технический план',
            'text' => 'Технический план - это чертеж этажа (части этажа) здания, на котором отображен план помещения (квартиры или иного назначения), а также план самого помещения. На нем отражаются стены, перегородки, перемычки, оконные и дверные проемы, лоджии, антресоли и т.д.',
            'image' => 'img\services\plan.jpg',
            'price'=>'6000'
        ]);
        Service::create([
            'name' => 'Межевание',
            'text' => 'Межевание – это комплекс инженерно-геодезических работ по установлению, восстановлению и закреплению на местности границ земельных участков, определению местоположения границ и площади участков, а также юридическому оформлению полученных материалов.',
            'image' => 'img\services\mej.jpg',
            'price'=> '6000'
        ]);
    }
}
