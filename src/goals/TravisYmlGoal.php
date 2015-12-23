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
 * Goal for .travis.yml config file.
 * For the moment PHP projects only.
 */
class TravisYmlGoal extends \hidev\goals\TemplateGoal
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
        if ($this->package->fullName === 'hiqdev/hidev') {
            return './bin/hidev';
        }
        if ($this->package->hasRequireAny('hiqdev/hidev')) {
            return './vendor/bin/hidev';
        }

        return './hidev.phar';
    }

    public function getInstallCommands()
    {
        /*$commands = [
            'travis_retry composer self-update 1.0.0-alpha11',
            'travis_retry composer global require "fxp/composer-asset-plugin:~1.1"',
        ];*/
        $commands = [];
        if ($this->bin === './hidev.phar') {
            $commands[] = 'wget http://hiqdev.com/hidev/hidev.phar && chmod a+x hidev.phar';
        }

        $grs = $this->getGlobalRequiresString();
        if ($grs) {
            $commands[] = "travis_retry composer global require $grs";
        }
        return array_merge($commands, [
            'travis_retry composer install --no-interaction',
            $this->getBin() . ' travis/install',
        ]);
    }

    public function getGlobalRequiresString()
    {
        $req = [];
        foreach ($this->config->install->require as $k => $v) {
            if ($this->package->fullName === $k || $this->package->hasRequireAny($k)) {
                continue;
            }
            $req[] = "\"$k:$v\"";
        }
        sort($req);

        return $req ? implode(' ', $req) : '';
    }

    /**
     * Reorders config elements.
     */
    public function actionSave()
    {
        $add_items = [
            'sudo'              => false,
        //  'before_install'    => [$this->getBin() . ' travis/before_install'],
            'install'           => $this->getInstallCommands(),
        ];
        foreach (['before_script', 'script', 'after_success', 'after_failure', 'after_script'] as $event) {
            if ($this->getTravis()->get($event)) {
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
        parent::actionSave();
    }

    public function getTravis()
    {
        return $this->getConfig()->get('travis');
    }
}
