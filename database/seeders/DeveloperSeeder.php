<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Developer;
use App\Models\WorkField;
use App\Models\User;
// Facades
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('data');

        Schema::withoutForeignKeyConstraints(function () {
            Developer::truncate();
            DB::table('developer_vote')->truncate();
            DB::table('developer_work_field')->truncate();
            DB::table('developer_sponsorship')->truncate();
        });
        if (Storage::exists('uploads/imgs')) {
            Storage::deleteDirectory('uploads/imgs');
        }
        Storage::makeDirectory('uploads/imgs');

        for ($i=0; $i < count($data); $i++) { 
            $url = $data[$i]['picture']['large'];
            $img = storage_path('app/public/uploads/imgs/image'.$i.'.jpg');
            file_put_contents($img, file_get_contents($url));
        }

        $imgs = Storage::files("uploads/imgs");

        $descriptions = [
            "Sviluppatore Web con oltre 5 anni di esperienza nella creazione di siti web responsive e applicazioni web interattive. Competenze avanzate in HTML, CSS, JavaScript e framework come React e Angular. Esperienza nel lavoro con team multidisciplinari per la realizzazione di progetti web di successo.",
            "Sviluppatore Front-end con competenze approfondite nella progettazione e nell'implementazione di interfacce utente coinvolgenti e intuitive. Forte esperienza in HTML, CSS e JavaScript, con un focus sulla performance e sull'ottimizzazione per vari dispositivi e browser. Dimostrata capacità di collaborazione con designer e sviluppatori back-end per produrre esperienze web di alta qualità.",
            "Sviluppatore Back-end con oltre 7 anni di esperienza nello sviluppo di sistemi server-side scalabili e robusti. Competenze avanzate in linguaggi come Python, Java e PHP, nonché nella gestione di database SQL e NoSQL. Abituato a lavorare su progetti complessi che richiedono prestazioni elevate e sicurezza dei dati.",
            "Sviluppatore Full-stack con una solida base in sviluppo front-end e back-end. Esperienza nell'utilizzo di tecnologie come Node.js, React e MongoDB per creare applicazioni complete. Dimostrata capacità di gestire l'intero ciclo di sviluppo, dalla progettazione all'implementazione.",
            "Ingegnere del Software con oltre 10 anni di esperienza nella progettazione e nello sviluppo di sistemi software complessi. Comprovata abilità nella gestione di progetti software su larga scala, garantendo la qualità, la scalabilità e la sicurezza. Esperienza in diverse tecnologie e linguaggi di programmazione.",
            "Analista di Dati con esperienza pluriennale nell'acquisizione, pulizia e analisi di dati per fornire insight aziendali. Competenze avanzate in strumenti come Python, R e SQL, con la capacità di creare visualizzazioni e modelli predittivi. Dimostrata esperienza nella traduzione dei dati in decisioni strategiche.",
            "Scienziato dei Dati specializzato in machine learning e data mining. Esperienza nella creazione di modelli di intelligenza artificiale per l'analisi predittiva e l'ottimizzazione. Competenze avanzate in linguaggi come Python e strumenti come TensorFlow e scikit-learn.",
            "Amministratore di Sistema con una carriera di successo nella gestione e nell'ottimizzazione di infrastrutture IT. Esperienza nella manutenzione di server, reti e servizi cloud. Capacità di risolvere problemi in modo rapido ed efficiente per garantire un ambiente IT stabile.",
            "Sviluppatore Mobile con esperienza nella creazione di app Android e iOS. Competenze avanzate in linguaggi come Java e Swift, nonché nella progettazione di interfacce utente intuitive. Abituato a seguire le linee guida delle piattaforme e a ottimizzare le prestazioni delle app.",
            "Game Developer con una passione per la creazione di esperienze di gioco coinvolgenti. Esperienza nella progettazione e nello sviluppo di videogiochi per diverse piattaforme. Conoscenza approfondita di motori di gioco come Unity o Unreal Engine.",
            "Ingegnere DevOps specializzato nell'automazione dei processi di sviluppo e distribuzione. Esperienza nell'implementazione di strumenti di Continuous Integration e Continuous Deployment (CI/CD) per accelerare lo sviluppo e migliorare la collaborazione tra team.",
            "Ingegnere QA/QC con un forte impegno per il controllo della qualità del software. Competenze nella progettazione e nell'esecuzione di test funzionali e di stress per garantire che i prodotti soddisfino gli standard di qualità.",
            "Web Designer con un occhio per il design creativo e l'usabilità. Esperienza nella creazione di layout attraenti e responsive, combinando competenze in grafica e design con una buona comprensione di HTML e CSS.",
            "Project Manager IT con una comprovata traccia di gestione di progetti complessi. Esperienza nell'assegnazione delle risorse, nel monitoraggio dei progressi e nel rispetto dei budget e dei tempi stabiliti. Abile nella gestione dei team di sviluppo e nell'interfacciarsi con gli stakeholder aziendali.",
            "Architetto del Software con una vasta esperienza nella definizione dei requisiti e nella progettazione di soluzioni IT. Abile nella comunicazione tra gli utenti finali e i team di sviluppo per garantire il successo dei progetti.",
            "Esperto in Sicurezza Informatica con competenze avanzate nella protezione dei sistemi e dei dati aziendali. Esperienza nella valutazione delle vulnerabilità, nella gestione degli incidenti e nella definizione di politiche di sicurezza.",
            "Analista Business con una forte attenzione alle esigenze aziendali. Esperienza nell'analisi dei processi, nella definizione dei requisiti e nella progettazione di soluzioni software che migliorano l'efficienza aziendale.",
            "Sviluppatore Cloud con competenze nella creazione e nell'implementazione di servizi basati su cloud. Esperienza in piattaforme cloud come AWS, Azure o Google Cloud per garantire la scalabilità e l'affidabilità delle applicazioni.",
            "Ingegnere AI/ML specializzato nell'applicazione di algoritmi di intelligenza artificiale e machine learning. Esperienza nella creazione di modelli predittivi e nell'implementazione di soluzioni basate sull'AI per risolvere problemi aziendali complessi.",
            "Analista dei Sistemi con una vasta esperienza nella definizione dei requisiti e nella progettazione di soluzioni IT. Abile nella comunicazione tra gli utenti finali e i team di sviluppo per garantire il successo dei progetti"
        ];

        for ($i=0; $i < count($data); $i++) { 
            $developer = new Developer();
            $developer->user_id = $i+1;
            $developer->experience_year = rand(1, 20);
            $developer->address = fake()->address();
            $developer->profile_picture =  $imgs[$i];
            
            $workId = rand(0, 19);
            $developer->profile_description = $descriptions[$workId];
            $developer->phone_number = '+39 '.rand(3300000001, 3600000000);
            $developer->save();

            $developer->work_fields()->attach($workId+1);

            // Randomize if user has sponsorship and which one
            if (fake()->boolean()) {
                $tier = rand(1, 3);
                $duration = [
                    24,
                    72,
                    144
                ];
                $tierDuration = ($duration[$tier - 1]) * 3600;
                $developer->sponsorships()->attach([
                    $tier => [
                    'start_date' => date('Y-m-d h:i:s'),
                    'expire_date' => date('Y-m-d h:i:s', time() + $tierDuration )]
                ]);
            }
        }
    }
}
