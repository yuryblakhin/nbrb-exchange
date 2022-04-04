<?php

namespace Nbrb;


class NbrbClient {


    protected $curl;
    protected $defaultCurrency;

    protected $dateFormat = 'd/m/Y';

    protected $client = 'https://www.nbrb.by/Services/XmlExRates.aspx';
    protected $requestOptions = [];


    public function __construct($defaultCurrency = 'USD')
    {
        $this->defaultCurrency = $defaultCurrency;
        $this->requestOptions = [
            CURLOPT_AUTOREFERER => true,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0',
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPGET => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_MAXCONNECTS => 2,
        ];
    }


    public function process()
    {

    }


    public function request($options = [])
    {
        $this->requestOptions = array_replace($this->requestOptions, $options);

        $this->curl = curl_init($this->client);
        foreach ($this->requestOptions as $option => $value) {
            $this->curlSetOpt($option, $value);
        }


        $response = curl_exec($this->curl);
        curl_close($this->curl);

        return $response;

    }


    protected function curlSetOpt($option, $value)
    {
        curl_setopt($this->curl, $option, $value);
    }
}