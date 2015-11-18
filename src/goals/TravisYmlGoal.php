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

    public function getTemplate()
    {
        return 'travisci/travis-yml.twig';
    }

}
