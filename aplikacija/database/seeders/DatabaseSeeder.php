<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        TourPackage::truncate();
        Client::truncate();
        Reservation::truncate();
        User::factory(5)->create();
         $a1 = TourPackage::create([
            'name'=>'Biser Mediterana',
            'description'=>'opis 1',
            'transport_type'=>'autobus',
            'destination'=>'Nica',
            'price'=>200.00,
            'date_from'=>'21/08/2023.',
            'date_to'=>'29/08/2023.'
        ]);
        $a2 = TourPackage::create([
            'name'=>'Istocna Evropa',
            'description'=>'opis 2',
            'transport_type'=>'autobus',
            'destination'=>'Moskva',
            'price'=>150.00,
            'date_from'=>'13/10/2023.',
            'date_to'=>'16/10/2023.'
        ]);
        $a3 = TourPackage::create([
            'name'=>'Bliski Istok',
            'description'=>'opis 3',
            'transport_type'=>'avion',
            'destination'=>'Kairo',
            'price'=>100.00,
            'date_from'=>'27/06/2023.',
            'date_to'=>'06/07/2023.'
        ]);
       
        $k1 = Client::create([
            'first_name'=>'Marko',
            'last_name'=>'Markovic',
            'email'=>'marko@example.com',
            'address'=>'adresa 1',
            'phone_number'=>'06512312312',
            'passport_number'=>'12345678',
        ]);
        $k2 = Client::create([
            'first_name'=>'Ivan',
            'last_name'=>'Ivanovic',
            'email'=>'ivan@example.com',
            'address'=>'adresa 2',
            'phone_number'=>'06412312312',
            'passport_number'=>'87654321',
        ]);
        $k3 = Client::create([
            'first_name'=>'Pera',
            'last_name'=>'Peric',
            'email'=>'pera@example.com',
            'address'=>'adresa 3',
            'phone_number'=>'06212312312',
            'passport_number'=>'12341234',
        ]);

        $a1 = Reservation::create([
            'number_of_people'=>3,
            'client_id'=>$k1->client_id,
            'package_id'=>$a2->package_id,
            'user_id'=>2
            
        ]);

        $a2 = Reservation::create([
            'number_of_people'=>2,
            'client_id'=>$k2->client_id,
            'package_id'=>$a2->package_id,
            'user_id'=>1
        ]);

        $a3 = Reservation::create([
            'number_of_people'=>1, 
            'client_id'=>$k3->client_id,
            'package_id'=>$a1->package_id,
            'user_id'=>4
        ]);

        $a4 = Reservation::create([
            'number_of_people'=>3,      
            'client_id'=>$k2->client_id,
            'package_id'=>$a3->package_id,
            'user_id'=>3
        ]);

    }
}
