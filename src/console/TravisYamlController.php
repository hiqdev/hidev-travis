<?php
/**
 * Travis CI plugin for HiDev.
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

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
