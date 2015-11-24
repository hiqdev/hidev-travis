<?php

/*
 * Travis CI plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis-ci
 * @package   hidev-travis-ci
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

namespace hidev\travisci\goals;

/**
 * Goal for Travis CI.
 */
class TravisGoal extends \hidev\goals\DefaultGoal
{
    public $installRequest = '';
    public $scriptRequest = 'build';

    public function actionInstall()
    {
        return $this->runRequest($this->installRequest);
    }

    public function actionScript()
    {
        return $this->runRequest($this->scriptRequest);
    }

    public function runRequest($request)
    {
        if ($request !== null) {
            return $this->module->runRequest($request);
        }
    }
}
