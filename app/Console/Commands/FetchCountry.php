<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCountry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'country:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch countries list';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = Http::get('https://devtest.ge/countries');

        
        $countries = json_decode($data);
        foreach($countries as $countryData){
            $statistics = Http::post('https://devtest.ge/get-country-statistics',[
                "code" => $countryData->code
            ])->json();
            Country::updateOrCreate(["code" => $countryData->code],[
                'name' => [
                    'en' => $countryData->name->en,
                    'ka' => $countryData->name->ka,
                 ],
                "code" => $countryData->code,
                "new_cases" => $statistics['confirmed'],
                "recovered" => $statistics['recovered'],
                "deaths" => $statistics['deaths'],
            ]);
           
            
        }
    }
}
