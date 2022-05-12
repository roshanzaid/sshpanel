<?php
    //AUTHOR: DAUNTE AKA ROSHAN ZAID
    //APP NAME: ZETA
    //VERSION: 1.0.0
    //COPYRIGHTS: BROCRYPT

    include_once "access_token.php";

    //GENERATES ALL INVOICES TOKEN
    function generate_invoices(){
        $access_token='1000.7cff60f2d102abab683bce298b135c14.08294a13c05e96d14c7287b4dc13fb8a';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://books.zoho.com/api/v3/invoices");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Zoho-oauthtoken '. $access_token,
                'Content-Type: application/x-www-form-urlencoded'));

        $response = curl_exec($ch);
        $response = json_encode($response);
        echo '<pre>'; print_r($response); 
    }
    generate_invoices();
?>