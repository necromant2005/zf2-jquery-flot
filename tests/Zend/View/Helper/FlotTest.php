<?php
namespace ZendTest\View\Helper;

use Zend\View\Helper;

class FlotTest extends \PHPUnit_Framework_TestCase
{
    public function testAddData()
    {
        $helper = new Helper\Flot;
        $helper->addData(array(1, 2, 3));
        $this->assertEquals(1, count($helper->getDatas()));
    }
}

