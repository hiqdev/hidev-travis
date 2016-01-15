<?php

/*
 * Travis CI plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\travis\controllers;

/**
 * Goal for Travis CI.
 */
class TravisController extends \hidev\controllers\CommonController
{
    public $before_install;
    public $install;
    public $before_script;
    public $script;
    public $after_success;
    public $after_failure;
    public $after_script;

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
