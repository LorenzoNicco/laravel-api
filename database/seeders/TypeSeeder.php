<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// utilities
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Sito',
            'Web App',
            'Gestionale',
            'Database Interno',
            'Landing Page',
        ];

        foreach ($types as $type) {
            $newType = Type::create([
                'title' => $type,
                'slug' => Str::slug($type),
            ]);
        }
    }
}
