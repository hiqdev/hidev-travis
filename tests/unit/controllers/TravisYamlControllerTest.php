<?php

/*
 * Travis CI plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\travis\tests\unit\controllers;

use hidev\travis\controllers\TravisYamlController;

/**
 * Tests for TravisYamlController.
 */
class TravisYamlControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TravisYamlController
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new TravisYamlController('.travis.yaml', null);
    }

    protected function tearDown()
    {
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('hidev\base\Controller', $this->object);
    }
}
