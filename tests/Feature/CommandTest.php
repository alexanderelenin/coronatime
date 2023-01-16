<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CommandTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_if_fetching_countries_works()
    {
        Http::fake([
            'https://devtest.ge/countries' => Http::response(json_encode([
            [
            'code'=> 'GE',
            'name'=> [
                'ka'=>'საქართველო',
                'en' => 'Georgia',
                ],
            ],
        ])),
        'https://devtest.ge/get-country-statistics'=> Http::response(json_encode([
            'id' =>1,
            'country'=>'Georgia',
            'code' => 'GE',
            'confirmed' => 200,
            'deaths' => 1,
            'recovered' => 37,
        ]),200,['HEADERS'])
    ]);
    $this->artisan('country:fetch')->assertSuccessful();
    }
    
}
