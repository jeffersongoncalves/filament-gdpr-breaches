<?php

return [
    'resource' => [
        'label' => 'İhlal',
        'plural_label' => 'Veri ihlalleri',
    ],

    'fields' => [
        'title' => 'Başlık',
        'description' => 'Açıklama',
        'status' => 'Durum',
        'risk' => 'Risk',
        'discovered_at' => 'Öğrenilme tarihi',
        'occurred_at' => 'Gerçekleşme',
        'due_at' => 'Bildirim son tarihi',
        'data_categories' => 'Veri kategorileri',
        'affected_subjects' => 'Etkilenen ilgili kişiler',
        'measures' => 'Önlemler',
        'authority' => 'Denetim makamı',
        'subjects' => 'İlgili kişiler',
        'authority_notified_at' => 'Makama bildirim tarihi',
        'authority_reference' => 'Makam referansı',
        'delay_reason' => 'Gecikme nedenleri',
        'phased' => 'Aşamalı bildirim',
        'further_information_at' => 'Ek bilgi gönderim tarihi',
        'subjects_notified_at' => 'İlgili kişilere bildirilme',
        'no_subject_notice_reason' => 'İlgili kişilere neden bildirilmiyor',
        'notified_at' => 'Bildirilme',
        'closed_at' => 'Kapanma',
    ],

    'help' => [
        'discovered_at' => 'İhlali öğrendiğiniz zaman. 72 saatlik süre burada başlar ve sonradan değiştirilemez (md. 33(1)).',
        'delay_reason' => '72 saatten sonra zorunludur (md. 33(1)).',
        'phased' => 'Bazı bilgiler henüz eksikse ve sonra gönderilecekse açın (md. 33(4)).',
    ],

    'risk' => [
        'pending' => 'Değerlendiriliyor',
        'unlikely' => 'Risk oluşturması muhtemel değil',
        'risk' => 'Risk',
        'high' => 'Yüksek risk',
    ],

    'status' => [
        'open' => 'Açık',
        'pending' => 'Bildirim bekliyor',
        'overdue' => 'Süresi geçmiş',
        'closed' => 'Kapalı',
    ],

    'actions' => [
        'assess' => [
            'label' => 'Riski değerlendir',
            'description' => 'Kişiler için risk oluşturan ihlal denetim makamına bildirilmelidir (md. 33). Yüksek risk ilgili kişilere de bildirilmelidir (md. 34). Gerekçeyi önlemlere kaydedin.',
            'success' => 'Risk değerlendirildi.',
        ],
        'notify_authority' => [
            'label' => 'Makama bildirildi',
            'success' => 'Makama bildirim kaydedildi.',
        ],
        'further_information' => [
            'label' => 'Ek bilgi gönderildi',
            'success' => 'Ek bilgi kaydedildi.',
        ],
        'notify_subjects' => [
            'label' => 'İlgili kişilere bildirildi',
            'success' => 'İlgili kişilere bildirim kaydedildi.',
        ],
        'skip_subject_notice' => [
            'label' => 'Bildirim gerekmiyor',
            'description' => 'Veriler anlaşılamaz durumdaysa (ör. şifreli), sonraki önlemler yüksek riski olası olmaktan çıkarıyorsa veya kamuya duyuru bireysel bildirimlerin yerini alıyorsa izin verilir (md. 34(3)).',
            'success' => 'Gerekçe kaydedildi.',
        ],
        'close' => [
            'label' => 'Kapat',
            'success' => 'İhlal kapatıldı.',
        ],
    ],
];
