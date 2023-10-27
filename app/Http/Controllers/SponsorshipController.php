<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        // dd(User::find($userId)->developer->id);
        $developer = Developer::find($userId);
        $sponsorships = Sponsorship::all();

        $sponsorDesc = [
            'tier-1' => [
                'Accesso Istantaneo' => "Gli utenti possono ottenere l'accesso immediato ai contenuti o ai servizi desiderati senza dover aspettare.",
                'Opzione di Prova' => "È un'ottima soluzione per coloro che vogliono provare il servizio prima di impegnarsi per periodi più lunghi.",
                'Flessibilità' => "I clienti possono attivare l'abbonamento solo quando ne hanno bisogno, ideale per situazioni come eventi speciali o viaggi brevi.",
                'Prezzo Accessibile' => "Gli abbonamenti di un giorno sono generalmente più economici rispetto a quelli a lungo termine, adatti a chi ha un budget limitato.",
                'Nessun Impegno a Lungo Termine' => "Gli utenti non sono vincolati a contratti a lungo termine e possono decidere di non rinnovare se il servizio non soddisfa le loro esigenze."
            ],
            'tier-2' => [
                'Risparmio a Breve Termine' => "Questo piano offre un costo giornaliero inferiore rispetto all'abbonamento giornaliero, permettendo ai clienti di risparmiare a breve termine.",
                'Esperienza Migliorata' => "Con un periodo più lungo, gli utenti possono esplorare appieno il servizio o il prodotto, scoprendo tutte le sue funzionalità e vantaggi",
                'Adatto ai Weekend' => "È perfetto per weekend o viaggi brevi, fornendo accesso per un periodo più prolungato senza dover rinnovare l'abbonamento frequentemente.",
                'Gestione Conveniente' => "Gli utenti risparmiano tempo e sforzo non dover rinnovare l'abbonamento ogni giorno, rendendo l'esperienza più comoda.",
                'Versatilità' => "Questo piano si adatta bene a esigenze a breve termine, come eventi speciali, fiere o esperienze che durano alcuni giorni."
            ],
            'tier-3' => [
                'Risparmio Significativo' => "Questo piano offre un notevole risparmio rispetto ai piani più brevi, riducendo il costo giornaliero.",
                'Ideale per Viaggi Lunghi' => "Questo abbonamento è perfetto per viaggi o situazioni in cui si desidera accesso costante per un periodo prolungato",
                'Esplorazione Approfondita' => "Gli utenti hanno ampio tempo per esplorare e sfruttare appieno il servizio o il prodotto, ottenendo un'esperienza più completa.",
                'Minore Preoccupazione per il Rinnovo' => "Gli utenti non devono preoccuparsi di rinnovare l'abbonamento frequentemente, semplificando la gestione",
                'Massima Flessibilità' => "Con una durata di 6 giorni, gli utenti hanno molta flessibilità per pianificare e utilizzare il servizio come meglio credono"
            ],
        ];

        $braintree = config('braintree');
        $clientToken = $braintree->clientToken()->generate();

        return view('developer.sponsorship', compact('sponsorships', 'developer', 'sponsorDesc', 'clientToken'));
    }

    public function newSponsorship(Request $request){
        $developer = Developer::find(Auth::id());
        $data = $request->validate(
            [
                'amount' => 'required|exists:sponsorships,price',
                'nonce' => 'required',
                'name' => 'required',
                'lastname' => 'required',
                'address' => 'required',
                'city' => 'required',
                'zipcode' => 'required',
                'phone' => 'nullable'
            ]
        );
        $duration = [
            '2.99' => 24,
            '5.99' => 72,
            '9.99' => 144
        ];
        $index = [
            '2.99' => 1,
            '5.99' => 2,
            '9.99' => 3
        ];
        $tierDuration = ($duration[$data['amount']]) * 3600;
        date_default_timezone_set('Europe/Rome');
        if($developer->active_sponsorship) {
            $start_date = $developer->sponsorship_expire_date;
            $start_date_unix = strtotime($start_date);
            $expire_date = $start_date_unix + $tierDuration;
            $developer->sponsorships()->attach([
                $index[$data['amount']] => [
                    'start_date' => $start_date,
                    'expire_date' => date('Y-m-d G:i:s', $expire_date),
                ]
            ]);
        } else {
            $developer->sponsorships()->attach([
                $index[$data['amount']] => [
                    'start_date' => date('Y-m-d G:i:s'),
                    'expire_date' => date('Y-m-d G:i:s', time() + $tierDuration ),
                ]
            ]);
        }

        $braintree = config('braintree');

        // payment process
        $result = $braintree->transaction()->sale([
            'amount' => $data['amount'],
            'paymentMethodNonce' => $data['nonce'],
            //'paymentMethodNonce' => 'fake-valid-nonce', // testing card
            'billing' => [
                'postalCode' => $data['zipcode'],
                'streetAddress' => $data['address'],
            ],
            'customer' => [
                'firstName' => $data['name'],
                'lastName' => $data['lastname'],
                // 'email' => $email,
            ],
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        return response()->json([
            'success' => 'true',
            'message' => 'Operazione completata con successo',
            'result' => $result
        ], 200);
    }
}
