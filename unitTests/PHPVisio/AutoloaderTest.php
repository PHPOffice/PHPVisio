<?php


class AutoloaderTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        if (!defined('PHPVISIO_ROOT'))
        {
            define('PHPVISIO_ROOT', APPLICATION_PATH . '/');
        }
        require_once(PHPVISIO_ROOT . 'PHPVisio/Autoloader.php');
    }

    public function testAutoloaderNonPHPVisioClass()
    {
        $className = 'InvalidClass';

        $result = PHPVisio_Autoloader::Load($className);
        //    Must return a boolean...
        $this->assertTrue(is_bool($result));
        //    ... indicating failure
        $this->assertFalse($result);
    }

    public function testAutoloaderInvalidPHPVisioClass()
    {
        $className = 'PHPVisio_Invalid_Class';

        $result = PHPVisio_Autoloader::Load($className);
        //    Must return a boolean...
        $this->assertTrue(is_bool($result));
        //    ... indicating failure
        $this->assertFalse($result);
    }

    public function testAutoloadValidPHPVisioClass()
    {
        $className = 'PHPVisio_IOFactory';

        $result = PHPVisio_Autoloader::Load($className);
        //    Check that class has been loaded
        $this->assertTrue(class_exists($className));
    }

    public function testAutoloadInstantiateSuccess()
    {
        $result = new PHPVisio(1,2,3);
        //    Must return an object...
        $this->assertTrue(is_object($result));
        //    ... of the correct type
        $this->assertTrue(is_a($result,'PHPVisio'));
    }

}