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
    public function actionBefore_install()
    {
        return $this->runRequests($this->before_install);
    }

    public function actionInstall()
    {
        return $this->runRequests($this->install);
    }

    public function actionBefore_script()
    {
        return $this->runRequests($this->before_script);
    }

    public function actionScript()
    {
        return $this->runRequests($this->script);
    }

    public function actionAfter_success()
    {
        return $this->runRequests($this->after_success);
    }

    public function actionAfter_failure()
    {
        return $this->runRequests($this->after_failure);
    }

    public function actionAfter_script()
    {
        return $this->runRequests($this->after_script);
    }
}
