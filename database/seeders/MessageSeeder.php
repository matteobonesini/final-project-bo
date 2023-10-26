<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $data = config('data');

        Schema::withoutForeignKeyConstraints(function () {
            Message::truncate();
        });

        $messagesContent = [
            'Ciao sto avviando una nuova attività. Sto cercando di sviluppare un sito web per la mia azienda e vorrei avere maggiori informazioni sui tuoi servizi. Potresti fornirmi un preventivo? Grazie',
            'Ciao sto cercando uno sviluppatore per realizzare il mio nuovo sito web. Sarei interessato a discutere del progetto con te in un incontro. Sei disponibile per un incontro la prossima settimana? Grazie,',
            'Ciao, Vorrei incontrarti per discutere di una possibile collaborazione. Sei disponibile per un incontro la prossima settimana? Grazie,',
            'Ciao, Sto sviluppando un nuovo software e vorrei collaborare con te. Penso che le nostre competenze potrebbero essere complementari e che potremmo creare un prodotto davvero innovativo. Cosa ne pensi? Grazie,'
        ];

        $count = count($data);
        for ($i=1; $i <= $count; $i++) { 
            for ($j=0; $j < rand(5, 20); $j++) { 
                $message = new Message();
                $message->developer_id = $i;
                $message->name = fake()->firstName . ' ' . fake()->lastName();
                $message->email = fake()->email;
                $message->title = fake()->catchPhrase;
                $message->content = fake()->randomElement($messagesContent);
                $message->created_at = fake()->dateTimeBetween('-4 month', '0 second');;
                $message->updated_at = $message->created_at;
                $message->save();
            }
        }
    }
}
