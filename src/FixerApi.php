<?php
namespace ElouafiDev\EasyFixerApi;

use http\Exception\BadMessageException;

class FixerApi
{
    private $apiURL;
    private $access_key;
    private $baseCurrency;
    private $ratesCurrency;
    private $dateCurrency;


    /**
     * fixer.io exchange rates and currency conversion
     * @param $key string access key api
     */
    public function __construct($key)
    {
        $this->access_key = $key;
        $this->apiURL = 'http://data.fixer.io/api/latest';
    }


    /**
     * @return array|mixed|string
     * get Currency From  Api Sever
     */
    public function apiget(){
        try {
            $rawJson = file_get_contents("$this->apiURL?access_key=$this->access_key");

            $dataApi = json_decode($rawJson,true);
            if(isset($dataApi) && $dataApi['success'] == true){
                $this->baseCurrency = $dataApi['base'];
                $this->ratesCurrency = $dataApi['rates'];
                $this->dateCurrency = $dataApi['date'];
                return true;
            }else{return "Out of service";}


        }catch (BadMessageException $exception){
            return $exception->getMessage();
        }


    }

    /**
     * Currency Exchange
     * @param $amount float The amount you want to conversion
     * @param $convertFrom string currency this amount
     * @param $convertTo string currency you want conversion to
     * @return false|float
     */
    public function CurrencyExchange($amount,  $convertFrom,  $convertTo  ){
        $codeC = array_keys($this->ratesCurrency);
        if(
            !in_array($convertFrom,$codeC) ||
            !in_array($convertTo,$codeC)

        ) return false ;

        return  ($amount  * $this->ratesCurrency[$convertTo]) / $this->ratesCurrency[$convertFrom];
    }

}

