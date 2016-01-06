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
    'composer' => [
        'goals' => [
            'travis' => [
                'class'   => 'hidev\travisci\goals\TravisGoal',
                'install' => [''],
                'script'  => ['build'],
            ],
            '.travis.yml' => 'hidev\travisci\goals\TravisYmlGoal',
            'readme'      => [
                'markdownBadges' => [
                    'travis.build'    => '[![Build Status](https://img.shields.io/travis/{{ config.github.name }}.svg)](https://travis-ci.org/{{ config.github.name }})',
                ],
            ],
        ],
        'views' => [
            '@hidev/travisci/views',
        ],
    ],
];
