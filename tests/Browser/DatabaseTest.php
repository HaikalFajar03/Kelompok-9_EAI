<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Penduduk;
use App\Models\User;


class DatabaseTest extends DuskTestCase
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
                  ->visit('/dashboard');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/databasependuduk')
                    ->assertSee('Data penduduk')
                    ->assertSee('nama lengkap test');
        });
    }

    public function testtc_dbp_01(): void
    {
        $this->browse(function (Browser $browser) {
            // Search for the ID of the record with 'namalengkap' = 'nama lengkap test'
            $id = Penduduk::where('namalengkap', 'nama lengkap test')->value('id');

            // If the record is found, visit the edit form for that ID
            if ($id) {
                $browser->visit('/editformulirpenduduk/' . $id)
                    ->assertSee('Edit Formulir Data Penduduk')
                    ->assertInputValue('namalengkap', 'nama lengkap test');

                // Change the value of 'namalengkap' field
                $browser->type('namalengkap', 'edit updated')
                    ->scrollTo('button[type="submit"]') // Scroll to the submit button
                    ->script('document.querySelector("button[type=submit]").click();'); // Click the submit button using JavaScript

                // Wait for the page to redirect
                $browser->waitForLocation('/databasependuduk');

                // Check if the success message is displayed
                $browser->assertSee('Data berhasil diperbarui');

                // Check if the updated data is displayed on the databasependuduk page
                $browser->visit('/databasependuduk')
                    ->assertSee('edit updated')
                    ->assertDontSee('nama lengkap test');

                // Check if the data in the database is updated
                $this->assertDatabaseHas('penduduk', [
                    'namalengkap' => 'edit updated'
                ]);
            } else {
                $this->fail('Record not found with namalengkap = "nama lengkap test"');
            }
        });
    }

    public function testtc_dbp_02(): void
    {
        // If the record is found, visit the edit form for that ID
        $this->browse(function (Browser $browser) {
            $browser->visit('/editformulirpenduduk/1')
                ->assertSee('Edit Formulir Data Penduduk');

            // Clear required fields
            $browser->type('namalengkap','')
                ->type('TTL','')
                ->select('gender', '')
                ->select('agama', '')
                ->type('alamat','')
                ->type('phonenumber','')
                ->type('email','')
                ->type('No_ktp','')
                ->select('pendidikan', '')
                ->scrollTo('button[type="submit"]') // Scroll to the submit button
                ->script('document.querySelector("button[type=submit]").click();'); // Click the submit button using JavaScript

            // Assert that it's still on the editformulirpenduduk page
            $browser->assertPathIs('/editformulirpenduduk/1')
                ->assertSee('Edit Formulir Data Penduduk');

            // Assert invalid-feedback alerts for required fields
            $browser->assertVisible('.invalid-feedback');

            // Check if the 'nama lengkap test' is still visible on the page
            $browser->visit('/databasependuduk')
                ->assertSee('nama lengkap test');

            // Check if the data in the database is not changed
            $this->assertDatabaseHas('penduduk', [
                'namalengkap' => 'nama lengkap test'
            ]);
        });
    }

    public function testtc_dbp_03(): void
    {
        // If the record is found, visit the edit form for that ID
        $this->browse(function (Browser $browser) {
            $browser->visit('/editformulirpenduduk/1')
                ->assertSee('Edit Formulir Data Penduduk')
                ->type('namalengkap', 'cancel');

            // click cancel button
            $browser->clickLink('Cancel');

            // Check if it redirects to /databasependuduk
            $browser->assertPathIs('/databasependuduk');

            // Check if 'namalengkap' is 'nama lengkap test' and not 'cancel'
            $browser->assertSee('nama lengkap test')
                ->assertDontSee('cancel');

            // Check if the data in the database is not changed
            $this->assertDatabaseHas('penduduk', [
                'namalengkap' => 'nama lengkap test'
            ]);

            // Check if the database does not have 'namalengkap' as 'cancel'
            $this->assertDatabaseMissing('penduduk', [
                'namalengkap' => 'cancel'
            ]);
        });
    }

    public function testtc_dbp_04(): void
    {
        $this->browse(function (Browser $browser) {
            // Go to /databasependuduk
            $browser->visit('/databasependuduk')
                ->assertSee('Data penduduk');

            // Search the column
            $browser->type('keyword', 'nama lengkap test');

            // Click the dropdown on 'id' = '1' column
            $browser->click('.dropdown-toggle');

            // Click dropdown item hapus
            $browser->clickLink('hapus');

            // Check if the success message is displayed
            $browser->assertSee('Data berhasil dihapus');

            // Check if in /databasependuduk don't see 'namalengkap' = 'nama lengkap edit'
            $browser->assertDontSee('nama lengkap test');

            // Check if in database there is no 'id' = '1'
            $exists = Penduduk::where('id', 1)->exists();
            $this->assertFalse($exists);
        });
    }

    public function testtc_dbp_05(): void
    {
        $this->browse(function (Browser $browser) {
            // Go to /databasependuduk
            $browser->visit('/databasependuduk')
                ->assertSee('Data penduduk');

            // Search the column
            $browser->type('keyword', 'nama lengkap search')
            ->keys('input[name="keyword"]', '{enter}') // Simulate pressing Enter
            ->pause(1000) // Wait for a moment to allow the page to reload
            ->assertSee('TTL search')
            ->assertDontSee('TTL test');

            // Logout
            $browser->visit('/logout')
            ->assertSee('Log In');

        });
    }

    public function testPrecondition2(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                  ->visit('/dashboard');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/databasependuduk')
                    ->assertSee('Data penduduk')
                    ->assertSee('nama lengkap test');
        });
    }

    public function testtc_dbp_06(): void
    {
        $this->browse(function (Browser $browser) {
            // Search for the ID of the record with 'namalengkap' = 'nama lengkap test'
            $id = Penduduk::where('namalengkap', 'nama lengkap test')->value('id');

            // If the record is found, visit the edit form for that ID
            if ($id) {
                $browser->visit('/editformulirpenduduk/' . $id)
                    ->assertSee('Edit Formulir Data Penduduk')
                    ->assertInputValue('namalengkap', 'nama lengkap test');

                // Change the value of 'namalengkap' field
                $browser->type('namalengkap', 'edit updated')
                    ->scrollTo('button[type="submit"]') // Scroll to the submit button
                    ->script('document.querySelector("button[type=submit]").click();'); // Click the submit button using JavaScript

                // Wait for the page to redirect
                $browser->waitForLocation('/databasependuduk');

                // Check if the success message is displayed
                $browser->assertSee('Data berhasil diperbarui');

                // Check if the updated data is displayed on the databasependuduk page
                $browser->visit('/databasependuduk')
                    ->assertSee('edit updated')
                    ->assertDontSee('nama lengkap test');

                // Check if the data in the database is updated
                $this->assertDatabaseHas('penduduk', [
                    'namalengkap' => 'edit updated'
                ]);
            } else {
                $this->fail('Record not found with namalengkap = "nama lengkap test"');
            }
        });
    }

    public function testtc_dbp_07(): void
    {
        // If the record is found, visit the edit form for that ID
        $this->browse(function (Browser $browser) {
            $browser->visit('/editformulirpenduduk/1')
                ->assertSee('Edit Formulir Data Penduduk');

            // Clear required fields
            $browser->type('namalengkap','')
                ->type('TTL','')
                ->select('gender', '')
                ->select('agama', '')
                ->type('alamat','')
                ->type('phonenumber','')
                ->type('email','')
                ->type('No_ktp','')
                ->select('pendidikan', '')
                ->scrollTo('button[type="submit"]') // Scroll to the submit button
                ->script('document.querySelector("button[type=submit]").click();'); // Click the submit button using JavaScript

            // Assert that it's still on the editformulirpenduduk page
            $browser->assertPathIs('/editformulirpenduduk/1')
                ->assertSee('Edit Formulir Data Penduduk');

            // Assert invalid-feedback alerts for required fields
            $browser->assertVisible('.invalid-feedback');

            // Check if the 'nama lengkap test' is still visible on the page
            $browser->visit('/databasependuduk')
                ->assertSee('nama lengkap test');

            // Check if the data in the database is not changed
            $this->assertDatabaseHas('penduduk', [
                'namalengkap' => 'nama lengkap test'
            ]);
        });
    }

    public function testtc_dbp_08(): void
    {
        // If the record is found, visit the edit form for that ID
        $this->browse(function (Browser $browser) {
            $browser->visit('/editformulirpenduduk/1')
                ->assertSee('Edit Formulir Data Penduduk')
                ->type('namalengkap', 'cancel');

            // click cancel button
            $browser->clickLink('Cancel');

            // Check if it redirects to /databasependuduk
            $browser->assertPathIs('/databasependuduk');

            // Check if 'namalengkap' is 'nama lengkap test' and not 'cancel'
            $browser->assertSee('nama lengkap test')
                ->assertDontSee('cancel');

            // Check if the data in the database is not changed
            $this->assertDatabaseHas('penduduk', [
                'namalengkap' => 'nama lengkap test'
            ]);

            // Check if the database does not have 'namalengkap' as 'cancel'
            $this->assertDatabaseMissing('penduduk', [
                'namalengkap' => 'cancel'
            ]);
        });
    }

    public function testtc_dbp_09(): void
    {
        $this->browse(function (Browser $browser) {
            // Go to /databasependuduk
            $browser->visit('/databasependuduk')
                ->assertSee('Data penduduk');

            // Search the column
            $browser->type('keyword', 'nama lengkap test');

            // Click the dropdown on 'id' = '1' column
            $browser->click('.dropdown-toggle');

            // Click dropdown item hapus
            $browser->clickLink('hapus');

            // Check if the success message is displayed
            $browser->assertSee('Data berhasil dihapus');

            // Check if in /databasependuduk don't see 'namalengkap' = 'nama lengkap edit'
            $browser->assertDontSee('nama lengkap test');

            // Check if in database there is no 'id' = '1'
            $exists = Penduduk::where('id', 1)->exists();
            $this->assertFalse($exists);
        });
    }

    public function testtc_dbp_10(): void
    {
        $this->browse(function (Browser $browser) {
            // Go to /databasependuduk
            $browser->visit('/databasependuduk')
                ->assertSee('Data penduduk');

            // Search the column
            $browser->type('keyword', 'nama lengkap search')
            ->keys('input[name="keyword"]', '{enter}') // Simulate pressing Enter
            ->pause(1000) // Wait for a moment to allow the page to reload
            ->assertSee('TTL search')
            ->assertDontSee('TTL test');

            // Logout
            // $browser->visit('/logout')
            // ->assertSee('Log In');

        });
    }
    public function testtc_dbp_11()
{
    $this->browse(function (Browser $browser) {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                  ->visit('/dashboard');
        });

        $browser->visit('/databasependuduk')
            // ->assertSee('Data penduduk')
            ->clickLink('Export All Data')  // Click on the link with the text "Export All Data"
            ->pause(5000)  // Wait for the download to start (adjust as needed)
            ->assertPathIs('/databasependuduk');  // Verify you're still on the same page (adjust as necessary)
        // Define the expected column headers
        $expectedColumnHeaders = [
            'Nama Lengkap',
            'Tempat/Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Alamat Lengkap',
            'Nomor Telepon',
            'Alamat Email',
            'NIK',
            'Pendidikan',
            'Institusi',
            'Jurusan',
            'Tahun masuk',
            'Tahun lulus',
            'Pengalaman Kerja',
            'Bidang',
            'Tahun',
            'Posisi',
        ];

        // Get the path to the downloaded file
        $downloadedFilePath = 'C:/Users/Salma/Downloads/Data.xlsx'; // Update with the actual path

        // Use a library like PhpSpreadsheet to read the Excel file and verify its contents
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($downloadedFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Get the column headers from the first row
        $actualColumnHeaders = [];
        foreach ($sheet->getRowIterator(1, 1) as $row) {
            foreach ($row->getCellIterator() as $cell) {
                $actualColumnHeaders[] = $cell->getValue();
            }
        }

        echo "Actual Column Headers: " . implode(", ", $actualColumnHeaders) . "\n";

        // Assert that each expected column header exists in the actual headers
        foreach ($expectedColumnHeaders as $expectedHeader) {
            $this->assertTrue(in_array($expectedHeader, $actualColumnHeaders));
        }
    });
}
}
