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
 * Goal for .travis.yml config file.
 */
class TravisYamlController extends \hidev\controllers\FileController
{
    protected $_file = '.travis.yml';

    protected $_bin;

    public $sudo = false;

    public function getBin()
    {
        if ($this->_bin === null) {
            $this->_bin = $this->detectBin();
        }

        return $this->_bin;
    }

    public function detectBin()
    {
        if ($this->takePackage()->fullName === 'hiqdev/hidev') {
            return './bin/hidev';
        }
        if ($this->takePackage()->hasRequireAny('hiqdev/hidev')) {
            return './vendor/bin/hidev';
        }

        return './hidev.phar';
    }

    public function getBeforeInstall()
    {
        $commands = $this->get('before_install');
        if ($this->getItem('language') != 'php') {
            $this->sudo = true;
            $commands[] = 'sudo add-apt-repository --yes ppa:ondrej/php';
            $commands[] = 'sudo apt-get update';
            $commands[] = 'sudo apt-get install php5.6-cli php5.6-mbstring';
            $commands[] = 'env php -v';
        }
        if ($this->bin === './hidev.phar') {
            $commands[] = 'wget http://hiqdev.com/hidev/hidev.phar -O hidev.phar && chmod a+x hidev.phar';
        } else {
            $commands[] = 'composer install --no-interaction';
        }
        $commands[] = $this->getBin() . ' --version';
        $commands[] = $this->getBin() . ' travis/before_install';

        return array_values(array_unique($commands));
    }

    /**
     * Reorders config elements.
     */
    public function actionSave()
    {
        $add_items = [
            'sudo'           => false,
            'before_install' => $this->getBeforeInstall(),
        ];
        foreach (['install', 'before_script', 'script', 'after_success', 'after_failure', 'after_script'] as $event) {
            if ($this->getTravis()->{$event}) {
                $add_items[$event] = [$this->getBin() . ' travis/' . $event];
            }
        }
        $this->setItems($add_items);
        $items = $this->_items;
        $lang = $items['language'];
        $lops = $items[$lang];
        unset($items['language'], $items[$lang]);
        $this->_items = [
            'language' => $lang,
            $lang      => $lops,
        ] + $items;
        $this->setItem('sudo', $this->sudo);
        return parent::actionSave();
    }

    public function getTravis()
    {
        return $this->takeGoal('travis');
    }
}
