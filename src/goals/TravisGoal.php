<?php

/*
 * Travis plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (https://hiqdev.com/)
 */

namespace hidev\travisci\goals;

use Yii;

/**
 * Goal for Travis CI.
 */
class TravisGoal extends \hidev\goals\DefaultGoal
{
    public function actionInstall()
    {
        Yii::warning('travis/install');
    }

    public function actionScript()
    {
        Yii::warning('travis/script');
    }
}
