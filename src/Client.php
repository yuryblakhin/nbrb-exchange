<?php

namespace Nbrb;


class Client {


    protected $client;

    public function __construct($client = 'https://www.nbrb.by/Services/XmlExRates.aspx')
    {
        $this->client = $client;
    }
}