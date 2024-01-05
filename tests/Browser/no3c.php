<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class no3c extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->attach('user_photo', public_path('assets/images/user_default.jpg'))
                    ->type('name', 'John Jhon')
                    ->type('age', 25)
                    ->select('gender', '0')
                    ->type('email', 'bayu@gm.com')
                    ->type('no_telepon', 'a')
                    ->pause(10000)
                    ->type('password', 'password123')
                    ->type('password_confirmation', 'password123')
                    ->type('alamat_lengkap', 'Jl. Maulana Hasanudin Gg....')
                    ->select('id_provinsi', '1')
                    ->select('id_kabupaten_kota', '1')
                    ->select('id_agama', '1')
                    ->pause(2000)
                    ->press('Register')
                    ->assertPathIs('/login');
        });
    }
}
