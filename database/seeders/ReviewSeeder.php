<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


// Models
use App\Models\Review;
use App\Models\Developer;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('data');

        Schema::withoutForeignKeyConstraints(function () {
            Review::truncate();
        });

        $recensioni = [
            0 => "Eccellente lavoro di sviluppo web! Hanno consegnato il progetto in tempo e con la massima qualità.",
            1 => "Il team è altamente competente e professionale. Li raccomanderei a chiunque.",
            2 => "Servizio rapido e efficiente. Hanno risolto i nostri problemi in modo impeccabile.",
            3 => "Siamo estremamente soddisfatti del lavoro svolto. Hanno superato le nostre aspettative.",
            4 => "Ottimo supporto tecnico. Risolvono ogni problema in un battito di ciglia.",
            5 => "Hanno creato un sito web eccezionale per la nostra azienda. Grazie mille!",
            6 => "Sono dei veri esperti nel campo dell'informatica. Servizio di alta qualità.",
            7 => "Lavoro straordinario! Non potevamo chiedere di meglio per il nostro progetto web.",
            8 => "Servizio affidabile e professionale. Sempre pronti ad aiutare.",
            9 => "Hanno reso il nostro sito web molto più veloce e sicuro. Li consigliamo vivamente.",
            10 => "Grande attenzione ai dettagli e consegna puntuale. Non potremmo essere più felici.",
            11 => "Abbiamo ottenuto un sito web sorprendente grazie al loro talento e alla loro dedizione.",
            12 => "Sempre pronti ad affrontare le sfide più complesse. Ottimi professionisti!",
            13 => "Servizio clienti eccezionale e risultati straordinari. Li ringraziamo molto.",
            14 => "Ci hanno aiutato a ottimizzare il nostro software. Consigliamo vivamente il loro servizio.",
            15 => "Il nostro progetto è stato gestito in modo impeccabile. Siamo molto grati per il loro lavoro.",
            16 => "Hanno superato le nostre aspettative in ogni modo. Li sceglieremmo di nuovo.",
            17 => "Professionisti altamente qualificati. Servizio di prima classe.",
            18 => "Lavoro di qualità superiore. Li raccomandiamo a tutti coloro che cercano servizi IT.",
            19 => "Hanno risolto tutti i nostri problemi in modo efficiente. Siamo molto soddisfatti."
        ];

        $count = count($data);
        for ($i=1; $i <= $count; $i++) { 
            for ($j=0; $j < rand(1, 30); $j++) { 
                $review = new Review();
                $review->developer_id = $i;
                $review->customer_name = fake()->name;
                $review->description = $recensioni[rand(0, 19)];
                $review->save();

                $developer = Developer::find($i);
                $vote = rand(1, 5);
                $developer->votes()->attach($vote);
            }
        }
    }
}