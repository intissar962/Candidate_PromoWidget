<?php
declare(strict_types=1);

namespace Candidate\PromoWidget\Block;

use Candidate\PromoWidget\Helper\Config;
use Magento\Framework\View\Element\Template;

/**
 * Promo class
 */
class Promo extends Template
{
    /**
     * @param Template\Context $context
     * @param Config $config
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        protected Config $config,
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
                'bgColor' => $this->config->getBackgroundColor(),
                'textColor' => $this->config->getTextColor(),
            ];
        }
        return $config;
    }
}