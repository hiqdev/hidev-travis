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
        if ($this->package->fullName == 'hiqdev/hidev') {
            return './bin';
        }
        if ($this->config->get('composer.json')->hasRequireAny('hiqdev/hidev')) {
            return './vendor/bin';
        }

        return '$HOME/.composer/vendor/bin';
    }

    public $globalRequires = [
        'fxp/composer-asset-plugin:~1.1' => 1,
        'yiisoft/yii2-composer:~2.0'     => 1,
    ];

    public function getGlobalRequiresString()
    {
        return '"' . implode('" "', array_keys($this->globalRequires)) . '"';
    }

    /**
     * Reorders config elements
     */
    public function actionSave()
    {
        $this->setItems([
            'sudo'    => false,
            'install' => [
                'travis_retry composer self-update',
                'travis_retry composer global require ' . $this->getGlobalRequiresString(),
                'travis_retry composer install --no-interaction',
                $this->getBin() . '/hidev travis/install',
            ],
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
