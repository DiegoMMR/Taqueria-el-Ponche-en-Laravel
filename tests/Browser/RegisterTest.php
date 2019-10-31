<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory as Faker;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $faker = Faker::create();

        
        $this->browse(function (Browser $browser) use ($faker) {   

            /**Escenario: Registro usuario
             * Dado: Estoy en el formulario de registro
             * Cuando: ingreso todos los datos correctamente
             * Entonces: Crea el usuario e inicia sesión automáticamente  
             * */
            
            $browser->visit('/')
                    ->clickLink('Register')
                    ->type('name', $faker->name)
                    ->type('email', $faker->email)
                    ->type('password', 'rpz1FnvYa0zax')
                    ->type('password_confirmation', 'rpz1FnvYa0zax')
                    ->press('Register')
                    ->assertPathIs('/home');  
                    
        });
    }
}
