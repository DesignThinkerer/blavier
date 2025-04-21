<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => 'b30196b4e56fac78552ed58fda9aabb09209c5bc',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => 'b30196b4e56fac78552ed58fda9aabb09209c5bc',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'friendsofphp/php-cs-fixer' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => 'v3.73.1',
            ),
        ),
        'htmlburger/carbon-fields' => array(
            'pretty_version' => 'v3.6.5',
            'version' => '3.6.5.0',
            'reference' => 'b18f8e2a2cc4cc976306eb867ad1d740a8e7c1d9',
            'type' => 'library',
            'install_path' => __DIR__ . '/../htmlburger/carbon-fields',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'php-cs-fixer/shim' => array(
            'pretty_version' => 'v3.73.1',
            'version' => '3.73.1.0',
            'reference' => '6bcfe9ff734019315cf9c6ea4f43cbcd87d1cc82',
            'type' => 'application',
            'install_path' => __DIR__ . '/../php-cs-fixer/shim',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
    ),
);
