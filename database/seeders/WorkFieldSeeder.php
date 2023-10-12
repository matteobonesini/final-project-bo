<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\WorkField;
class WorkFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            WorkField::truncate();
        });

        $workFields = [
            "Sviluppatore Web",
            "Sviluppatore Front-end",
            "Sviluppatore Back-end",
            "Sviluppatore Full-stack",
            "Ingegnere del Software",
            "Analista di Dati",
            "Scienziato dei Dati",
            "Amministratore di Sistema",
            "Sviluppatore Mobile",
            "Game Developer",
            "Ingegnere DevOps",
            "Ingegnere QA/QC",
            "Web Designer",
            "Project Manager IT",
            "Architetto del Software",
            "Esperto in Sicurezza Informatica",
            "Analista Business",
            "Sviluppatore Cloud",
            "Ingegnere AI/ML",
            "Analista dei Sistemi",
        ];

        foreach ($workFields as $singleWorkField) {
            $workField = new WorkField();
            $workField->name = $singleWorkField;
            $workField->save();
        }
    }
}
