<?php

namespace Database\Seeders;

use App\Models\Society;
use Illuminate\Database\Seeder;

class SocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Society::create(['society_name' => 'Society1']);
        Society::create(['society_name' => 'Society2']);
        Society::create(['society_name' => 'Society3']);
        Society::create(['society_name' => 'Society4']);
        Society::create(['society_name' => 'Society5']);
        Society::create(['society_name' => 'Society6']);
        Society::create(['society_name' => 'Society7']);
        Society::create(['society_name' => 'Society8']);
        Society::create(['society_name' => 'Society9']);
        Society::create(['society_name' => 'Society10']);
        Society::create(['society_name' => 'Society11']);
        Society::create(['society_name' => 'Society12']);
        Society::create(['society_name' => 'Society13']);
        Society::create(['society_name' => 'Society14']);
        Society::create(['society_name' => 'Society15']);
    }
}
