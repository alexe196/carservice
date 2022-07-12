<?php

namespace carservice;

class AutoServiceAPI
{
    private static $url = 'http://pony.codevery.work:8450';
    private static $key = 548979832057758973;
    private static $instance = null;
    public static $service = [];

    public static function getInstance() {

        if (null === self::$instance) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function getService() {

        if (empty(self::$service)) {

            self::$service = self::setService();
        }

        return self::$service;
    }

    /** ServiceAPI
     * @return array
     */
    public static function setService() {

        $curl = curl_init(self::$url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT ,0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Api-Key: '.self::$key
        ) );
        $result = curl_exec($curl);
        curl_close( $curl );

        return json_decode($result) ?? array();
    }

    private function __clone() {}
    private function __construct() {}
}