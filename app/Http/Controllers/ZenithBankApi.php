<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZenithBankApi extends Controller
{
    public function hash($accountName)
    {
        return hash_hmac('SHA512', $accountName, 'secret');
    }
}
