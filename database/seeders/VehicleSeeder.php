<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Voiture; // Ensure you import the Vehicle model


class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voiture::create([
            'marque' => 'Opel',
            'model' => 'Crossland',
            'matriculG' => 'N/A',
            'matriculL' => 'N/A',
            'matriculS' => 'N/A',
            'compteur' => 0,
            'd_compteur' => now(),
        ]);

        Voiture::create([
            'marque' => 'Nissan',
            'model' => 'Micra',
            'matriculG' => 'N/A',
            'matriculL' => 'N/A',
            'matriculS' => 'N/A',
            'compteur' => 0,
            'd_compteur' => now(),
        ]);

        Voiture::create([
            'marque' => 'Dacia',
            'model' => 'Logan',
            'matriculG' => 'N/A',
            'matriculL' => 'N/A',
            'matriculS' => 'N/A',
            'compteur' => 0,
            'd_compteur' => now(),
        ]);

        Voiture::create([
            'marque' => 'Dacia',
            'model' => 'Stepway',
            'matriculG' => 'ABC',
            'matriculL' => '123',
            'matriculS' => '456',
            'compteur' => 10000,
            'd_compteur' => now(),
        ]);
         Voiture::create([
            'marque' => 'Renault',
            'model' => 'Clio 5',
            'matriculG' => 'DEF',
            'matriculL' => '456',
            'matriculS' => '789',
            'compteur' => 8000,
            'd_compteur' => now(),
        ]);
        Voiture::create([
            'marque' => 'Peugeot',
            'model' => '2019',
            'matriculG' => 'GHI',
            'matriculL' => '789',
            'matriculS' => '012',
            'compteur' => 5000,
            'd_compteur' => now(),
        ]);

        Voiture::create([
                'marque' => 'BMW',
                'model' => 'X5',
                'matriculG' => 'ABC',
                'matriculL' => '123',
                'matriculS' => '564',
                'compteur' => 12000,
                'd_compteur' => now(),
                
            ]);
        Voiture::create([
            'marque' => 'Mercedes',
            'model' => 'C-Class',
            'matriculG' => 'DEF',
            'matriculL' => '567',
                'matriculS' => '905',
                'compteur' => 18500,
                'd_compteur' => now(),
                
            ]);
        Voiture::create([
                'marque' => 'Audi',
                'model' => 'A8',
                'matriculG' => 'GHI',
                'matriculL' => '901',
                'matriculS' => '345',
                'compteur' => 21000,
                'd_compteur' => now(),
                
            ]);
        Voiture::create([
                'marque' => 'Toyota',
                'model' => 'Camry',
                'matriculG' => 'JKL',
                'matriculL' => '345',
                'matriculS' => '789',
                'compteur' => 16000,
                'd_compteur' => now(),
                
            ]);
        Voiture::create([
                'marque' => 'Porsche',
                'model' => '911',
                'matriculG' => 'MNO',
                'matriculL' => '789',
                'matriculS' => '123',
                'compteur' => 8500,
                'd_compteur' => now(),
                
            ]);
       
    }
    }

