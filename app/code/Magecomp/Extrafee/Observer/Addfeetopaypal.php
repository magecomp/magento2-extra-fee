<?php

namespace Magecomp\Extrafee\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Store\Model\StoreManagerInterface;
use \Magento\Checkout\Model\Session;
use Magecomp\Extrafee\Helper\Data;

class Addfeetopaypal implements ObserverInterface
{
    protected $checkout;
    protected $helper;

    public function __construct(Session $checkout,
                                Data $helper
    )
    {
        $this->checkout = $checkout;
        $this->helper = $helper;
    }

    public function execute(Observer $observer)
    {
        if(!$this->helper->isModuleEnabled()){
            return $this;
        }
        $cart = $observer->getEvent()->getCart();
        $quote = $this->checkout->getQuote();
        $customAmount = $quote->getFee();
        $label = $this->helper->getFeeLabel();
        if($customAmount) {
            $cart->addCustomItem($label, 1, $customAmount, $label);
        }
    }
}