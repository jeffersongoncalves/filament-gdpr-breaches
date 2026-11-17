<?php

return [
    'resource' => [
        'label' => 'Violação',
        'plural_label' => 'Violações de dados',
    ],

    'fields' => [
        'title' => 'Título',
        'description' => 'Descrição',
        'status' => 'Estado',
        'risk' => 'Risco',
        'discovered_at' => 'Conhecimento em',
        'occurred_at' => 'Ocorrido em',
        'due_at' => 'Comunicar até',
        'data_categories' => 'Categorias de dados',
        'affected_subjects' => 'Titulares afetados',
        'measures' => 'Medidas',
        'authority' => 'Autoridade',
        'subjects' => 'Titulares',
        'authority_notified_at' => 'Autoridade notificada em',
        'authority_reference' => 'Referência da autoridade',
        'delay_reason' => 'Motivos do atraso',
        'phased' => 'Notificação por fases',
        'further_information_at' => 'Informações adicionais enviadas em',
        'subjects_notified_at' => 'Titulares comunicados em',
        'no_subject_notice_reason' => 'Porque é que os titulares não são informados',
        'notified_at' => 'Comunicado em',
        'closed_at' => 'Encerrado em',
    ],

    'help' => [
        'discovered_at' => 'Quando tomou conhecimento da violação. O prazo de 72 horas começa aqui e não pode ser alterado depois (art. 33.º, n.º 1).',
        'delay_reason' => 'Obrigatório após as 72 horas (art. 33.º, n.º 1).',
        'phased' => 'Ative quando ainda faltam informações que serão enviadas depois (art. 33.º, n.º 4).',
    ],

    'risk' => [
        'pending' => 'Em avaliação',
        'unlikely' => 'Improvável que resulte em risco',
        'risk' => 'Risco',
        'high' => 'Risco elevado',
    ],

    'status' => [
        'open' => 'Aberto',
        'pending' => 'Comunicação pendente',
        'overdue' => 'Em atraso',
        'closed' => 'Encerrado',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Avaliar risco',
            'description' => 'Uma violação que represente risco para as pessoas deve ser notificada à autoridade de controlo (art. 33.º). Um risco elevado deve também ser comunicado aos titulares (art. 34.º). Registe o raciocínio nas medidas.',
            'success' => 'Risco avaliado.',
        ],
        'notify_authority' => [
            'label' => 'Autoridade notificada',
            'success' => 'Notificação à autoridade registada.',
        ],
        'further_information' => [
            'label' => 'Informações adicionais enviadas',
            'success' => 'Informações adicionais registadas.',
        ],
        'notify_subjects' => [
            'label' => 'Titulares comunicados',
            'success' => 'Comunicação aos titulares registada.',
        ],
        'skip_subject_notice' => [
            'label' => 'Comunicação não necessária',
            'description' => 'Permitido quando os dados eram incompreensíveis (p. ex. cifrados), quando medidas posteriores tornam o risco elevado improvável, ou quando uma comunicação pública substitui as individuais (art. 34.º, n.º 3).',
            'success' => 'Motivo registado.',
        ],
        'close' => [
            'label' => 'Encerrar',
            'success' => 'Violação encerrada.',
        ],
    ],
];
