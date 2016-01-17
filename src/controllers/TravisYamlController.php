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
        $commands = array_values(array_unique($this->get('before_install')));
        if ($this->bin === './hidev.phar') {
            $commands[] = 'wget http://hiqdev.com/hidev/hidev.phar -O hidev.phar && chmod a+x hidev.phar';
        }
        if ($this->bin === './bin/hidev') {
            $commands[] = 'travis_retry composer install --no-interaction';
        }
        $commands[] = $this->getBin() . ' --version';
        $commands[] = $this->getBin() . ' travis/before_install';

        return $commands;
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
        return parent::actionSave();
    }

    public function getTravis()
    {
        return $this->takeGoal('travis');
    }
}
