<?php

namespace Nbrb;


class NbrbClient {


    protected $client;

    public function __construct($client = 'https://www.nbrb.by/Services/XmlExRates.aspx')
    {
        $this->client = $client;
    }
}