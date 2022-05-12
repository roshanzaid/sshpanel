<?php
    //AUTHOR: DAUNTE AKA ROSHAN ZAID
    //APP NAME: ZETA
    //VERSION: 1.0.0
    //COPYRIGHTS: BROCRYPT

    //GENERATES ACCESS TOKEN
    function generate_access_token(){
        $post = [
            'redirect_uri'  =>  'https://www.zoho.com/books',
            'client_id'     =>  '1000.06AOWAPM5NXKUCPV6YVFJWCYRB1OLM',
            'client_secret' =>  'f7674c4c2abc64aa9d80e8f36422398bfd0a27d5f8',
            'refresh_token' =>  '1000.615caad2058055f3f2e5469ee03a519f.dff8a6c6287e5237c2545c5610e0aa25',
            'grant_type'    =>  'refresh_token'
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
    generate_access_token();
?>