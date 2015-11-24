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
            return './bin';
        }
        if ($this->package->hasRequireAny('hiqdev/hidev')) {
            return './vendor/bin';
        }

        return '$HOME/.composer/vendor/bin';
    }

    public function getInstallCommands()
    {
        $commands = [
            'travis_retry composer self-update 1.0.0-alpha11',
            'travis_retry composer global require "fxp/composer-asset-plugin:~1.1" "yiisoft/yii2-composer:~2.0"',
        ];

        $grs = $this->getGlobalRequiresString();
        if ($grs) {
            $commands[] = "travis_retry composer global require $grs";
        }
        return array_merge($commands, [
            'travis_retry composer install --no-interaction',
            $this->getBin() . '/hidev travis/install',
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
        return $req ? implode(' ', $req) : '';
    }

    /**
     * Reorders config elements.
     */
    public function actionSave()
    {
        $this->setItems([
            'sudo'    => false,
            'install' => $this->getInstallCommands(),
            'script'  => [$this->getBin() . '/hidev travis/script'],
        ]);
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
}
