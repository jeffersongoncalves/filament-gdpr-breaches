<?php

return [
    'resource' => [
        'label' => 'Inbreuk',
        'plural_label' => 'Datalekken',
    ],

    'fields' => [
        'title' => 'Titel',
        'description' => 'Beschrijving',
        'status' => 'Status',
        'risk' => 'Risico',
        'discovered_at' => 'Bekend geworden op',
        'occurred_at' => 'Opgetreden op',
        'due_at' => 'Melden vóór',
        'data_categories' => 'Gegevenscategorieën',
        'affected_subjects' => 'Getroffen betrokkenen',
        'measures' => 'Maatregelen',
        'authority' => 'Toezichthouder',
        'subjects' => 'Betrokkenen',
        'authority_notified_at' => 'Toezichthouder gemeld op',
        'authority_reference' => 'Kenmerk van de toezichthouder',
        'delay_reason' => 'Redenen voor de vertraging',
        'phased' => 'Melding in fasen',
        'further_information_at' => 'Aanvullende informatie verzonden op',
        'subjects_notified_at' => 'Betrokkenen geïnformeerd op',
        'no_subject_notice_reason' => 'Waarom de betrokkenen niet worden geïnformeerd',
        'notified_at' => 'Gemeld op',
        'closed_at' => 'Afgesloten op',
    ],

    'help' => [
        'discovered_at' => 'Wanneer u van de inbreuk op de hoogte raakte. De termijn van 72 uur begint hier en kan later niet worden gewijzigd (art. 33(1)).',
        'delay_reason' => 'Verplicht na de 72 uur (art. 33(1)).',
        'phased' => 'Zet aan wanneer er nog informatie ontbreekt die later volgt (art. 33(4)).',
    ],

    'risk' => [
        'pending' => 'In beoordeling',
        'unlikely' => 'Leidt waarschijnlijk niet tot een risico',
        'risk' => 'Risico',
        'high' => 'Hoog risico',
    ],

    'status' => [
        'open' => 'Open',
        'pending' => 'Melding open',
        'overdue' => 'Te laat',
        'closed' => 'Afgesloten',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Risico beoordelen',
            'description' => 'Een inbreuk die een risico vormt voor personen moet bij de toezichthouder worden gemeld (art. 33). Een hoog risico moet ook aan de betrokkenen worden meegedeeld (art. 34). Leg de afweging vast bij de maatregelen.',
            'success' => 'Risico beoordeeld.',
        ],
        'notify_authority' => [
            'label' => 'Toezichthouder gemeld',
            'success' => 'Melding aan de toezichthouder vastgelegd.',
        ],
        'further_information' => [
            'label' => 'Aanvullende informatie verzonden',
            'success' => 'Aanvullende informatie vastgelegd.',
        ],
        'notify_subjects' => [
            'label' => 'Betrokkenen geïnformeerd',
            'success' => 'Informeren van betrokkenen vastgelegd.',
        ],
        'skip_subject_notice' => [
            'label' => 'Geen mededeling nodig',
            'description' => 'Toegestaan wanneer de gegevens onbegrijpelijk waren (bijv. versleuteld), wanneer latere maatregelen het hoge risico onwaarschijnlijk maken, of wanneer een openbare mededeling de individuele vervangt (art. 34(3)).',
            'success' => 'Reden vastgelegd.',
        ],
        'close' => [
            'label' => 'Afsluiten',
            'success' => 'Inbreuk afgesloten.',
        ],
    ],
];
