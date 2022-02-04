<?php

namespace Codilar\Brand\Model;

class Product extends \Magento\Catalog\Model\Product
{
    public function getName()
    {
        $name = parent::getName();
        $price = $this->getPrice();
        if ($price <= 300) {
            $name .= ' (!!on sale!!)';
        }
        return $name;
    }
}
