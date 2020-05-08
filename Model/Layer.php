<?php

namespace Xigen\NewProduct\Model;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory as AttributeCollectionFactory;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

/**
 * Xigen NewProduct Layer model class
 */
class Layer extends \Magento\Catalog\Model\Layer
{
    /**
     * @var CollectionFactory
     */
    protected $productCollectionFactory;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $_localeDate;

    /**
     * Layer constructor.
     * @param \Magento\Catalog\Model\Layer\ContextInterface $context
     * @param \Magento\Catalog\Model\Layer\StateFactory $layerStateFactory
     * @param AttributeCollectionFactory $attributeCollectionFactory
     * @param \Magento\Catalog\Model\ResourceModel\Product $catalogProduct
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Registry $registry
     * @param CategoryRepositoryInterface $categoryRepository
     * @param CollectionFactory $productCollectionFactory
     * @param TimezoneInterface $localeDate
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Model\Layer\ContextInterface $context,
        \Magento\Catalog\Model\Layer\StateFactory $layerStateFactory,
        AttributeCollectionFactory $attributeCollectionFactory,
        \Magento\Catalog\Model\ResourceModel\Product $catalogProduct,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Registry $registry,
        CategoryRepositoryInterface $categoryRepository,
        CollectionFactory $productCollectionFactory,
        TimezoneInterface $localeDate,
        array $data = []
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->_localeDate = $localeDate;
        parent::__construct(
            $context,
            $layerStateFactory,
            $attributeCollectionFactory,
            $catalogProduct,
            $storeManager,
            $registry,
            $categoryRepository,
            $data
        );
    }

    /**
     * Get newproduct product collection
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     * @throws \Zend_Date_Exception
     */
    public function getProductCollection()
    {
        if (isset($this->_productCollections['xigen_custom'])) {
            $collection = $this->_productCollections['xigen_custom'];
        } else {
            $todayStartOfDayDate = $this->_localeDate->date()->setTime(0, 0, 0)->format('Y-m-d H:i:s');
            $todayEndOfDayDate = $this->_localeDate->date()->setTime(23, 59, 59)->format('Y-m-d H:i:s');

            $collection = $this->productCollectionFactory->create();

            $date = new \Zend_Date();

            $collection->addAttributeToFilter(
                'news_from_date',
                [
                    'or' => [
                        0 => ['date' => true, 'to' => $todayEndOfDayDate],
                        1 => ['is' => new \Zend_Db_Expr('null')],
                    ]
                ],
                'left'
            );

            $collection->addAttributeToFilter(
                'news_to_date',
                [
                    'or' => [
                        0 => ['date' => true, 'from' => $todayStartOfDayDate],
                        1 => ['is' => new \Zend_Db_Expr('null')],
                    ]
                ],
                'left'
            );

            $collection->addAttributeToFilter(
                [
                    ['attribute' => 'news_from_date', 'is' => new \Zend_Db_Expr('not null')],
                    ['attribute' => 'news_to_date', 'is' => new \Zend_Db_Expr('not null')],
                ]
            );

            $this->prepareProductCollection($collection);
            $this->_productCollections['xigen_custom'] = $collection;
        }
        return $collection;
    }
}
