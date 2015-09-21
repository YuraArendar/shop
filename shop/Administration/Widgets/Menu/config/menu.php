<?php
return [

    'dashboard'=>[
        'icon'=>'home',
        'name'=>'Dashboard',
        'link'=>'#',
        'childNode'=>[]
    ],
    'structure'=>[
        'icon'=>'home',
        'name'=>'Structure',
        'link'=>'/cms/structure',
        'childNode'=>[]
    ],
    'pages'=>[
        'icon'=>'copy',
        'name'=>'Pages',
        'link'=>'#',
        'childNode'=>[
            'sign_up'=>[
                'name'=>'Sign Up',
                'link'=>'#',
                'childNode'=>[]
            ],
            'sign_in'=>[
                'name'=>'Sign In',
                'link'=>'#',
                'childNode'=>[]
            ],
            'recover_password'=>[
                'name'=>'Recover Password',
                'link'=>'#',
                'childNode'=>[]
            ],

            'locked_screen'=>[
                'name'=>'Locked Screen',
                'link'=>'#',
                'childNode'=>[]
            ],

            'user_profile'=>[
                'name'=>'User Profile',
                'link'=>'#',
                'childNode'=>[
                    'sign_in'=>[
                        'name'=>'Sign In',
                        'link'=>'#',
                        'childNode'=>[]
                    ],
                    'recover_password'=>[
                        'name'=>'Recover Password',
                        'link'=>'#',
                        'childNode'=>[]
                    ],

                    'locked_screen'=>[
                        'name'=>'Locked Screen',
                        'link'=>'#',
                        'childNode'=>[]
                    ],
                ]
            ],

            'session_timeout'=>[
                'name'=>'Session Timeout',
                'link'=>'#',
                'childNode'=>[]
            ],

        ]
    ]

];