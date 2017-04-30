<?php

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
