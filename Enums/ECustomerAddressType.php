<?php
namespace CustomerBundle\Enums;


class ECustomerAddressType
{
    const BASE = 100;
    const BILLING = 200;
    const DELIVERY = 300;

    public function ToString($type)
    {
        switch ($type) {
            case self::BASE:
                return 'ecustomeraddress.base';
            case self::BILLING:
                return 'ecustomeraddress.billing';
            case self::DELIVERY:
                return 'ecustomeraddress.delivery';
            default:
                return 'ecustomeraddress.undefined';
        }

    }

}