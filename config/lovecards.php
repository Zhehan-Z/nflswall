<?php

return [
    'template_directory' => env('lovecards.template_directory', 'index'),
    'api' => [
        'Cards' => [
            //默认卡片状态ON/OFF:0/1
            'DefSetCardsStatus' => env('lovecards.DefSetCardsStatus', 1),
            //默认添加卡片上传图片个数
            'DefSetCardsImgNum' => env('lovecards.DefSetCardsImgNum', 9),
            //默认添加卡片标签个数
            'DefSetCardsTagNum' => env('lovecards.DefSetCardsTagNum', 3)
        ],
        'CardsComments' => [
            //默认评论状态ON/OFF:0/1
            'DefSetCardsCommentsStatus' => env('lovecards.DefSetCardsCommentsStatus', 1),
            //默认添加评论上传图片个数
            'DefCardsSetCommentsImgNum' => env('lovecards.DefCardsSetCommentsImgNum', 3)
        ],
        'Upload' => [
            //最大上传图片大小 单位:M
            'DefSetCardsImgSize' => env('lovecards.DefSetCardsImgSize', 6)
        ]
    ],
    'class' => [
        'geetest' => [
            //默认全局验证ON/OFF:1/0
            'DefSetValidatesStatus' => env('lovecards.DefSetValidatesStatus', 1),
            //默认添加卡片上传图片个数
            'DefSetGeetestId' => env('lovecards.DefSetGeetestId', '28c2b3f2b4070237f1d32c926061210c'),
            //默认添加卡片标签个数
            'DefSetGeetestKey' => env('lovecards.DefSetGeetestKey', '3e0f68c3ca0d5db88eee5dfc21a724de')
        ]
    ]
];
