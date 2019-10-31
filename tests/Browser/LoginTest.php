<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {


            /**
             * Escenario: Login correcto
             * Dado: Estoy en la página de inicio y no estoy logueado
             * Cuando: ingreso mis credenciales y presiono el boton de login
             * Entonces: ingresó al sistema
             */

            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'azure@test.com')
                    ->type('password', 'azure123')
                    //->type('email', 'diego.mz.rv@gmail.com')
                    //->type('password', 'rpz1FnvYa0zax')
                    ->press('Login')
                    ->assertPathIs('/home');
                    // el-ponche/public/home
                    // ->assertSee('Bienvenido');
        });
    }
}
