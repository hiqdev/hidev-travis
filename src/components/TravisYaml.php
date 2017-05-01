<?php

/*
 * Travis CI plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\travis\components;

/**
 * `.travis.yml` config file.
 */
class TravisYaml extends \hidev\base\ConfigFile
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
        if ($this->take('package')->fullName === 'hiqdev/hidev') {
            return './bin/hidev';
        }
        if ($this->take('package')->hasRequireAny('hiqdev/hidev')) {
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
    public function save()
    {
        $this->addActionItems();
        $this->prependLanguageOptions();

        return parent::save();
    }

    public function addActionItems()
    {
        $add_items = [
            'sudo'           => false,
            'before_install' => $this->getBeforeInstall(),
        ];
        foreach (['install', 'before_script', 'script', 'after_success', 'after_failure', 'after_script'] as $event) {
            if ($this->take('travis')->{$event}) {
                $add_items[$event] = [$this->getBin() . ' travis/' . $event];
            }
        }
        $this->setItems($add_items);
    }

    public function prependLanguageOptions()
    {
        $items = $this->_items;
        $language = $items['language'] ?: $this->take('package')->getLanguage();
        $lang_ops = $items[$language];
        unset($items['language'], $items[$language]);
        $this->_items = [
            'language' => $language,
            $language  => $lang_ops,
        ] + $items;
        $this->setItem('sudo', $this->sudo);
    }
}
