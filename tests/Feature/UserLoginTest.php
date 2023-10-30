<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\EventOrganizer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_user_can_login()
    {

        $user = User::first();

        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        $response = $this->actingAs($user)->get('/');
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    public function test_if_guest_can_register(){
        $this->post("/register",[
            "name"=>"saniawan",
            "email"=>"saniawan1998@gmail.com",
            "country"=>"Pakistan",
            "city"=>"Talagang",
            "password"=>Hash::make(Str::random(8)),
        ])->assertRedirect('/');
    }
//
//    public function test_if_eo_can_register(){
//        $pass=Hash::make(Str::random(8));
//        $resp=$this->post("/eo/register",[
//            "name"=>"saniawan",
//            "email"=>"saniawan1998@gmail.com",
//            "country"=>"Pakistan",
//            "city"=>"Talagang",
//            "password"=>$pass,
//            "password_confirmation"=>$pass,
//        ]);
//        $resp->assertRedirect('/eo/dashboard');
//    }
    public function test_if_eo_can_login(){

        $user = EventOrganizer::where("email","saniawan1998@gmail.com")->first();

        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        $response = $this->actingAs($user)->get('/');
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }



}
