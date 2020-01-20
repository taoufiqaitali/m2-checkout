<?php
namespace Tabby\Checkout\Gateway\Config;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Config extends \Magento\Payment\Gateway\Config\Config
{
	const CODE = 'tabby_checkout';

    const KEY_PUBLIC_KEY = 'public_key';
    const KEY_SECRET_KEY = 'secret_key';

	const KEY_ORDER_HISTORY_USE_PHONE = 'order_history_use_phone';

    var $_info = null;
    /**
     * Tabby config constructor
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param null|string $methodCode
     * @param string $pathPattern
     * @param Json|null $serializer
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        $methodCode = self::CODE,
        $pathPattern = \Magento\Payment\Gateway\Config\Config::DEFAULT_PATH_PATTERN,
        Json $serializer
    ) {
        parent::__construct($scopeConfig, $methodCode, $pathPattern);
        $this->serializer = $serializer;
		$this->_info = $methodCode . '-' . $pathPattern;
    }

	public function getPublicKey($storeId = null) {
		return $this->getValue(self::KEY_PUBLIC_KEY, $storeId);
	}
	public function getSecretKey($storeId = null) {
		return $this->getValue(self::KEY_SECRET_KEY, $storeId);
	}
	
}
