<?php
/**
 * Travis CI plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\travis\console;

/**
 * Travis CI.
 */
class TravisController extends \hidev\base\Controller
{
    public $defaultAction = 'run';

    public function actionRun()
    {
        $this->runActions(['before-install', 'install']);
        $res = $this->runActions(['before-script', 'script']);
        $this->runAction(!static::isResponseOk($res) ? 'after-failure' : 'after-success');
        $this->runAction('after-script');

        return $res;
    }

    public function actionBeforeInstall()
    {
        return $this->runRequests($this->getComponent()->before_install);
    }

    public function actionInstall()
    {
        return $this->runRequests($this->getComponent()->install);
    }

    public function actionBeforeScript()
    {
        return $this->runRequests($this->getComponent()->before_script);
    }

    public function actionScript()
    {
        return $this->runRequests($this->getComponent()->script);
    }

    public function actionAfterSuccess()
    {
        return $this->runRequests($this->getComponent()->after_success);
    }

    public function actionAfterFailure()
    {
        return $this->runRequests($this->getComponent()->after_failure);
    }

    public function actionAfterScript()
    {
        return $this->runRequests($this->getComponent()->after_script);
    }

    public function getComponent()
    {
        return $this->take('travis');
    }
}
