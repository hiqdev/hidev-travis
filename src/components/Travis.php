<?php
/**
 * Travis CI plugin for HiDev.
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\travis\components;

/**
 * Travis CI.
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Travis extends \hidev\base\Component
{
    public $before_install;
    public $install;
    public $before_script;
    public $script;
    public $after_success;
    public $after_failure;
    public $after_script;

    public function getConfiguration()
    {
        return $this->take('.travis.yml');
    }
}
