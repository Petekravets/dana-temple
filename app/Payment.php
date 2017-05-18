<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $public_key;
    protected $private_key;
    protected $params = [];
    protected $fillable = ['donate'];

    public function __construct($attributes)
    {
        parent::__construct($attributes);

        $this->params = array(
        'action'         => 'pay',
        'version'        => '3',
        //'sandbox'        => '1',
        'amount'         => $this->donate,
        'currency'       => 'UAH',
        'description'    => 'Пожертвование'
        );

        $this->public_key = config('payment.public_key');
        $this->private_key = config('payment.private_key');
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
