<?php
/**
 * Travis CI plugin for HiDev.
 *
 * @link      https://github.com/hiqdev/hidev-travis
 * @package   hidev-travis
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\travis\tests\unit\console;

use hidev\travis\console\TravisYamlController;

/**
 * Tests for TravisYamlController.
 */
class TravisYamlControllerTest extends \PHPUnit\Framework\TestCase
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
        $this->assertInstanceOf(\hidev\base\Controller::class, $this->object);
    }
}
