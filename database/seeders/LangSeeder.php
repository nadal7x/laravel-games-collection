<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lang')->insert([
            ['nombre' => 'Español', 'code' => 'es', 'locale' => 'es_ES', 'active' => true, 'default' => true],
            ['nombre' => 'Catalán', 'code' => 'ca', 'locale' => 'ca_ES', 'active' => true, 'default' => false],
            ['nombre' => 'Inglés', 'code' => 'en', 'locale' => 'en_GB', 'active' => true, 'default' => false],
            ['nombre' => 'Alemán', 'code' => 'de', 'locale' => 'de_DE', 'active' => true, 'default' => false],
            ['nombre' => 'Francés', 'code' => 'fr', 'locale' => 'fr_FR', 'active' => true, 'default' => false],
            ['nombre' => 'Italiano', 'code' => 'it', 'locale' => 'it_IT', 'active' => true, 'default' => false],
            ['nombre' => 'Ruso', 'code' => 'ru', 'locale' => 'ru_RU', 'active' => true, 'default' => false],
            ['nombre' => 'Holandés', 'code' => 'nl', 'locale' => 'nl_NL', 'active' => true, 'default' => false],
            ['nombre' => 'Sueco', 'code' => 'sv', 'locale' => 'sv_SE', 'active' => true, 'default' => false],
            ['nombre' => 'Noruego', 'code' => 'no', 'locale' => 'no_NO', 'active' => true, 'default' => false],
        ]);
    }
}