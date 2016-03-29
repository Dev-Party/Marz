<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
      /**
       * Ejecutar seed.
       * 
       * @return void
       */
      public function run()
      {
            $cities = [
                  'Avia Terai',
                  'Campo Largo',
                  'Charata',
                  'Colonia Benítez',
                  'Colonia Elisa',
                  'Colonias Unidas',
                  'Comandancia Frías',
                  'Concepción del Bermejo',
                  'Coronel Du Graty',
                  'Corzuela',
                  'El Paranacito',
                  'El Sauzalito',
                  'Fortín Belgrano',
                  'Gancedo',
                  'General José de San Martín',
                  'General Pinedo',
                  'Hermoso Campo',
                  'Horquilla',
                  'Juan José Castelli',
                  'La Clotilde',
                  'La Escondida',
                  'La Leonesa',
                  'La Tigra',
                  'La Verde',
                  'Las Breñas',
                  'Las Garcitas',
                  'Las Palmas',
                  'Los Frentones',
                  'Machagai',
                  'Makallé',
                  'Margarita Belén',
                  'Miraflores',
                  'Misión Nueva Pompeya',
                  'Napenay',
                  'Pampa del Indio',
                  'Pampa del Infierno',
                  'Presidencia de la Plaza',
                  'Presidencia Roca',
                  'Puerto Bermejo',
                  'Puerto Tirol',
                  'Quitilipi',
                  'San Bernardo',
                  'Paraje San Fernando',
                  'Santa Sylvina',
                  'Taco Pozo',
                  'Tres Isletas',
                  'Villa Berthet',
                  'Villa Río Bermejito',
                  'Villa Ángela'
            ];

            for ($i = 0; count($cities) > $i; $i++) {
                  DB::table('cities')->insert(['state_id' => 1, 'name' => $cities[$i]]);
            }
            
      }
}
