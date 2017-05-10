
define([
        'ko',
        'uiComponent',
        'Magento_Checkout/js/model/quote',
        'Magento_Catalog/js/price-utils'

    ], function (ko, Component, quote, priceUtils) {
        'use strict';
        var show_hide_Extrafee_blockConfig = window.checkoutConfig.show_hide_Extrafee_shipblock;
        var fee_label = window.checkoutConfig.fee_label;         
        var custom_fee_amount = window.checkoutConfig.custom_fee_amount;
        
        return Component.extend({
            defaults: {
                template: 'Magecomp_Extrafee/checkout/shipping/custom-fee'
            },
            canVisibleExtrafeeBlock: show_hide_Extrafee_blockConfig,
            getFormattedPrice: ko.observable(priceUtils.formatPrice(custom_fee_amount, quote.getPriceFormat())),
            getFeeLabel:ko.observable(fee_label)
        });
    });
