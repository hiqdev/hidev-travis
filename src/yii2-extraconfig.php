<?php

/*
 * Travis CI plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis-ci
 * @package   hidev-travis-ci
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
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
                    'travis.build' => '[![Build Status](https://img.shields.io/travis/{{ config.github.name }}.svg)](https://travis-ci.org/{{ config.github.name }})',
                ],
            ],
            'views' => [
                '@hidev/travis/views',
            ],
        ],
    ],
];
