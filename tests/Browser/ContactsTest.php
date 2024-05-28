<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Contact;

class ContactsTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        // Run the dusk seeder
        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\DuskDatabaseSeeder']);
    }
    public function testtc_ktk_06(): void
    {
        // Create a contact to edit
        $contact = Contact::create([
            'name' => 'Old Name',
            'region' => 'Old Region',
            'position' => 'Old Position',
            'phone_number' => '987654321'
        ]);

        $this->browse(function (Browser $browser) use ($contact) {
            $browser->loginAs(User::find(1)) // Assuming user ID 1 is a Super Admin
                    ->visit('/dashboard')
                    ->assertSee('Riwayat')
                    ->visit('/contacts')
                    ->clickLink('Edit')
                    ->assertSee('Edit Kontak')
                    ->type('name', 'Updated Name')
                    ->type('region', 'Updated Region')
                    ->type('position', 'Updated Position')
                    ->type('phone_number', '123123123')
                    ->press('Simpan')
                    ->assertPathIs('/contacts')
                    ->assertSee('Updated Name')
                    ->assertSee('Updated Region')
                    ->assertSee('Updated Position')
                    ->assertSee('123123123');

            // Check if the data in the database is updated
            $this->assertDatabaseHas('contacts', [
                'id' => $contact->id,
                'name' => 'Updated Name',
                'region' => 'Updated Region',
                'position' => 'Updated Position',
                'phone_number' => '123123123'
            ]);
        });
    }

    public function testtc_ktk_01(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1)) // Assuming user ID 1 is a Super Admin
                    ->visit('/dashboard')
                    ->assertSee('Riwayat')
                    ->visit('/contacts')
                    ->clickLink('Tambah Kontak Baru')
                    ->assertSee('Tambah Kontak Baru')
                    ->type('name', 'Test Name')
                    ->type('region', 'Test Region')
                    ->type('position', 'Test Position')
                    ->type('phone_number', '123456789')
                    ->press('Simpan')
                    ->assertPathIs('/contacts')
                    ->assertSee('Test Name')
                    ->assertSee('Test Region')
                    ->assertSee('Test Position')
                    ->assertSee('123456789');

            // Check if the data in the database is created
            $this->assertDatabaseHas('contacts', [
                'name' => 'Test Name',
                'region' => 'Test Region',
                'position' => 'Test Position',
                'phone_number' => '123456789'
            ]);
        });
    }

    
    public function testtc_ktk_05(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1)) // Assuming user ID 1 is a Super Admin
                    ->visit('/dashboard')
                    ->assertSee('Riwayat')
                    ->visit('/contacts')
                    ->clickLink('Tambah Kontak Baru')
                    ->assertSee('Tambah Kontak Baru')
                    ->type('name', 'Test Name')
                    ->type('region', 'Test Region')
                    ->type('position', 'Test Position')
                    ->type('phone_number', 'iowqueioquoiw')
                    ->press('Simpan')
                    ->assertPathIs('/contacts/create'); // Check that the user is still on the same page
    
            // Check if the data in the database is not created
            $this->assertDatabaseMissing('contacts', [
                'name' => 'Test Name',
                'region' => 'Test Region',
                'position' => 'Test Position',
                'phone_number' => 'iowqueioquoiw'
            ]);
        });
    }
    
    public function testtc_ktk_02(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1)) // Assuming user ID 1 is a Super Admin
                    ->visit('/dashboard')
                    ->assertSee('Riwayat')
                    ->visit('/contacts')
                    ->clickLink('Tambah Kontak Baru')
                    ->assertSee('Tambah Kontak Baru')
                    ->type('name', '')
                    ->type('region', 'Test Name')
                    ->type('position', 'Test Position')
                    ->type('phone_number', '081341079601')
                    ->press('Simpan')
                    ->assertPathIs('/contacts/create'); // Check that the user is still on the same page
    
            // Check if the data in the database is not created
            $this->assertDatabaseMissing('contacts', [
                'name' => '',
                'region' => 'Test Region',
                'position' => 'Test Position',
                'phone_number' => '081341079601'
            ]);
        });
    }

    public function testtc_ktk_03(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1)) // Assuming user ID 1 is a Super Admin
                    ->visit('/dashboard')
                    ->assertSee('Riwayat')
                    ->visit('/contacts')
                    ->clickLink('Tambah Kontak Baru')
                    ->assertSee('Tambah Kontak Baru')
                    ->type('name', 'Test Name')
                    ->type('region', '')
                    ->type('position', 'Test Position')
                    ->type('phone_number', '081341079601')
                    ->press('Simpan')
                    ->assertPathIs('/contacts/create'); // Check that the user is still on the same page
    
            // Check if the data in the database is not created
            $this->assertDatabaseMissing('contacts', [
                'name' => 'Test Name',
                'region' => '',
                'position' => 'Test Position',
                'phone_number' => '081341079601'
            ]);
        });
    }

    public function testtc_ktk_04(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1)) // Assuming user ID 1 is a Super Admin
                    ->visit('/dashboard')
                    ->assertSee('Riwayat')
                    ->visit('/contacts')
                    ->clickLink('Tambah Kontak Baru')
                    ->assertSee('Tambah Kontak Baru')
                    ->type('name', 'Test Name')
                    ->type('region', 'Test Name')
                    ->type('position', '')
                    ->type('phone_number', '081341079601')
                    ->press('Simpan')
                    ->assertPathIs('/contacts/create'); // Check that the user is still on the same page
    
            // Check if the data in the database is not created
            $this->assertDatabaseMissing('contacts', [
                'name' => 'Test Name',
                'region' => 'Test Region',
                'position' => '',
                'phone_number' => '081341079601'
            ]);
        });
    }
    public function testtc_ktk_07(): void
    {
        // Create a contact to delete
        $contact = Contact::create([
            'name' => 'Delete Name',
            'region' => 'Delete Region',
            'position' => 'Delete Position',
            'phone_number' => '555555555'
        ]);
    
        $this->browse(function (Browser $browser) use ($contact) {
            $browser->loginAs(User::find(1)) // Assuming user ID 1 is a Super Admin
                    ->visit('/dashboard')
                    ->assertSee('Riwayat')
                    ->visit('/contacts')
                    ->script('window.confirm = function () { return true; }'); // Override the confirm function to always return true
            $browser->click('@delete-contact-' . $contact->id)
                    ->assertPathIs('/contacts')
                    ->assertDontSee('Delete Name')
                    ->assertDontSee('Delete Region')
                    ->assertDontSee('Delete Position')
                    ->assertDontSee('555555555');
    
            // Check if the data in the database is deleted
            $this->assertDatabaseMissing('contacts', [
                'id' => $contact->id
            ]);
        });
    }
    public function testTambahan(): void
        {
            $this->browse(function (Browser $browser) {
                $browser->loginAs(User::find(1)) // Assuming user ID 1 is a Super Admin
                        ->visit('/dashboard')
                        ->assertSee('Riwayat')
                        ->visit('/logout')
                        ->assertSee('Log In');
            });
        }
}