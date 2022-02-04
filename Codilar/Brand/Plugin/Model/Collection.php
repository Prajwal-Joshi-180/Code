<?php

namespace Codilar\Brand\Plugin\Model;

use Magento\Review\Model\ResourceModel\Review\Collection as Subject;

class Collection
{
    /**
     * @param Subject $subject
     * @param $result
     * @return string
     */
    public function afterLoad(Subject $subject, $result)
    {
        if($subject->getSize()<1){
            echo "This product is Good !!!";
            die();
        }
        return $result;
    }

}
