<?php

return [
    'resource' => [
        'label' => 'Datenschutzverletzung',
        'plural_label' => 'Datenschutzverletzungen',
    ],

    'fields' => [
        'title' => 'Titel',
        'description' => 'Beschreibung',
        'status' => 'Status',
        'risk' => 'Risiko',
        'discovered_at' => 'Kenntnis erlangt am',
        'occurred_at' => 'Eingetreten am',
        'due_at' => 'Melden bis',
        'data_categories' => 'Datenkategorien',
        'affected_subjects' => 'Betroffene Personen',
        'measures' => 'Maßnahmen',
        'authority' => 'Behörde',
        'subjects' => 'Betroffene',
        'authority_notified_at' => 'Behörde benachrichtigt am',
        'authority_reference' => 'Aktenzeichen der Behörde',
        'delay_reason' => 'Gründe für die Verzögerung',
        'phased' => 'Meldung in Schritten',
        'further_information_at' => 'Weitere Informationen gesendet am',
        'subjects_notified_at' => 'Betroffene informiert am',
        'no_subject_notice_reason' => 'Warum die betroffenen Personen nicht benachrichtigt werden',
        'notified_at' => 'Gemeldet am',
        'closed_at' => 'Abgeschlossen am',
    ],

    'help' => [
        'discovered_at' => 'Wann Sie von der Verletzung Kenntnis erlangt haben. Die 72-Stunden-Frist beginnt hier und kann später nicht geändert werden (Art. 33 Abs. 1).',
        'delay_reason' => 'Nach Ablauf der 72 Stunden erforderlich (Art. 33 Abs. 1).',
        'phased' => 'Aktivieren, wenn noch Informationen fehlen und nachgereicht werden (Art. 33 Abs. 4).',
    ],

    'risk' => [
        'pending' => 'In Bewertung',
        'unlikely' => 'Voraussichtlich kein Risiko',
        'risk' => 'Risiko',
        'high' => 'Hohes Risiko',
    ],

    'status' => [
        'open' => 'Offen',
        'pending' => 'Meldung ausstehend',
        'overdue' => 'Überfällig',
        'closed' => 'Abgeschlossen',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Risiko bewerten',
            'description' => 'Eine Verletzung mit Risiko für Personen ist der Aufsichtsbehörde zu melden (Art. 33). Ein hohes Risiko ist auch den betroffenen Personen mitzuteilen (Art. 34). Halten Sie die Begründung in den Maßnahmen fest.',
            'success' => 'Risiko bewertet.',
        ],
        'notify_authority' => [
            'label' => 'Behörde benachrichtigt',
            'success' => 'Meldung an die Behörde erfasst.',
        ],
        'further_information' => [
            'label' => 'Weitere Informationen gesendet',
            'success' => 'Weitere Informationen erfasst.',
        ],
        'notify_subjects' => [
            'label' => 'Betroffene informiert',
            'success' => 'Information der Betroffenen erfasst.',
        ],
        'skip_subject_notice' => [
            'label' => 'Keine Benachrichtigung nötig',
            'description' => 'Zulässig, wenn die Daten unverständlich waren (z. B. verschlüsselt), wenn spätere Maßnahmen das hohe Risiko unwahrscheinlich machen oder wenn eine öffentliche Bekanntmachung die einzelnen Benachrichtigungen ersetzt (Art. 34 Abs. 3).',
            'success' => 'Begründung erfasst.',
        ],
        'close' => [
            'label' => 'Abschließen',
            'success' => 'Verletzung abgeschlossen.',
        ],
    ],
];
