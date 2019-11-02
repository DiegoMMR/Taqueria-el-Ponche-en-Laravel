<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class ModErrClienteTest extends DuskTestCase
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
             * Escenario: Modificación errónea del  registro del cliente 
             * Dado: que ya ingrese al sistema y estoy en el listado de registro de clientes
             * Cuando: damos click en editar y nos muestra el detalle del registro
             * Entonces: dejamos en blanco el campo de nombre y nit 
             * y muestra el mensaje de que no se pueden dejar campos en blanco.
             */
            $browser->visit('/')
                    ->clickLink('Login')
                    ->type('email', 'azure@test.com')
                    ->type('password', 'azure123')
                    ->visit('/home')
                    ->clickLink('Clientes')
                    ->clickLink('Editar')
                    ->type('direccion', '')
                    ->press('Aceptar')
                    ->assertSee('The direccion field is required.'); 
        });
    }
}
