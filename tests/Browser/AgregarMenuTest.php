<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory as Faker;
use App\User;

class AgregarMenuTest extends DuskTestCase
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
             * Escenario: agregar orden
             * Dado: estoy registrado 
             * Cuando: ingreso al módulo de orden
             * Entonces: realizo la generación de una orden
             */

            $browser->loginAs(User::find(1))
                    ->visit('/home')
                    ->clickLink('Menu')
                    ->clickLink('Agregar plato al Menu')
                    ->type('plato', $faker->word . ' ' . $faker->word)
                    ->type('descripcion', $faker->sentence)
                    ->type('precio', $faker->numberBetween(8,25))
                    ->press('Aceptar')
                    ->assertSee('Plato agregado exitosamente.'); 
        });
    }
}
