<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory as Faker;
use App\User;

class RegistroClienteTest extends DuskTestCase
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

            /**
             * Escenario: Registro de cliente correcto
             * Dado: que ya ingrese al sistema y estoy en el formulario de registro de cliente
             * Cuando: ingreso las credenciales de forma correcta
             * Entonces: Muestra el mensaje de que el registro fue guardado con éxito.
             */
            
            $browser->loginAs(User::find(1))
                    ->visit('/home')
                    ->clickLink('Clientes')
                    ->clickLink('Agregar un cliente')
                    ->type('nit', $faker->numerify('######-#'))
                    ->type('nombre', $faker->firstName)
                    ->type('apellido', $faker->lastName)
                    ->type('direccion', $faker->address)
                    ->type('telefono', $faker->numerify('########'))
                    ->press('Aceptar')
                    ->assertSee('Cliente agregado exitosamente'); 
        });
    }
}
