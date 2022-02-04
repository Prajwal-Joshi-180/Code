<?php
namespace Codilar\HelloWorld\Block;

use Magento\Catalog\Api\ProductAttributeMediaGalleryManagementInterface;
use Magento\Catalog\Model\ProductRepository;
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;


class HelloWorld extends Template
{
    /**
     * @var Registry
     */
    private  $registry;

    /**
     * @var StockRegistryInterface
     */
    private  $stockRegistry;
    /**
     * @var
     */
    private $attributeMediaGalleryManagement;
    protected $_storeManager;

    /**
     * @param Template\Context $context
     * @param Registry $registry
     * @param ProductRepository $productRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Registry $registry,

        ProductRepository $productRepository,
        ProductAttributeMediaGalleryManagementInterface $attributeMediaGalleryManagement,
        \Magento\Store\Model\StoreManagerInterface $storemanager,
        array $data = []
    )
    {
        parent::__construct($context, $data);

        $this->_storeManager =  $storemanager;


        $this->registry = $registry;

        $this->attributeMediaGalleryManagement = $attributeMediaGalleryManagement;
    }

    /**
     * @return int
     */
    protected function getCurrentProduct()
    {
        return $this->registry->registry('product');
    }
    public function  getBrand()
    {
        $product=$this->getCurrentProduct();
        $productSku = $product->getSku();
        // return $this->attributeMediaGalleryManagement->getList($productSku);
        return $product->getAttributeText('brand');
    }

    /**
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getProductImageUsingCode(): string
    {
        $store = $this->_storeManager->getStore();
        return $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product';
    }
}