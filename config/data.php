<?php

/* $numberOfUser = '50';
$url = 'https://randomuser.me/api/?results='.$numberOfUser.'&inc=name,email,picture&seed=random';
$data = json_decode(file_get_contents($url), true);
$data = $data['results'];

return $data; */

// https://randomuser.me/api/?results=50&inc=name,email,picture&seed=random&format=pretty

$data = [
    "results" => [
        [
            "name" => [
                "title" => "Miss",
                "first" => "Ruslana",
                "last" => "Lučić",
            ],
            "email" => "ruslana.lucic@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/0.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/0.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/0.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mrs",
                "first" => "Stella",
                "last" => "Collins",
            ],
            "email" => "stella.collins@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/1.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/1.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/1.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mademoiselle",
                "first" => "Matilde",
                "last" => "Gerard",
            ],
            "email" => "matilde.gerard@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/2.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/2.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/2.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Ms",
                "first" => "Shona",
                "last" => "Chiplunkar",
            ],
            "email" => "shona.chiplunkar@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/3.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/3.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/3.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mrs",
                "first" => "Annabelle",
                "last" => "Ramsdal",
            ],
            "email" => "annabelle.ramsdal@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/4.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/4.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/4.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Ms",
                "first" => "Clara",
                "last" => "Jean-Baptiste",
            ],
            "email" => "clara.jean-baptiste@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/5.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/5.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/5.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mrs",
                "first" => "بیتا",
                "last" => "نكو نظر",
            ],
            "email" => "byt.nkwnzr@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/6.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/6.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/6.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mrs",
                "first" => "Hanna",
                "last" => "Tempel",
            ],
            "email" => "hanna.tempel@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/7.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/7.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/7.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mademoiselle",
                "first" => "Camille",
                "last" => "Rousseau",
            ],
            "email" => "camille.rousseau@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/8.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/8.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/8.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Madame",
                "first" => "Elsa",
                "last" => "Renaud",
            ],
            "email" => "elsa.renaud@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/9.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/9.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/9.jpg",
            ],
        ],
        [
            "name" => ["title" => "Ms", "first" => "Nevena", "last" => "Babić"],
            "email" => "nevena.babic@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/10.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/10.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/10.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Miss",
                "first" => "Sara",
                "last" => "Jennings",
            ],
            "email" => "sara.jennings@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/11.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/11.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/11.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Miss",
                "first" => "Elisa",
                "last" => "Ziemer",
            ],
            "email" => "elisa.ziemer@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/12.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/12.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/12.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Ms",
                "first" => "Lisanna",
                "last" => "Van der Knaap",
            ],
            "email" => "lisanna.vanderknaap@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/13.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/13.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/13.jpg",
            ],
        ],
        [
            "name" => ["title" => "Miss", "first" => "Kine", "last" => "Evju"],
            "email" => "kine.evju@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/14.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/14.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/14.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Madame",
                "first" => "Carmen",
                "last" => "Menard",
            ],
            "email" => "carmen.menard@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/15.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/15.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/15.jpg",
            ],
        ],
        [
            "name" => ["title" => "Ms", "first" => "Cécile", "last" => "Donk"],
            "email" => "cecile.donk@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/16.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/16.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/16.jpg",
            ],
        ],
        [
            "name" => ["title" => "Ms", "first" => "Eléna", "last" => "Colin"],
            "email" => "elena.colin@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/17.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/17.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/17.jpg",
            ],
        ],
        [
            "name" => ["title" => "Ms", "first" => "Abbey", "last" => "Peters"],
            "email" => "abbey.peters@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/18.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/18.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/18.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mrs", "first" => "Anel", "last" => "Mota"],
            "email" => "anel.mota@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/19.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/19.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/19.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Miss",
                "first" => "Beatrice",
                "last" => "Romero",
            ],
            "email" => "beatrice.romero@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/20.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/20.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/20.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Miss",
                "first" => "Cindy",
                "last" => "Pierce",
            ],
            "email" => "cindy.pierce@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/21.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/21.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/21.jpg",
            ],
        ],
        [
            "name" => ["title" => "Ms", "first" => "Geetha", "last" => "Uchil"],
            "email" => "geetha.uchil@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/22.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/22.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/22.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Miss",
                "first" => "Lidiya",
                "last" => "Starchenko",
            ],
            "email" => "lidiya.starchenko@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/23.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/23.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/23.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mrs",
                "first" => "Myrna",
                "last" => "Bottenberg",
            ],
            "email" => "myrna.bottenberg@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/women/24.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/women/24.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/women/24.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mr", "first" => "Nolan", "last" => "Cruz"],
            "email" => "nolan.cruz@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/0.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/0.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/0.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Nicolás",
                "last" => "Barela",
            ],
            "email" => "nicolas.barela@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/1.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/1.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/1.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mr", "first" => "Ümit", "last" => "Okumuş"],
            "email" => "umit.okumus@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/2.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/2.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/2.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Kristijan",
                "last" => "Nemanjić",
            ],
            "email" => "kristijan.nemanjic@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/3.jpg",
                "medium" => "https://randomuser.me/api/portraits/med/men/3.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/3.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Samesh",
                "last" => "Mardhekar",
            ],
            "email" => "samesh.mardhekar@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/4.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/4.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/4.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Tarjei",
                "last" => "Husabø",
            ],
            "email" => "tarjei.husabo@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/5.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/5.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/5.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mr", "first" => "Eliot", "last" => "Hubert"],
            "email" => "eliot.hubert@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/6.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/6.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/6.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Yartur",
                "last" => "Abramec",
            ],
            "email" => "yartur.abramec@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/7.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/7.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/7.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mr", "first" => "Efe", "last" => "Beşok"],
            "email" => "efe.besok@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/8.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/8.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/8.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mr", "first" => "Léo", "last" => "Leclercq"],
            "email" => "leo.leclercq@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/9.jpg",
                "medium" => "https://randomuser.me/api/portraits/med/men/9.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/9.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Léandro",
                "last" => "Chevalier",
            ],
            "email" => "leandro.chevalier@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/10.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/10.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/10.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Fatih",
                "last" => "Balaban",
            ],
            "email" => "fatih.balaban@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/11.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/11.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/11.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "José Luis",
                "last" => "Villanueva",
            ],
            "email" => "joseluis.villanueva@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/12.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/12.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/12.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Jamie",
                "last" => "Sanders",
            ],
            "email" => "jamie.sanders@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/13.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/13.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/13.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Arturo",
                "last" => "Trujillo",
            ],
            "email" => "arturo.trujillo@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/14.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/14.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/14.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mr", "first" => "Frank", "last" => "Graves"],
            "email" => "frank.graves@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/15.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/15.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/15.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Yartur",
                "last" => "Krulikovskiy",
            ],
            "email" => "yartur.krulikovskiy@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/16.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/16.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/16.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Niklas",
                "last" => "Wirtanen",
            ],
            "email" => "niklas.wirtanen@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/26.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/26.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/26.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Christian",
                "last" => "Garrido",
            ],
            "email" => "christian.garrido@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/18.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/18.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/18.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Rusan",
                "last" => "Sirobaba",
            ],
            "email" => "rusan.sirobaba@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/19.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/19.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/19.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Ethan",
                "last" => "Douglas",
            ],
            "email" => "ethan.douglas@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/20.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/20.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/20.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mr", "first" => "Amol", "last" => "Uchil"],
            "email" => "amol.uchil@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/21.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/21.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/21.jpg",
            ],
        ],
        [
            "name" => ["title" => "Mr", "first" => "Hector", "last" => "Meyer"],
            "email" => "hector.meyer@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/22.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/22.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/22.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Roger",
                "last" => "Harrison",
            ],
            "email" => "roger.harrison@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/23.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/23.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/23.jpg",
            ],
        ],
        [
            "name" => [
                "title" => "Mr",
                "first" => "Vitaliano",
                "last" => "da Cruz",
            ],
            "email" => "vitaliano.dacruz@example.com",
            "picture" => [
                "large" => "https://randomuser.me/api/portraits/men/24.jpg",
                "medium" =>
                    "https://randomuser.me/api/portraits/med/men/24.jpg",
                "thumbnail" =>
                    "https://randomuser.me/api/portraits/thumb/men/24.jpg",
            ],
        ],
    ]
];

return $data['results'];