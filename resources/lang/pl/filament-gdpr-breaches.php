<?php

return [
    'resource' => [
        'label' => 'Naruszenie',
        'plural_label' => 'Naruszenia ochrony danych',
    ],

    'fields' => [
        'title' => 'Tytuł',
        'description' => 'Opis',
        'status' => 'Status',
        'risk' => 'Ryzyko',
        'discovered_at' => 'Stwierdzono',
        'occurred_at' => 'Wystąpił',
        'due_at' => 'Zgłosić do',
        'data_categories' => 'Kategorie danych',
        'affected_subjects' => 'Osoby, których dotyczy',
        'measures' => 'Środki',
        'authority' => 'Organ nadzorczy',
        'subjects' => 'Osoby',
        'authority_notified_at' => 'Organ powiadomiony',
        'authority_reference' => 'Sygnatura organu',
        'delay_reason' => 'Przyczyny opóźnienia',
        'phased' => 'Zgłoszenie etapami',
        'further_information_at' => 'Dodatkowe informacje wysłane',
        'subjects_notified_at' => 'Powiadomiono osoby',
        'no_subject_notice_reason' => 'Dlaczego osoby, których dane dotyczą, nie są informowane',
        'notified_at' => 'Powiadomiono',
        'closed_at' => 'Zamknięto',
    ],

    'help' => [
        'discovered_at' => 'Kiedy dowiedziałeś się o naruszeniu. Termin 72 godzin biegnie od tej chwili i nie można go później zmienić (art. 33 ust. 1).',
        'delay_reason' => 'Wymagane po upływie 72 godzin (art. 33 ust. 1).',
        'phased' => 'Włącz, gdy brakuje jeszcze części informacji, które zostaną przekazane później (art. 33 ust. 4).',
    ],

    'risk' => [
        'pending' => 'W ocenie',
        'unlikely' => 'Mało prawdopodobne ryzyko',
        'risk' => 'Ryzyko',
        'high' => 'Wysokie ryzyko',
    ],

    'status' => [
        'open' => 'Otwarty',
        'pending' => 'Oczekuje na zgłoszenie',
        'overdue' => 'Po terminie',
        'closed' => 'Zamknięty',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Oceń ryzyko',
            'description' => 'Naruszenie stwarzające ryzyko dla osób trzeba zgłosić organowi nadzorczemu (art. 33). O wysokim ryzyku trzeba też zawiadomić osoby, których dane dotyczą (art. 34). Zapisz uzasadnienie w środkach.',
            'success' => 'Ryzyko ocenione.',
        ],
        'notify_authority' => [
            'label' => 'Organ powiadomiony',
            'success' => 'Zgłoszenie do organu zapisane.',
        ],
        'further_information' => [
            'label' => 'Dodatkowe informacje wysłane',
            'success' => 'Dodatkowe informacje zapisane.',
        ],
        'notify_subjects' => [
            'label' => 'Powiadomiono osoby',
            'success' => 'Powiadomienie osób zapisane.',
        ],
        'skip_subject_notice' => [
            'label' => 'Zawiadomienie niepotrzebne',
            'description' => 'Dopuszczalne, gdy dane były niezrozumiałe (np. zaszyfrowane), gdy późniejsze środki sprawiają, że wysokie ryzyko jest mało prawdopodobne, lub gdy komunikat publiczny zastępuje zawiadomienia indywidualne (art. 34 ust. 3).',
            'success' => 'Powód zapisany.',
        ],
        'close' => [
            'label' => 'Zamknij',
            'success' => 'Naruszenie zamknięte.',
        ],
    ],
];
