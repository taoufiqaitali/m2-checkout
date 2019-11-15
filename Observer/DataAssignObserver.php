<?php
namespace Tabby\Checkout\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;

class DataAssignObserver extends AbstractDataAssignObserver
{
	const ADDITIONAL_DATA_FIELD = 'additional_data';
	const CHECKOUT_ID_FIELD 	= 'checkout_id';

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $method = $this->readMethodArgument($observer);
        $data = $this->readDataArgument($observer);
        $paymentInfo = $method->getInfoInstance();

		$cid_path = \Magento\Sales\Api\Data\OrderPaymentInterface::ADDITIONAL_DATA . '/' . self::CHECKOUT_ID_FIELD;
        if ($data->getDataByPath($cid_path) !== null) {
            $paymentInfo->setAdditionalInformation(
                self::CHECKOUT_ID_FIELD,
                $data->getDataByPath($cid_path)
            );
        }
    }
}
