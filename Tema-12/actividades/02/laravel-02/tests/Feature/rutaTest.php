<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class rutaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    //Ruta /test
    public function testTest(): void{
        $response = $this->get('/test');
        $response->assertSee('Juan Jesus, 2º DWES curso 23/24 Prueba');
        $response -> assertStatus(200);
    }

    //Ruta //api/user
    public function testApiUser(): void{
        $response = $this->get('/api/user');
        $response->assertSee('No temo a los ordenadores; lo que temo es quedarme sin ellos');
        $response -> assertStatus(200);
    }

    //Ruta /user/{nombre}/{apellidos}
    public function testUserNombreApellido(){
        $response = $this->get('/user/{$nombre}/{$apellidos}');
        $response->assertSee('{$nombre} {$apellidos}');
        $response -> assertStatus(200);
    }

    //Ruta /user/{id} no obligatorio
    public function testUser(){
        $response = $this->get('/user/{$id}');
        $response->assertSee('Hola {$id}');
        $response -> assertStatus(200);
    }

    //Ruta /user/show/{nombre}/{id}
    public function testShow(){
        $response = $this->get('/user/show/{$nombre}/{$id}');
        $response->assertSee('Cliente {$nombre} y {$id}');
        $response -> assertStatus(200);
    }
}
