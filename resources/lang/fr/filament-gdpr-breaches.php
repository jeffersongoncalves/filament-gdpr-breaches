<?php

return [
    'resource' => [
        'label' => 'Violation',
        'plural_label' => 'Violations de données',
    ],

    'fields' => [
        'title' => 'Titre',
        'description' => 'Description',
        'status' => 'Statut',
        'risk' => 'Risque',
        'discovered_at' => 'Connaissance le',
        'occurred_at' => 'Survenu le',
        'due_at' => 'À notifier avant',
        'data_categories' => 'Catégories de données',
        'affected_subjects' => 'Personnes concernées touchées',
        'measures' => 'Mesures',
        'authority' => 'Autorité',
        'subjects' => 'Personnes concernées',
        'authority_notified_at' => 'Autorité notifiée le',
        'authority_reference' => 'Référence de l\'autorité',
        'delay_reason' => 'Motifs du retard',
        'phased' => 'Notification échelonnée',
        'further_information_at' => 'Informations complémentaires envoyées le',
        'subjects_notified_at' => 'Personnes concernées informées le',
        'no_subject_notice_reason' => 'Pourquoi les personnes concernées ne sont pas informées',
        'notified_at' => 'Notifié le',
        'closed_at' => 'Clôturé le',
    ],

    'help' => [
        'discovered_at' => 'Quand vous avez pris connaissance de la violation. Le délai de 72 heures commence ici et ne peut plus être modifié (art. 33(1)).',
        'delay_reason' => 'Obligatoire après 72 heures (art. 33(1)).',
        'phased' => 'Activez lorsque certaines informations manquent encore et suivront (art. 33(4)).',
    ],

    'risk' => [
        'pending' => 'En évaluation',
        'unlikely' => 'Peu susceptible d\'engendrer un risque',
        'risk' => 'Risque',
        'high' => 'Risque élevé',
    ],

    'status' => [
        'open' => 'Ouvert',
        'pending' => 'Notification en attente',
        'overdue' => 'En retard',
        'closed' => 'Clôturé',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Évaluer le risque',
            'description' => 'Une violation présentant un risque pour les personnes doit être notifiée à l\'autorité de contrôle (art. 33). Un risque élevé doit aussi être communiqué aux personnes concernées (art. 34). Consignez le raisonnement dans les mesures.',
            'success' => 'Risque évalué.',
        ],
        'notify_authority' => [
            'label' => 'Autorité notifiée',
            'success' => 'Notification à l\'autorité enregistrée.',
        ],
        'further_information' => [
            'label' => 'Informations complémentaires envoyées',
            'success' => 'Informations complémentaires enregistrées.',
        ],
        'notify_subjects' => [
            'label' => 'Personnes concernées informées',
            'success' => 'Information des personnes concernées enregistrée.',
        ],
        'skip_subject_notice' => [
            'label' => 'Aucune communication requise',
            'description' => 'Autorisé lorsque les données étaient incompréhensibles (par ex. chiffrées), lorsque des mesures ultérieures rendent le risque élevé improbable, ou lorsqu\'une communication publique remplace les communications individuelles (art. 34(3)).',
            'success' => 'Motif enregistré.',
        ],
        'close' => [
            'label' => 'Clôturer',
            'success' => 'Violation clôturée.',
        ],
    ],
];
