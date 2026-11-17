<?php

return [
    'resource' => [
        'label' => 'Buzilish',
        'plural_label' => 'Ma\'lumot buzilishlari',
    ],

    'fields' => [
        'title' => 'Sarlavha',
        'description' => 'Tavsif',
        'status' => 'Holat',
        'risk' => 'Xavf',
        'discovered_at' => 'Xabar topilgan vaqt',
        'occurred_at' => 'Sodir bo\'lgan vaqt',
        'due_at' => 'Xabar berish muddati',
        'data_categories' => 'Ma\'lumot toifalari',
        'affected_subjects' => 'Ta\'sirlangan subyektlar',
        'measures' => 'Choralar',
        'authority' => 'Nazorat organi',
        'subjects' => 'Subyektlar',
        'authority_notified_at' => 'Organga xabar berilgan',
        'authority_reference' => 'Organ ma\'lumotnomasi',
        'delay_reason' => 'Kechikish sabablari',
        'phased' => 'Bosqichma-bosqich xabar',
        'further_information_at' => 'Qo\'shimcha ma\'lumot yuborilgan',
        'subjects_notified_at' => 'Subyektlarga xabar berilgan',
        'no_subject_notice_reason' => 'Ma\'lumot subyektlariga nima uchun xabar berilmaydi',
        'notified_at' => 'Xabar berilgan',
        'closed_at' => 'Yopilgan',
    ],

    'help' => [
        'discovered_at' => 'Buzilishdan xabar topgan vaqtingiz. 72 soatlik muddat shu yerdan boshlanadi va keyin o\'zgartirib bo\'lmaydi (33(1)-modda).',
        'delay_reason' => '72 soatdan keyin majburiy (33(1)-modda).',
        'phased' => 'Ba\'zi ma\'lumotlar hali yetishmasa va keyin yuborilsa yoqing (33(4)-modda).',
    ],

    'risk' => [
        'pending' => 'Baholanmoqda',
        'unlikely' => 'Xavf tug\'dirishi ehtimoldan yiroq',
        'risk' => 'Xavf',
        'high' => 'Yuqori xavf',
    ],

    'status' => [
        'open' => 'Ochiq',
        'pending' => 'Xabar kutilmoqda',
        'overdue' => 'Muddati o\'tgan',
        'closed' => 'Yopilgan',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Xavfni baholash',
            'description' => 'Odamlar uchun xavf tug\'diruvchi buzilish haqida nazorat organiga xabar berilishi kerak (33-modda). Yuqori xavf haqida ma\'lumot subyektlariga ham xabar berilishi kerak (34-modda). Asoslashni choralarda qayd eting.',
            'success' => 'Xavf baholandi.',
        ],
        'notify_authority' => [
            'label' => 'Organga xabar berildi',
            'success' => 'Organga xabar qayd etildi.',
        ],
        'further_information' => [
            'label' => 'Qo\'shimcha ma\'lumot yuborildi',
            'success' => 'Qo\'shimcha ma\'lumot qayd etildi.',
        ],
        'notify_subjects' => [
            'label' => 'Subyektlarga xabar berildi',
            'success' => 'Subyektlarga xabar qayd etildi.',
        ],
        'skip_subject_notice' => [
            'label' => 'Xabar berish shart emas',
            'description' => 'Ma\'lumotlar tushunarsiz bo\'lsa (masalan, shifrlangan), keyingi choralar yuqori xavfni ehtimoldan yiroq qilsa yoki ommaviy xabar individual xabarlarni almashtirsa ruxsat etiladi (34(3)-modda).',
            'success' => 'Sabab qayd etildi.',
        ],
        'close' => [
            'label' => 'Yopish',
            'success' => 'Buzilish yopildi.',
        ],
    ],
];
