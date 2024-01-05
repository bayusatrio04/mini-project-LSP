<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class no4 extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')

                    ->type('email', 'admin@gmail.com')
                    ->type('password', 'admin')
                    ->press('Login')
                    ->pause(2000)
                    ->visit('/admin/dashboard')
                    ->visit('/admin/events')
                    ->visit('/admin/events/create')
                    ->pause(2000)
                    ->type('title', 'Nama Event')
                    ->type('description', 'Deskripsi Event')
                    ->select('category_events[]', [1, 2])
                    ->type('start_date', '2023-12-31T12:00')
                    ->type('end_date', '2023-12-31T18:00')
                    ->type('location', 'Tempat Event')
                    ->type('ticket_price', '100000')
                    ->type('total_tickets', '100')
                    ->attach('image', public_path('assets/images/vip.jpg'))
                    ->attach('video', public_path('assets/images/videos.mp4'))
                    ->press('Create Event')
                    ->pause(5000)
                    ->assertPathIs('/admin/events/');
        });
    }
}
