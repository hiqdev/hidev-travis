<?php
/**
 * Travis CI plugin for HiDev.
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

return [
    'controllerMap' => [
        'travis' => [
            'class'   => \hidev\travis\console\TravisController::class,
        ],
        '.travis.yml' => [
            'class' => \hidev\travis\console\TravisYamlController::class,
        ],
    ],
    'components' => [
        'travis' => [
            'class'   => \hidev\travis\components\Travis::class,
            'install' => [''],
            'script'  => ['build'],
        ],
        '.travis.yml' => [
            'class' => \hidev\travis\components\TravisYaml::class,
        ],
        'readme' => [
            'knownBadges' => [
                'travis.build' => '[![Build Status](https://img.shields.io/travis/{{ app.github.full_name }}.svg)](https://travis-ci.org/{{ app.github.full_name }})',
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@hidev/views' => ['@hidev/travis/views'],
                ],
            ],
        ],
    ],
];
