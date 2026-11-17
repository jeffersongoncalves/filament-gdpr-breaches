<?php

return [
    'resource' => [
        'label' => 'Breach',
        'plural_label' => 'Breaches',
    ],

    'fields' => [
        'title' => 'Title',
        'description' => 'Description',
        'status' => 'Status',
        'risk' => 'Risk',
        'discovered_at' => 'Became aware at',
        'occurred_at' => 'Occurred at',
        'due_at' => 'Notify by',
        'data_categories' => 'Data categories',
        'affected_subjects' => 'Affected data subjects',
        'measures' => 'Measures',
        'authority' => 'Authority',
        'subjects' => 'Data subjects',
        'authority_notified_at' => 'Authority notified at',
        'authority_reference' => 'Authority reference',
        'delay_reason' => 'Reasons for the delay',
        'phased' => 'Notice in phases',
        'further_information_at' => 'Further information sent at',
        'subjects_notified_at' => 'Data subjects notified at',
        'no_subject_notice_reason' => 'Why the data subjects are not told',
        'notified_at' => 'Notified at',
        'closed_at' => 'Closed at',
    ],

    'help' => [
        'discovered_at' => 'When you became aware of the breach. The 72-hour deadline starts here and cannot be changed later (Art. 33(1)).',
        'delay_reason' => 'Required after the 72 hours (Art. 33(1)).',
        'phased' => 'Turn on when some information is still missing and will follow (Art. 33(4)).',
    ],

    'risk' => [
        'pending' => 'Under assessment',
        'unlikely' => 'Unlikely to result in a risk',
        'risk' => 'Risk',
        'high' => 'High risk',
    ],

    'status' => [
        'open' => 'Open',
        'pending' => 'Notification pending',
        'overdue' => 'Overdue',
        'closed' => 'Closed',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Assess risk',
            'description' => 'A breach that is a risk to people must be notified to the supervisory authority (Art. 33). A high risk must also be communicated to the data subjects (Art. 34). Record the reasoning in the measures.',
            'success' => 'Risk assessed.',
        ],
        'notify_authority' => [
            'label' => 'Authority notified',
            'success' => 'Authority notification recorded.',
        ],
        'further_information' => [
            'label' => 'Further information sent',
            'success' => 'Further information recorded.',
        ],
        'notify_subjects' => [
            'label' => 'Data subjects notified',
            'success' => 'Data subject notification recorded.',
        ],
        'skip_subject_notice' => [
            'label' => 'No communication needed',
            'description' => 'Allowed when the data was unintelligible (e.g. encrypted), when later measures make the high risk unlikely, or when a public communication replaces individual ones (Art. 34(3)).',
            'success' => 'Reason recorded.',
        ],
        'close' => [
            'label' => 'Close',
            'success' => 'Breach closed.',
        ],
    ],
];
