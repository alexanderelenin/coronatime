<?php

namespace Tests\Feature;

use App\Http\Controllers\PasswordController;

use App\Models\User;
use App\Notifications\EmailVerifyNotification;
use DeepCopy\f001\B;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use \Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Password;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    

    public function test_auth_should_give_us_errors_if_input_is_not_provided()
    {
        $response = $this->post(uri:'user-login');
       
        $response->assertSessionHasErrors(
            [
                'email',
                'password',
            ]
        );
    }

    public function test_auth_should_give_us_email_error_if_we_wont_provide_username_or_email_input()
    {
        $response = $this->post(route('login'),[
            'password'=> 'secret-password',
        ]);
        
        
       
        $response->assertSessionHasErrors(
            [
                'email',
               
            ]
        );
        $response->assertSessionDoesntHaveErrors(['password']);
    }

    public function test_auth_should_give_us_password_error_if_we_wont_provide_password_input()
    {
        $response = $this->post(route('login'),[
            'email'=> 'something@redberry.ge',
        ]);
        
        
       
        $response->assertSessionHasErrors(
            [
                'password',
               
            ]
        );

        // $response->assertSessionDoesntHaveErrors(['email']);
    }

    public function test_auth_should_give_us_email_error_when_email_or_username_field_is_not_correct()
    {
        $response = $this->post(route('login'),[
            'email'=> 'somethingredberry.ge',
        ]);
        
        
       
        $response->assertSessionHasErrors(
            [
                'email',
               
            ]
        );
    }

    public function test_auth_should_give_us_incorrect_credentials_error_when_such_user_does_not_exist()
    {
        $response = $this->post(route('login'),[
            'email' => 'sonmething@redberry.ge',
            'password'=>'password',
        ]);

        $response->assertSessionHasErrors([
            'email'=>'Username or email not found',
        ]);
    }

    public function test_auth_should_redirect_to_worldwide_page_after_successful_login()
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

        $response->assertRedirect(route('worldwide'));
    }

    

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('login.index'));
        $response->assertRedirect(route('worldwide'));


    }

    public function test_user_cannot_view_a_signup_form_when_authenticated()
    {
       
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('signup.index'));
        $response->assertRedirect(route('worldwide'));


    }

    public function test_if_user_can_logout()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('logout'));
        $response->assertRedirect(url('/'));
    }

    public function test_if_user_is_not_verified_log_user_out()
    {
        $user = User::factory()->create([
            'email_verified_at'=>null,
        ]);
        
        $response = $this->post(route('login'),[
            'email'=> $user->email,
            'password'=>$user->password,
        ]);
        $response->assertRedirect('/');
        
    }

    public function test_if_user_logs_in_with_incorrect_password()
    {
        $user = User::factory()->create([
            'email'=>'sasha@gmail.com',
            'password'=>'sasha1234'
        ]);
        
        $response = $this->post(route('login'),[
            'email'=> $user->email,
            'password'=>'somepass'
        ]);
        $response->assertSessionHasErrors(['password']);
        
    }

    public function test_it_stores_new_users()
    {
        $response = $this->post(route('user.create'),[
            'username'=> 'sashalenz',
            'email'=> 'sasha@lenz.com',
            'password'=> 'sashalenz',
            'password_confirmation'=> 'sashalenz'
        ]);
        
        $response= $this->get(route('verification.notice'));
        $response->assertSuccessful();
    }

   

   public function test_forgot_password()
   {
    $response = $this->get(route('password.request'));
    $response->assertViewIs('forgot-password');
   }



    public function test_it_queues_a_verification_notification_email()
    {
        
        Notification::fake();

        $this->post(route('user.create'), [
            'email' => 'jonh@doe.com',
            'username'=>'johndoe',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        

        $user = User::firstWhere('email', 'jonh@doe.com');
        Notification::assertSentTo($user, EmailVerifyNotification::class);

        $this->assertFalse($user->hasVerifiedEmail());
        $notification = Notification::sent($user,EmailVerifyNotification::class)->first();

        $activation_url = $notification->toMail($user)->actionUrl;
        
        $this->actingAs($user)->get($activation_url);

        $this->assertTrue($user->hasVerifiedEmail());
    }

    public function test_if_password_reset_is_accesible()
    {
        $this->withoutExceptionHandling();
            User::factory()->create([
            'email'    => 'sasha@elenin.com',
            'password' => bcrypt('password'),
        ]);

        $ressponse = $this->post(route('password.email'),[
            'email'=> 'sasha@elenin.com'
        ]);
        
        $ressponse->assertSessionDoesntHaveErrors(['email']);
        $token = Password::createToken(User::first());

        Event::fake();
        $response = $this->get(route('password.reset', $token)); 

        $response = $this->post(route('password.update'), [
            'email'                       => 'sasha@elenin.com',
            'password'                    => 'passwordnew',
            'password_confirmation'       => 'passwordnew',
            'token'                       => $token,
        ]);

            $response->assertViewIs('password-updated');
    }

    public function test_if_remember_token_works()
    {
        $email = 'sasha@lenz.com';
        $password = 'password';

        $user = User::factory()->create([
            'password'=> bcrypt($password),
            'email'=>$email,
        ]);

        $response = $this->post(route('login'),[
            'email' => $email,
            'password'=>$password,
            'remember_token' => true,
        ]);

        $response->assertRedirect(route('worldwide'));
    }


   
    
}
