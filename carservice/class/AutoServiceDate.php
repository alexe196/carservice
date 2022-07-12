<?php


namespace carservice;

use carservice\AutoServiceAPI;


class AutoServiceDate
{
    private static $instance = null;
    public static  $service;

    public static function getInstance() {

        if (null === self::$instance) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param $region_codes string
     * @param $search_region_codes integer
     * @return bool
     */
    private static function region_codes($region_codes, $search_region_codes) {

        $region_codes_arr = explode(',', $region_codes);
        if (!empty($region_codes_arr)) {
            foreach ($region_codes_arr as $item) {
                if($item==$search_region_codes) {
                    return true;
                }
            }
        }

        return false;
    }


    /**
     * @param $postal_code integer
     * @return array
     */
    private static function region_mappings_string($postal_code) {

        if (!empty(self::$service) && !empty($postal_code)) {
            foreach (self::$service->region_mappings_string as $item) {
                if($item->postal_code == $postal_code) {
                    return $item;
                }
            }
        }
        return array();

    }

    /**
     * @param $postal_code integer
     * @return array
     */

    public static function auto_service($postal_code) {

        self::$service = AutoServiceAPI::getInstance()::getService();
        $region_code = self::region_mappings_string($postal_code);
        $result = array();

        if (!empty(self::$service)) {
            $i=0;
            foreach (self::$service->auto_service as $item) {
                if (self::region_codes($item->region_codes, $region_code->region_code)) {
                    $i++;
                    $result['auto_srv'][$item->franchise_name] =  $item;
                    $res[$i] =  $item->franchise_name;
                }
            }

            if(!empty($result)) {

                $result['auto_srv'] = self::setSortServiceDate($result['auto_srv']);
                $result['region_map_str'] = $region_code;
            }
        }

        return $result;
    }

    public static function setSortServiceDate($res) {

        sort($res);
        $clength = count($res);
        for($x = 0; $x < $clength; $x++) {$res[$x];}

        return $res;
    }

    private function __clone() {}
    private function __construct() {}
}