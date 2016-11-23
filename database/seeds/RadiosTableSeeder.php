<?php

use Illuminate\Database\Seeder;

class RadiosTableSeeder extends Seeder
{
      /**
       * Ejecutar seed.
       * 
       * @return void
       */
      public function run()
      {
        DB::table('radios')->insert([
          [
            'name' => '9 de Julio',
            'frequency' => '102.3',
            'state_id' => 1,
            'city_id' => 45,
            'modulation_id' => 2,
            'streaming' => 'http://server.ohradio.com.ar:9906'
          ],
          [
            'name' => 'Ciudad',
            'frequency' => '92.3',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://23.29.123.98:11037/stream'
          ],
          [
            'name' => 'Clan',
            'frequency' => '92.7',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://painel.serveron.com.br:8110/stream'
          ],
          [
            'name' => 'Cordial',
            'frequency' => '104.3',
            'state_id' => 1,
            'city_id' => 12,
            'modulation_id' => 2,
            'streaming' => 'http://190.57.234.67:8038'
          ],
          [
            'name' => 'Cristal',
            'frequency' => '104.3',
            'state_id' => 1,
            'city_id' => 47,
            'modulation_id' => 2,
            'streaming' => 'http://200.58.123.233:5205'
          ],
          [
            'name' => 'Facundo Quiroga',
            'frequency' => '95.8',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://www.turadioenvivo.com:11034/stream'
          ],
          [
            'name' => 'Fan',
            'frequency' => '96.9',
            'state_id' => 1,
            'city_id' => 19,
            'modulation_id' => 2,
            'streaming' => 'http://195.154.167.62:7340'
          ],
          [
            'name' => 'Frontera',
            'frequency' => '93.9',
            'state_id' => 1,
            'city_id' => 25,
            'modulation_id' => 2,
            'streaming' => 'http://188.165.236.90:7288'
          ],
          [
            'name' => 'Futuro',
            'frequency' => '98.9',
            'state_id' => 1,
            'city_id' => 31,
            'modulation_id' => 2,
            'streaming' => 'http://200.58.101.247:8326'
          ],
          [
            'name' => 'Génesis',
            'frequency' => '107.9',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://200.58.118.108:8146/stream'
          ],
          [
            'name' => 'Independencia',
            'frequency' => '98.1',
            'state_id' => 1,
            'city_id' => 3,
            'modulation_id' => 2,
            'streaming' => 'http://s2.netradiofm.com:8060'
          ],
          [
            'name' => 'Isla del Cerrito',
            'frequency' => '106.3',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://200.58.112.14:11310'
          ],
          [
            'name' => 'La Radio',
            'frequency' => '104.7',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://46.105.37.180:8800'
          ],
          [
            'name' => 'La Red',
            'frequency' => '92.9',
            'state_id' => 1,
            'city_id' => 31,
            'modulation_id' => 2,
            'streaming' => 'http://209.133.213.93:41000/stream/1/'
          ],
          [
            'name' => 'Latina',
            'frequency' => '101.1',
            'state_id' => 1,
            'city_id' => 9,
            'modulation_id' => 2,
            'streaming' => 'http://iplinea.com:9730'
          ],
          [
            'name' => 'Libertad',
            'frequency' => '99.3',
            'state_id' => 1,
            'city_id' => 5,
            'modulation_id' => 2,
            'streaming' => 'http://200.58.101.247:8006'
          ],
          [
            'name' => 'Libertad',
            'frequency' => '99.1',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://01.solumedia.com.ar:8378'
          ],
          [
            'name' => 'Mágica',
            'frequency' => '99.9',
            'state_id' => 1,
            'city_id' => 2,
            'modulation_id' => 2,
            'streaming' => 'http://108.163.190.212:9660'
          ],
          [
            'name' => 'Mi Ciudad',
            'frequency' => '94.1',
            'state_id' => 1,
            'city_id' => 2,
            'modulation_id' => 2,
            'streaming' => 'http://01.solumedia.com.ar:8500'
          ],
          [
            'name' => 'Micks',
            'frequency' => '100.1',
            'state_id' => 1,
            'city_id' => 46,
            'modulation_id' => 2,
            'streaming' => 'http://108.163.190.211:9960'
          ],
          [
            'name' => 'Provincia del Chaco',
            'frequency' => '101.5',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://debred5.ecomchaco.com.ar:8000/radioecom'
          ],
          [
            'name' => 'Natagalá',
            'frequency' => '101.5',
            'state_id' => 1,
            'city_id' => 41,
            'modulation_id' => 2,
            'streaming' => 'http://estudio2k1.com:8600'
          ]
        ]);
      }
}
