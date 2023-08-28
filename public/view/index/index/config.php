<?php
$Config = [
    //选择格式配置
    'Select' => [
        //链接资源CDN开关
        'ThemeLinkCDN' => [
            'Name' => '资源CDN开关',
            'Introduction' => 'HTML中的部分Link资源CDN的开关',
            'Default' => env('ThemeConfig.SelectThemeLinkCDN', 1),
            'Element' => [
                0 => false,
                1 => true,
            ]
        ],
        //默认暗色开关
        'ThemeDark' => [
            'Name' => '默认暗色开关',
            'Introduction' => '主题为默认暗色的开关',
            'Default' => env('ThemeConfig.SelectThemeDark', 0),
            'Element' => [
                0 => false,
                1 => true
            ]
        ],
        //MD主题色配置
        'ThemePrimary' => [
            'Name' => '默认暗色开关',
            'Introduction' => '主题为默认暗色的开关',
            'Default' => env('ThemeConfig.SelectThemePrimary', 4),
            'Element' => [
                0 => 'red',
                1 => 'pink',
                2 => 'purple',
                3 => 'deep-purple',
                4 => 'indigo',
                5 => 'blue',
                6 => 'light-blue',
                7 => 'cyan',
                8 => 'teal',
                9 => 'green',
                10 => 'light-green',
                11 => 'lime',
                12 => 'yellow',
                13 => 'amber',
                14 => 'orange',
                15 => 'deep-orange',
                16 => 'brown',
                17 => 'grey',
                18 => 'blue-grey'
            ]
        ],
        //MD强调色配置
        'ThemeAccent' => [
            'Name' => '默认暗色开关',
            'Introduction' => '主题为默认暗色的开关',
            'Default' => env('ThemeConfig.SelectThemeAccent', 1),
            'Element' => [
                0 => 'red',
                1 => 'pink',
                2 => 'purple',
                3 => 'deep-purple',
                4 => 'indigo',
                5 => 'blue',
                6 => 'light-blue',
                7 => 'teal',
                8 => 'green',
                9 => 'light-green',
                10 => 'lime',
                11 => 'yellow',
                12 => 'amber',
                13 => 'orange',
                14 => 'deep-orange',
                15 => 'blue-grey'
            ]
        ],
    ]
];