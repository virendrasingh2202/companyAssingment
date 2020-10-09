<?php

namespace app\helper;

trait ApiCall {
    public function curlToRestApi($method, $url, $data = null)
    {
        $curl = curl_init();

        // switch $method
        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);

                if($data !== null) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
                // logic for other methods of interest
                // .
                // .
                // .

            default:
                if ($data !== null){
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }

        // Authentication [Optional]
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}

?>