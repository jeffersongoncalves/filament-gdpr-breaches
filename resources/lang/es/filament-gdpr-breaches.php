<?php

return [
    'resource' => [
        'label' => 'Brecha',
        'plural_label' => 'Brechas de datos',
    ],

    'fields' => [
        'title' => 'Título',
        'description' => 'Descripción',
        'status' => 'Estado',
        'risk' => 'Riesgo',
        'discovered_at' => 'Conocimiento el',
        'occurred_at' => 'Ocurrido el',
        'due_at' => 'Comunicar antes de',
        'data_categories' => 'Categorías de datos',
        'affected_subjects' => 'Titulares afectados',
        'measures' => 'Medidas',
        'authority' => 'Autoridad',
        'subjects' => 'Titulares',
        'authority_notified_at' => 'Autoridad notificada el',
        'authority_reference' => 'Referencia de la autoridad',
        'delay_reason' => 'Motivos del retraso',
        'phased' => 'Notificación por fases',
        'further_information_at' => 'Información adicional enviada el',
        'subjects_notified_at' => 'Titulares comunicados el',
        'no_subject_notice_reason' => 'Por qué no se informa a los interesados',
        'notified_at' => 'Comunicado el',
        'closed_at' => 'Cerrado el',
    ],

    'help' => [
        'discovered_at' => 'Cuándo tuvo conocimiento de la brecha. El plazo de 72 horas empieza aquí y no puede cambiarse después (art. 33(1)).',
        'delay_reason' => 'Obligatorio pasadas las 72 horas (art. 33(1)).',
        'phased' => 'Actívelo cuando aún falte información que se enviará después (art. 33(4)).',
    ],

    'risk' => [
        'pending' => 'En evaluación',
        'unlikely' => 'Improbable que suponga un riesgo',
        'risk' => 'Riesgo',
        'high' => 'Alto riesgo',
    ],

    'status' => [
        'open' => 'Abierto',
        'pending' => 'Comunicación pendiente',
        'overdue' => 'Vencido',
        'closed' => 'Cerrado',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Evaluar riesgo',
            'description' => 'Una brecha que suponga un riesgo para las personas debe notificarse a la autoridad de control (art. 33). Un alto riesgo debe comunicarse también a los interesados (art. 34). Anote el razonamiento en las medidas.',
            'success' => 'Riesgo evaluado.',
        ],
        'notify_authority' => [
            'label' => 'Autoridad notificada',
            'success' => 'Notificación a la autoridad registrada.',
        ],
        'further_information' => [
            'label' => 'Información adicional enviada',
            'success' => 'Información adicional registrada.',
        ],
        'notify_subjects' => [
            'label' => 'Titulares comunicados',
            'success' => 'Comunicación a los titulares registrada.',
        ],
        'skip_subject_notice' => [
            'label' => 'No se requiere comunicación',
            'description' => 'Permitido cuando los datos eran ininteligibles (p. ej., cifrados), cuando medidas posteriores hacen improbable el alto riesgo, o cuando una comunicación pública sustituye a las individuales (art. 34(3)).',
            'success' => 'Motivo registrado.',
        ],
        'close' => [
            'label' => 'Cerrar',
            'success' => 'Brecha cerrada.',
        ],
    ],
];
