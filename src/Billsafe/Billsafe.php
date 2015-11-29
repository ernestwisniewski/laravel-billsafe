<?php namespace ErnestWisniewski\LaravelBillsafe;

use ErnestWisniewski\Billsafe\Sdk;
use ErnestWisniewski\Billsafe\Logger;
use ErnestWisniewski\Billsafe\Logger\LoggerEcho;
use ErnestWisniewski\Billsafe\Logger\LoggerFile;
use ErnestWisniewski\Billsafe\Logger\LoggerMail;
use ErnestWisniewski\Billsafe\Logger\LoggerNull;

class Billsafe {

    /**
     * @return Sdk
     */
    public function sdk()
    {
        $config = config_path('billsafe.php');

        if (\File::exists($config))
        {
            return new Sdk($config);
        }

        return new Sdk();
    }

    /**
     * @param $type
     * @param string $attr
     * @return mixed | Logger Object
     */
    public function logger($type, $attr = '')
    {
        $class = Logger::class;
        $type = $class . '\\' . $type;

        return new $type($attr);
    }
}