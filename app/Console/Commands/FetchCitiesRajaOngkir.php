<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use App\Services\RajaOngkirService;
use App\Models\City;

class FetchCitiesRajaOngkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(DB::table('cities')->count() > 0) {
            $this->info('Cities table is not empty, skipping...');
            return;
        }
        
        $apiService = new RajaOngkirService();

        $response = $apiService->fetch('/city');

        $cities = $response['rajaongkir']['results'];

        $this->info('Fetching cities from RajaOngkir API...');
        $this->info('Total: ' . count($cities));
        $this->info('Inserting cities to database...');

        foreach($cities as $city) {
            City::create([
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'name' => $city['city_name'],
                'type' => $city['type'],
                'postal_code' => $city['postal_code'],
            ]);
        }

        $this->info('Cities saved to database');
    }
}
