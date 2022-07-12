<?php


namespace carservice;

use carservice\AutoServiceDate;

class FranchiseSearch
{
    /**
     * @param $franchises_string string
     * @param $region_mappings_string string
     */

    function initialize(string $franchises_string, string $region_mappings_string) : void {

        // Assign $region_mappings
        // Assign $franchises

    }


    /**
     * Should return an ordered array (by name) of franchises for this postal code with all their information
     * @param $postal_code integer
     * @return array
     */

    public static function search(int $postal_code) : array {

        $result = AutoServiceDate::auto_service($postal_code);
        return $result;

    }
}