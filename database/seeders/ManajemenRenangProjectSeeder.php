<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ManajemenRenangProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::updateOrCreate(
            ['link' => 'https://renang.flatama.my.id/'],
            [
                'title' => 'Manajemen Renang',
                'description' => 'Platform pengelolaan kompetisi renang dengan informasi pertandingan, galeri, dan pengenalan olahraga renang.',
                'image_path' => 'https://renang.flatama.my.id/gambar/banner.webp',
            ],
        );
    }
}
