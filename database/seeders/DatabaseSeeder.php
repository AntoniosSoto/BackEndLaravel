<?php

namespace Database\Seeders;

use App\Models\Contacto;
use App\Models\InfoContacto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Contacto::factory(5000)->create();
        InfoContacto::factory()->count(2000)->create();
    }
}
