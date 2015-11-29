<?php namespace ErnestWisniewski\LaravelBillsafe;

use Illuminate\Support\Facades\URL;
use ErnestWisniewski\Billsafe\Sdk;

class Billsafe {

    /**
     * @return Sdk
     */
    public function sdk()
    {
        return new Sdk();
    }
}