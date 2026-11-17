<?php

return [
    'resource' => [
        'label' => 'Pozuntu',
        'plural_label' => 'Məlumat pozuntuları',
    ],

    'fields' => [
        'title' => 'Başlıq',
        'description' => 'Təsvir',
        'status' => 'Status',
        'risk' => 'Risk',
        'discovered_at' => 'Xəbər tutulma tarixi',
        'occurred_at' => 'Baş verib',
        'due_at' => 'Bildiriş son tarixi',
        'data_categories' => 'Məlumat kateqoriyaları',
        'affected_subjects' => 'Təsirlənmiş subyektlər',
        'measures' => 'Tədbirlər',
        'authority' => 'Orqan',
        'subjects' => 'Subyektlər',
        'authority_notified_at' => 'Orqana bildirildi',
        'authority_reference' => 'Orqanın istinad nömrəsi',
        'delay_reason' => 'Gecikmənin səbəbləri',
        'phased' => 'Mərhələli bildiriş',
        'further_information_at' => 'Əlavə məlumat göndərildi',
        'subjects_notified_at' => 'Subyektlərə bildirilib',
        'no_subject_notice_reason' => 'Məlumat subyektlərinə niyə bildirilmir',
        'notified_at' => 'Bildirilib',
        'closed_at' => 'Bağlanıb',
    ],

    'help' => [
        'discovered_at' => 'Pozuntudan xəbər tutduğunuz vaxt. 72 saatlıq müddət buradan başlayır və sonradan dəyişdirilə bilməz (maddə 33(1)).',
        'delay_reason' => '72 saatdan sonra məcburidir (maddə 33(1)).',
        'phased' => 'Bəzi məlumatlar hələ çatışmırsa və sonra göndəriləcəksə aktivləşdirin (maddə 33(4)).',
    ],

    'risk' => [
        'pending' => 'Qiymətləndirilir',
        'unlikely' => 'Riskə səbəb olması ehtimalı azdır',
        'risk' => 'Risk',
        'high' => 'Yüksək risk',
    ],

    'status' => [
        'open' => 'Açıq',
        'pending' => 'Bildiriş gözləyir',
        'overdue' => 'Gecikmiş',
        'closed' => 'Bağlı',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Riski qiymətləndir',
            'description' => 'İnsanlar üçün risk yaradan pozuntu nəzarət orqanına bildirilməlidir (maddə 33). Yüksək risk məlumat subyektlərinə də bildirilməlidir (maddə 34). Əsaslandırmanı tədbirlərdə qeyd edin.',
            'success' => 'Risk qiymətləndirildi.',
        ],
        'notify_authority' => [
            'label' => 'Orqana bildirildi',
            'success' => 'Orqana bildiriş qeydə alındı.',
        ],
        'further_information' => [
            'label' => 'Əlavə məlumat göndərildi',
            'success' => 'Əlavə məlumat qeydə alındı.',
        ],
        'notify_subjects' => [
            'label' => 'Subyektlərə bildirildi',
            'success' => 'Subyektlərə bildiriş qeydə alındı.',
        ],
        'skip_subject_notice' => [
            'label' => 'Bildiriş tələb olunmur',
            'description' => 'Məlumatlar anlaşılmaz olduqda (məs. şifrələnmiş), sonrakı tədbirlər yüksək riski ehtimaldan kənar etdikdə və ya ictimai bildiriş fərdi bildirişləri əvəz etdikdə icazə verilir (maddə 34(3)).',
            'success' => 'Səbəb qeydə alındı.',
        ],
        'close' => [
            'label' => 'Bağla',
            'success' => 'Pozuntu bağlandı.',
        ],
    ],
];
