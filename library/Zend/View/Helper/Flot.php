<?php
namespace Zend\View\Helper;

class Flot extends AbstractHelper
{
    protected $_datas = array();

    public function addData($data)
    {
        $this->_datas[] = $data;
    }

    public function getDatas()
    {
        return $this->_datas;
    }
}

