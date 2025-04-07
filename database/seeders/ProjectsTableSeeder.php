<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
           $newProject = new Project();

            $newProject->nome = $faker->sentence(3);
            $newProject->cliente = $faker->company();
            $newProject->type_id = rand(1, 3);
            $newProject->data_inizio = $faker->date();
            $newProject->data_fine = $faker->date();
            $newProject->riassunto = $faker->paragraph(3);

            $newProject->save();
        }
    }
}
