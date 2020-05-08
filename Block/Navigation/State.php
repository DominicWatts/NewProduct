<?php

namespace Xigen\NewProduct\Block\Navigation;

/**
 * State block class
 */
class State extends \Magento\LayeredNavigation\Block\Navigation\State
{
    /**
     * Catalog layer
     *
     * @var \Magento\Catalog\Model\Layer
     */
    protected $_catalogLayer;

    /**
     * State constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Xigen\NewProduct\Model\Layer\Resolver $layerResolver
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Xigen\NewProduct\Model\Layer\Resolver $layerResolver,
        array $data = []
    ) {
        $this->_catalogLayer = $layerResolver->get();
        parent::__construct($context, $layerResolver, $data);
    }
}
