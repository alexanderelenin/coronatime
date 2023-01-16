<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Country;
use Tests\TestCase;

class SessionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    

    public function test_login_page_is_accessible()
    {
        $response = $this->get(uri:'/user-login');
        $response->assertSuccessful();
        $response->assertViewIs(value:'login');
    }

    public function test_sign_up_page_is_accessible()
    {
        $response = $this->get(uri:'sign-up');
        $response->assertSuccessful();
        $response->assertViewIs(value:'sign-up');
    }

    public function test_by_country_page_is_accessible()
    {

        $email = 'something@redberry.ge';
        $password = 'password';
        User::factory()->create(
            [   
                
                'email'=> $email,
                'password'=> bcrypt($password),
                
            ]
        );
        $response = $this->post(route('login'),[
            'email' => $email,
            'password'=>$password,
        ]);
        
        $response = $this->get(route('by.country'));
      
        $response->assertViewIs(value:'by-country');
    }

    public function test_worldwide_page_is_accessible()
    {

        $email = 'something1@redberry.ge';
        $password = 'password';
        User::factory()->create(
            [   
                
                'email'=> $email,
                'password'=> bcrypt($password),
                
            ]
        );
        $response = $this->post(route('login'),[
            'email' => $email,
            'password'=>$password,
        ]);
        
        $response = $this->get(route('worldwide'));
      
        $response->assertViewIs(value:'worldwide');
    }

    public function test_if_countries_can_be_searched()
    {
        $user = User::factory()->create();
        $country = Country::create([
            'code'=> 'GE',
            'name'=> [
                'ka'=>'საქართველო',
                'en' => 'Georgia',
                ],
            'new_cases' => 200,
            'deaths' => 1,
            'recovered' => 37,
            

            ]);

            $country = Country::create([
                'code'=> 'AZ',
                'name'=> [
                    'ka'=>'აზერბაიჯანი',
                    'en' => 'Azerbaijan',
                    ],
                'new_cases' => 200,
                'deaths' => 1,
                'recovered' => 37,
                
    
                ]);

        $response = $this->actingAs($user)->post('/by-country/countries',[
            'search'=> 'Ge'
        ]);
        $response->assertSee('Georgia');
        $response->assertDontSee('Azerbaijan');
        $response->assertSuccessful();
    }

    public function test_changin_language()
    {
        $response = $this->get('/change-locale/ka');
        $response->assertRedirect('/');
        $response->assertSessionHas('lang', 'ka');
    }

    public function test_changin_language_not_supported()
    {
        $response = $this->get('/change-locale/ge');
        $response->assertRedirect('/');
        $response->assertSessionHas('lang', 'en');
    }
    public function test_if_countries_can_be_sorted()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('statistics/by-country?column=new_cases&order=desc');
        $response->assertSuccessful();
    }
}
