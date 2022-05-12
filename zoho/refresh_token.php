<?php
    //AUTHOR: DAUNTE AKA ROSHAN ZAID
    //APP NAME: ZETA
    //VERSION: 1.0.0
    //COPYRIGHTS: BROCRYPT

    //GENERATES REFRESH TOKEN
    function generate_refresh_token(){
        $post = [
            'scope'         =>  'ZohoBooks.fullaccess.all',
            'code'          =>  '1000.f358393b9e70c0ebd2935219bcba2612.a949fe3e946918e4862f2e1011246cc5',
            'redirect_uri'  =>  'https://www.zoho.com/books',
            'client_id'     =>  '1000.06AOWAPM5NXKUCPV6YVFJWCYRB1OLM',
            'client_secret' =>  'f7674c4c2abc64aa9d80e8f36422398bfd0a27d5f8',
            'grant_type'    =>  'authorization_code'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://accounts.zoho.com/oauth/v2/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));

        $response = curl_exec($ch);
        $response = json_encode($response);
        echo '<pre>'; print_r($response); 
    }
    generate_refresh_token();
?>