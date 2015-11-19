<?php

/*
 * Travis plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (https://hiqdev.com/)
 */

namespace hidev\travisci;

class Plugin extends \hiqdev\pluginmanager\Plugin
{
    protected $_items = [
        'goals' => [
            'travis'      => 'hidev\travisci\goals\TravisGoal',
            '.travis.yml' => 'hidev\travisci\goals\TravisYmlGoal',
        ],
        'views' => [
            '@hidev/travisci/views',
        ],
    ];
}
