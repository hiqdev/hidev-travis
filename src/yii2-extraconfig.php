<?php

/*
 * Travis CI plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

return [
    'components' => [
        'config' => [
            'travis' => [
                'class'   => 'hidev\travis\controllers\TravisController',
                'install' => [''],
                'script'  => ['build'],
            ],
            '.travis.yml' => [
                'class' => 'hidev\travis\controllers\TravisYamlController',
            ],
            'readme' => [
                'markdownBadges' => [
                    'travis.build' => '[![Build Status](https://img.shields.io/travis/{{ config.github.full_name }}.svg)](https://travis-ci.org/{{ config.github.full_name }})',
                ],
            ],
            'views' => [
                '@hidev/travis/views',
            ],
        ],
    ],
];
