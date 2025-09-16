<?php
declare(strict_types=1);

namespace Candidate\PromoWidget\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Config class
 */
class Config extends AbstractHelper
{
    /** @var string  */
    protected const XML_PATH_SYSTEM_CONFIG_CANDIDATE_PROMOWIDGET_ENABLE = 'candidate_promowidget/general/enable';

    /** @var string  */
    protected const XML_PATH_SYSTEM_CONFIG_CANDIDATE_PROMOWIDGET_MESSAGE = 'candidate_promowidget/general/message';

    /** @var string  */
    protected const XML_PATH_SYSTEM_CONFIG_CANDIDATE_PROMOWIDGET_BG_COLOR = 'candidate_promowidget/general/bg_color';

    /** @var string  */
    protected const XML_PATH_SYSTEM_CONFIG_CANDIDATE_PROMOWIDGET_TEXT_COLOR = 'candidate_promowidget/general/text_color';

       /**
     * @param $field
     * @param $storeId
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null): mixed
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @param $storeId
     * @return bool
     */
    public function isEnabled($storeId = null): bool
    {
        return (bool)$this->getConfigValue(self::XML_PATH_SYSTEM_CONFIG_CANDIDATE_PROMOWIDGET_ENABLE, $storeId);
    }

    /**
     * @param $storeId
     * @return string
     */
    public function getMessage($storeId = null): string
    {
        return $this->getConfigValue(self::XML_PATH_SYSTEM_CONFIG_CANDIDATE_PROMOWIDGET_MESSAGE, $storeId);
    }

    /**
     * @param $storeId
     * @return string
     */
    public function getBackgroundColor($storeId = null): string
    {
        return $this->getConfigValue(self::XML_PATH_SYSTEM_CONFIG_CANDIDATE_PROMOWIDGET_BG_COLOR, $storeId);
    }

    /**
     * @param $storeId
     * @return string
     */
    public function getTextColor($storeId = null): string
    {
        return $this->getConfigValue(self::XML_PATH_SYSTEM_CONFIG_CANDIDATE_PROMOWIDGET_TEXT_COLOR, $storeId);
    }
}
