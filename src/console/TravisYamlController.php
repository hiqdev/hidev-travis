<?php

namespace hidev\travis\console;

/**
 * `travis.yml` file generation.
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class TravisYamlController extends \hidev\base\Controller
{
    public function actionIndex()
    {
        $this->take('.travis.yml')->save();
    }
}
