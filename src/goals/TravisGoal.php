<?php

/*
 * Travis plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (https://hiqdev.com/)
 */

namespace hidev\travis\goals;

/**
 * Goal for Travis.
 */
class TravisGoal extends \hidev\goals\DefaultGoal
{
    public $isBuilt        = false;
    public $isBootstrapped = false;

    public function actionMake()
    {
        $this->actionLoad();
        $this->actionConfig();
        $this->actionBuild();
        $this->actionRun();
    }

    public function actionLoad()
    {
        $this->isBootstrapped = $this->config->get('.travis.yml')->exists();
    }

    public function actionConfig()
    {
        $this->module->runAction('.travis.yml');
    }

    public function actionRun()
    {
        passthru('travis run');
    }

    public function build()
    {
        passthru('travis build');
    }

    public function actionBuild()
    {
        if (!$this->isBuilt) {
            $this->isBuilt = true;
            $this->build();
        }
    }

    public function bootstrap()
    {
        passthru('travis bootstrap');
    }

    public function actionBootstrap($force = false)
    {
        if (!$this->isBootstrapped || $force) {
            $this->isBootstrapped = true;
            $this->bootstrap();
        }
    }
}
