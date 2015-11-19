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
 */
class TravisYmlGoal extends \hidev\goals\TemplateGoal
{
    protected $_file = '.travis.yml';

    protected $_items = [
        'sudo'    => false,
        'install' => ['hidev travis/install'],
        'script'  => ['hidev travis/script'],
    ];

    /**
     * Reorders config elements
     */
    public function actionSave()
    {
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
