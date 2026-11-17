<?php

return [
    'resource' => [
        'label' => '侵害',
        'plural_label' => 'データ侵害',
    ],

    'fields' => [
        'title' => 'タイトル',
        'description' => '説明',
        'status' => 'ステータス',
        'risk' => 'リスク',
        'discovered_at' => '認知日時',
        'occurred_at' => '発生日時',
        'due_at' => '通知期限',
        'data_categories' => 'データカテゴリ',
        'affected_subjects' => '影響を受けたデータ主体',
        'measures' => '対策',
        'authority' => '監督機関',
        'subjects' => 'データ主体',
        'authority_notified_at' => '監督機関への通知日時',
        'authority_reference' => '監督機関の受付番号',
        'delay_reason' => '遅延の理由',
        'phased' => '段階的な通知',
        'further_information_at' => '追加情報の送付日時',
        'subjects_notified_at' => 'データ主体通知日時',
        'no_subject_notice_reason' => 'データ主体に通知しない理由',
        'notified_at' => '通知日時',
        'closed_at' => '完了日時',
    ],

    'help' => [
        'discovered_at' => '侵害を認知した日時です。72時間の期限はここから始まり、後から変更できません（第33条第1項）。',
        'delay_reason' => '72時間経過後は必須（第33条第1項）。',
        'phased' => '一部の情報がまだ不足しており後で送る場合にオンにします（第33条第4項）。',
    ],

    'risk' => [
        'pending' => '評価中',
        'unlikely' => 'リスクが生じる可能性は低い',
        'risk' => 'リスク',
        'high' => '高リスク',
    ],

    'status' => [
        'open' => '対応中',
        'pending' => '通知待ち',
        'overdue' => '期限切れ',
        'closed' => '完了',
    ],

    'actions' => [
        'assess' => [
            'label' => 'リスクを評価',
            'description' => '人々にリスクをもたらす侵害は監督機関に通知しなければなりません（第33条）。高リスクの場合はデータ主体にも連絡が必要です（第34条）。判断理由を措置欄に記録してください。',
            'success' => 'リスクを評価しました。',
        ],
        'notify_authority' => [
            'label' => '監督機関に通知済み',
            'success' => '監督機関への通知を記録しました。',
        ],
        'further_information' => [
            'label' => '追加情報を送付済み',
            'success' => '追加情報を記録しました。',
        ],
        'notify_subjects' => [
            'label' => 'データ主体に通知済み',
            'success' => 'データ主体への通知を記録しました。',
        ],
        'skip_subject_notice' => [
            'label' => '連絡不要',
            'description' => 'データが理解不能だった場合（暗号化など）、事後の措置で高リスクの可能性が低くなった場合、または公表が個別連絡に代わる場合に認められます（第34条第3項）。',
            'success' => '理由を記録しました。',
        ],
        'close' => [
            'label' => '完了にする',
            'success' => '侵害をクローズしました。',
        ],
    ],
];
