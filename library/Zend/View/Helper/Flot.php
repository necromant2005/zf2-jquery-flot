<?php
namespace Zend\View\Helper;

class Flot extends AbstractHelper
{
    const FIELD_DATA = 'data';

    protected $_datas = array();

    public function addData($data, $options=array())
    {
        $options[self::FIELD_DATA] = $data;
        $this->_datas[] = $options;
    }

    public function getDatas()
    {
        return $this->_datas;
    }
}

