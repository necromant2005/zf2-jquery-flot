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

    public function testAddDataAndOptions()
    {
        $helper = new Helper\Flot;
        $helper->addData(array(1, 2, 3), array('label'=>'Test'));
        $this->assertEquals(array(
            array(
                'data'  => array(1, 2, 3),
                'label' => 'Test',
            )
        ), $helper->getDatas());
    }

    public function testRender()
    {
        $helper = new Helper\Flot;
        $helper->addData(array(1, 2, 3), array('label'=>'Test'));
        $content = $helper->render('#placeholder');
        $this->assertEquals(trim(file_get_contents(__DIR__ . '/_files/flot.txt')), $content);
    }
}

