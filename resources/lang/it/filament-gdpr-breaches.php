<?php

return [
    'resource' => [
        'label' => 'Violazione',
        'plural_label' => 'Violazioni dei dati',
    ],

    'fields' => [
        'title' => 'Titolo',
        'description' => 'Descrizione',
        'status' => 'Stato',
        'risk' => 'Rischio',
        'discovered_at' => 'Venuto a conoscenza il',
        'occurred_at' => 'Avvenuto il',
        'due_at' => 'Notificare entro',
        'data_categories' => 'Categorie di dati',
        'affected_subjects' => 'Interessati coinvolti',
        'measures' => 'Misure',
        'authority' => 'Autorità',
        'subjects' => 'Interessati',
        'authority_notified_at' => 'Autorità notificata il',
        'authority_reference' => 'Riferimento dell\'autorità',
        'delay_reason' => 'Motivi del ritardo',
        'phased' => 'Notifica in fasi',
        'further_information_at' => 'Ulteriori informazioni inviate il',
        'subjects_notified_at' => 'Interessati informati il',
        'no_subject_notice_reason' => 'Perché gli interessati non vengono informati',
        'notified_at' => 'Notificato il',
        'closed_at' => 'Chiuso il',
    ],

    'help' => [
        'discovered_at' => 'Quando sei venuto a conoscenza della violazione. Il termine di 72 ore parte da qui e non può essere modificato (art. 33(1)).',
        'delay_reason' => 'Obbligatorio dopo le 72 ore (art. 33(1)).',
        'phased' => 'Attiva quando mancano ancora alcune informazioni che verranno inviate dopo (art. 33(4)).',
    ],

    'risk' => [
        'pending' => 'In valutazione',
        'unlikely' => 'Improbabile che presenti un rischio',
        'risk' => 'Rischio',
        'high' => 'Rischio elevato',
    ],

    'status' => [
        'open' => 'Aperto',
        'pending' => 'Notifica in sospeso',
        'overdue' => 'Scaduto',
        'closed' => 'Chiuso',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Valuta il rischio',
            'description' => 'Una violazione che presenta un rischio per le persone va notificata all\'autorità di controllo (art. 33). Un rischio elevato va comunicato anche agli interessati (art. 34). Annota il ragionamento nelle misure.',
            'success' => 'Rischio valutato.',
        ],
        'notify_authority' => [
            'label' => 'Autorità notificata',
            'success' => 'Notifica all\'autorità registrata.',
        ],
        'further_information' => [
            'label' => 'Ulteriori informazioni inviate',
            'success' => 'Ulteriori informazioni registrate.',
        ],
        'notify_subjects' => [
            'label' => 'Interessati informati',
            'success' => 'Comunicazione agli interessati registrata.',
        ],
        'skip_subject_notice' => [
            'label' => 'Nessuna comunicazione necessaria',
            'description' => 'Consentito quando i dati erano incomprensibili (es. cifrati), quando misure successive rendono improbabile il rischio elevato, o quando una comunicazione pubblica sostituisce quelle individuali (art. 34(3)).',
            'success' => 'Motivo registrato.',
        ],
        'close' => [
            'label' => 'Chiudi',
            'success' => 'Violazione chiusa.',
        ],
    ],
];
