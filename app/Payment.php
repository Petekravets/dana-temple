<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Payment extends Model
{
    protected $public_key;
    protected $private_key;
    protected $params = [];

    public function __construct()
    {
        parent::__construct();
        $this->params = array(
            'action'         => 'pay',
            'version'        => '3',
            'sandbox'        => '1',
            'amount'         => \request()->input('sum'),
            'currency'       => 'UAH',
            'description'    => 'Пожертвование на пол',
        );

        $this->public_key = 'i11010743535';
        $this->private_key = 'yh62IfJgulyMIGBT3fFwHirwIt7SgfhS6JyVPnQS';
    }

    public function getData()
    {
        $public_key = $this->public_key;
        return base64_encode(json_encode(array_merge(compact('public_key'), $this->params)));
    }

    public function getSignature()
    {
        return base64_encode(sha1($this->private_key.$this->getData().$this->private_key, 1));
    }
}
