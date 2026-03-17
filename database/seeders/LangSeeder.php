<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lang')->insert([
            ['name' => 'Español', 'code' => 'es', 'locale' => 'es_ES', 'active' => true],
            ['name' => 'Catalán', 'code' => 'ca', 'locale' => 'ca_ES', 'active' => true],
            ['name' => 'Inglés', 'code' => 'en', 'locale' => 'en_GB', 'active' => true],
            ['name' => 'Alemán', 'code' => 'de', 'locale' => 'de_DE', 'active' => true],
            ['name' => 'Francés', 'code' => 'fr', 'locale' => 'fr_FR', 'active' => true],
            ['name' => 'Italiano', 'code' => 'it', 'locale' => 'it_IT', 'active' => true],
            ['name' => 'Ruso', 'code' => 'ru', 'locale' => 'ru_RU', 'active' => true],
            ['name' => 'Holandés', 'code' => 'nl', 'locale' => 'nl_NL', 'active' => true],
            ['name' => 'Sueco', 'code' => 'sv', 'locale' => 'sv_SE', 'active' => true],
            ['name' => 'Noruego', 'code' => 'no', 'locale' => 'no_NO', 'active' => true],
        ]);
    }
}