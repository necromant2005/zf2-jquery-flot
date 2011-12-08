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

    public function render($placeholder, array $options=array())
    {
        $dataString = '';
        $optionsString = '';

        //{ label: "sin(x)",  data: d1}
        $list = array();
        foreach ($this->getDatas() as $item) {
            $datas = array();
            foreach ($item[self::FIELD_DATA] as $key=>$value) {
                $datas[] = '[' . $key . ', ' . $value . ']';
            }
            $optionsList = array();
            foreach ($item as $name=>$value) {
                if ($name==self::FIELD_DATA) continue;
                $optionsList[] = $name . ':"' . $value . '"';
            }
            $list[] = '    {' . join(', ', $optionsList) . ( (!empty($optionsList)) ? ', ' : '' ) .  'data: [' . join(', ', $datas) . ']}';
        }
        $dataString = '[' . PHP_EOL . join(', ', $list) . PHP_EOL . ']';

        $buffer = '$.plot($("' . $placeholder . '"),' . PHP_EOL;
        $buffer .= $dataString . PHP_EOL;
        $buffer .= ($optionsString) ? ', ' . $optionsString . PHP_EOL : '';
        $buffer .= ');';
        return $buffer;
    }
}

