<?php
declare(strict_types=1);

namespace Candidate\PromoWidget\Block;

use Candidate\PromoWidget\Helper\Config;
use Magento\Catalog\Model\Product;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context;

/**
 * Promo class
 */
class Promo extends Template
{
    /**
     * @param Context $context
     * @param Config $config
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        protected Config $config,
        protected Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        $config = [];

        if ($this->config->isEnabled()) {
            $config = [
                'message' => $this->config->getMessage(),
                'delay' => $this->config->getDelay(),
                'bgColor' => $this->config->getBackgroundColor(),
                'textColor' => $this->config->getTextColor(),
            ];
        }
        return $config;
    }

    /**
     *
     * @return Product|null
     */
    public function getCurrentProduct(): ?Product
    {
        return $this->registry->registry('current_product');
    }

    /**
     * Check if the promo widget should be displayed on the current product page
     *
     * @return bool
     */
    public function canShowPromo(): bool
    {
        if ($this->config->isShowInAllPdpEnabled()) {
            return true;
        }

        $product = $this->getCurrentProduct();
        if (!$product) {
            return false;
        }

        $productIds = $this->config->getProductIds();
        return in_array($product->getId(), $productIds);
    }
}