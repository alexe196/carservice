<?php
ini_set('display_errors', 0);
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/carservice/class/AutoServiceAPI.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/carservice/class/AutoServiceDate.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/carservice/class/FranchiseSearch.php');

if(!empty( $_POST['action_car_service'])) {

    //$postal_code = 14410;
    $postal_code = (int) trim($_POST['postal_code']);
    if(empty($postal_code)) {
        header('Content-Type: application/json');
        echo json_encode(array('error' => 1));
    }
    $franchiseSearch = carservice\FranchiseSearch::search($postal_code);
    if(!empty($franchiseSearch) ) {
        header('Content-Type: application/json');
        echo json_encode($franchiseSearch);
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('error' => 1));
    }
}