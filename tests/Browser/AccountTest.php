<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class AccountTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        // Run the dusk seeder
        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\DuskDatabaseSeeder']);
    }

    public function testPrecondition(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/dashboard')
                    ->visit('/logout')
                    ->assertSee('Log In');
        });
    }

    public function testtc_acc_01(): void
    {
        $this->browse(function (Browser $browser) {
            // Log in as user with ID 2 and visit dashboard
            $browser->loginAs(User::find(2))
                    ->visit('/dashboard')
                    ->scrollTo('.navbar') // Scroll to the navbar element
                    ->assertDontSee('Account')
                    ->visit('/pengaturanadmin')
                    ->assertPathIsNot('/pengaturanadmin')
                    ->assertSee('404')
                    ->visit('/logout');

        });
    }
    public function testtc_acc_02(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/dashboard');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/pengaturanadmin')
                    ->assertSee('Account list')
                    ->assertSee('salmatest');
        });

        $this->browse(function (Browser $browser) {
            $users = User::all();

            foreach ($users as $user) {
                $browser->visit('/pengaturanadmin')
                        ->assertSee($user->username)
                        ->assertSee($user->fullname)
                        ->assertSee($user->user_type);
            }
        });
    }
    public function testtc_acc_03(): void
    {
        //SUPER ADMIN
        $this->browse(function (Browser $browser) {
            $browser->visit('/pengaturanadmin')
                ->clickLink('Add member')
                ->assertPathIs('/tambahadmin');

            $browser->type('username','usertest')
                    ->type('fullname','usertestyaa')
                    ->select('user_type', 'Super Admin')
                    ->type('password','test123')
                    ->type('password_confirmation','test123')
                    ->scrollTo('button[type="submit"]')
                    ->script('document.querySelector("button[type=submit]").click();');

            $browser->waitForLocation('/pengaturanadmin');

            $browser->assertSee('Akun berhasil ditambahkan.')
                    ->assertSee('usertest');

            $this->assertDatabaseHas('users', [
                'username' => 'usertest',
                'fullname'=>'usertestyaa',
                'user_type'=> 'Super Admin'
            ]);

            $browser->visit('/logout')
                ->assertSee('Log In');

            $browser->type('username', 'usertest')
            ->type('password', 'test123')
            ->press('Log in');

            $browser->waitForLocation('/dashboard');
            $browser->assertSee('Dashboard');
        });

        //ADMIN
        $this->browse(function (Browser $browser) {
            $browser->visit('/pengaturanadmin')
                ->clickLink('Add member')
                ->assertPathIs('/tambahadmin');

            $browser->type('username','usertest2')
                    ->type('fullname','usertestyaa2')
                    ->select('user_type', 'Admin')
                    ->type('password','test1234')
                    ->type('password_confirmation','test1234')
                    ->scrollTo('button[type="submit"]')
                    ->script('document.querySelector("button[type=submit]").click();');

            $browser->waitForLocation('/pengaturanadmin');

            $browser->assertSee('Akun berhasil ditambahkan')
                    ->assertSee('usertest2');

            $this->assertDatabaseHas('users', [
                'username' => 'usertest2',
                'fullname'=>'usertestyaa2',
                'user_type'=> 'Admin'
            ]);

            $browser->visit('/logout')
                ->assertSee('Log In');

            $browser->type('username', 'usertest2')
            ->type('password', 'test1234')
            ->press('Log in');

            $browser->waitForLocation('/dashboard');
            $browser->assertSee('Dashboard');

            $browser->visit('/logout')
                ->assertSee('Log In');
        });


    }

    public function testtc_acc_04(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/dashboard');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/pengaturanadmin')
                ->clickLink('Add member')
                ->assertPathIs('/tambahadmin');

            //all  kosong
            $browser->type('username','')
                    ->type('fullname','')
                    ->select('user_type', '')
                    ->type('password','')
                    ->type('password_confirmation','')
                    ->scrollTo('button[type="submit"]')
                    ->script('document.querySelector("button[type=submit]").click();');
            $browser->assertPathIs('/tambahadmin')
                    ->assertSee('Tambah Akun');
            $browser->assertVisible('.invalid-feedback');

            //username isi, password isi, konfirm beda
            $browser->type('username','kosong')
                    ->type('password','kosongtest')
                    ->type('password_confirmation','kosongaj')
                    ->scrollTo('button[type="submit"]')
                    ->script('document.querySelector("button[type=submit]").click();');
            $browser->assertPathIs('/tambahadmin')
                    ->assertSee('Tambah Akun');
            $browser->assertVisible('.invalid-feedback');

            $browser->visit('/pengaturanadmin')
                ->assertDontSee('kosong');

            $this->assertDatabaseMissing('users', [
                'username' => 'kosong'
            ]);

        });
    }

    public function testtc_acc_05(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pengaturanadmin')
                ->clickLink('Add member')
                ->assertPathIs('/tambahadmin')
                ->type('username', 'cancel');

            $browser->clickLink('Cancel');
            $browser->assertPathIs('/pengaturanadmin');
            $browser->assertDontSee('cancel');

            $this->assertDatabaseMissing('users', [
                'username' => 'cancel'
            ]);

            $browser->visit('/logout');

        });
    }

    public function testtc_acc_06(): void
    {
        //nyoba login make salmaatest
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('username','salmaatest')
                    ->type('password','password123')
                    ->press('Log in');

            $browser->assertPathIs('/dashboard');
            $browser->visit('/logout');
        });

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/dashboard');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/pengaturanadmin')
                ->assertSee('Account list');

        $browser->click("button[data-delete-id='2']");

        $browser->assertDontSee('salmaatest');
        $this->assertDatabaseMissing('users', [
            'username' => 'salmaatest'
        ]);

        $browser->visit('/logout')
            ->assertSee('Log In')
            ->type('username','salmaatest')
            ->type('password','password123')
            ->press('Log in');

        $browser->assertPathIsNot('/dashboard')
            ->assertSee('Invalid');
        });
    }
}
