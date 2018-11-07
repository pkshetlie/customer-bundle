<?php
/**
 * Created by PhpStorm.
 * User: pierr
 * Date: 07/11/2018
 * Time: 21:28
 */

namespace CustomerBundle\Enums;


class ECustomerType
{
    const PROSPECT = 100;
    const CLIENT = 200;

    public function ToString($type)
    {
        switch ($type) {
            case self::PROSPECT:
                return 'Prospect';
            case self::CLIENT:
                return 'Client';
            default:
                return 'Undefined';
        }

    }

}