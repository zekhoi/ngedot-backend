<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use App\Services\RajaOngkirService;
use App\Models\Province;

class FetchProvincesRajaOngkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:provinces';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch provinces from RajaOngkir API and save to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // only run if the table is empty
        if(DB::table('provinces')->count() > 0) {
            $this->info('Provinces table is not empty, skipping...');
            return;
        }
        
        $apiService = new RajaOngkirService();

        $response = $apiService->fetch('/province');

        if(!$response->successful()) {
            $this->error('Failed to fetch provinces from RajaOngkir API');
            return;
        }

        $provinces = $response['rajaongkir']['results'];

        $this->info('Fetching provinces from RajaOngkir API...');
        $this->info('Total: ' . count($provinces));
        $this->info('Inserting provinces to database...');
        
        foreach($provinces as $province) {
            Province::create([
                'id' => $province['province_id'],
                'name' => $province['province'],
            ]);
        }

        $this->info('Provinces saved to database');
    }
}
