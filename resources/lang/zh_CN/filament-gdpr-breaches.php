<?php

return [
    'resource' => [
        'label' => '违规',
        'plural_label' => '数据违规',
    ],

    'fields' => [
        'title' => '标题',
        'description' => '描述',
        'status' => '状态',
        'risk' => '风险',
        'discovered_at' => '知悉时间',
        'occurred_at' => '发生时间',
        'due_at' => '通知截止',
        'data_categories' => '数据类别',
        'affected_subjects' => '受影响的数据主体',
        'measures' => '措施',
        'authority' => '监管机构',
        'subjects' => '数据主体',
        'authority_notified_at' => '通知监管机构时间',
        'authority_reference' => '监管机构编号',
        'delay_reason' => '延迟原因',
        'phased' => '分阶段通知',
        'further_information_at' => '补充信息发送时间',
        'subjects_notified_at' => '已通知数据主体时间',
        'no_subject_notice_reason' => '为何不通知数据主体',
        'notified_at' => '通知时间',
        'closed_at' => '关闭时间',
    ],

    'help' => [
        'discovered_at' => '您知悉该违规的时间。72小时期限从此开始，之后无法更改（第33(1)条）。',
        'delay_reason' => '超过72小时后必填（第33(1)条）。',
        'phased' => '当部分信息仍缺失并将稍后提供时开启（第33(4)条）。',
    ],

    'risk' => [
        'pending' => '评估中',
        'unlikely' => '不太可能产生风险',
        'risk' => '风险',
        'high' => '高风险',
    ],

    'status' => [
        'open' => '处理中',
        'pending' => '待通知',
        'overdue' => '已逾期',
        'closed' => '已关闭',
    ],

    'actions' => [
        'assess' => [
            'label' => '评估风险',
            'description' => '对个人构成风险的违规必须通知监管机构（第33条）。高风险还必须告知数据主体（第34条）。请在措施中记录理由。',
            'success' => '已评估风险。',
        ],
        'notify_authority' => [
            'label' => '已通知监管机构',
            'success' => '已记录对监管机构的通知。',
        ],
        'further_information' => [
            'label' => '已发送补充信息',
            'success' => '已记录补充信息。',
        ],
        'notify_subjects' => [
            'label' => '已通知数据主体',
            'success' => '已记录对数据主体的通知。',
        ],
        'skip_subject_notice' => [
            'label' => '无需告知',
            'description' => '适用于数据不可读（如已加密）、后续措施使高风险不再可能，或以公开通告代替逐一告知的情形（第34(3)条）。',
            'success' => '已记录理由。',
        ],
        'close' => [
            'label' => '关闭',
            'success' => '违规已关闭。',
        ],
    ],
];
