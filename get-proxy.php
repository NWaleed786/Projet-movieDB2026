<?php
function getProxy($url){
    $options = [
        'http' => [
            'proxy' => 'tcp://172.16.0.54:8080',
            'request_fulluri' => true,
        ],
    ];
    $context = stream_context_create($options);

    $response = file_get_contents($url, false, $context);

    if ($response === false) {
        echo "Failed to get data from $url";
    } else {
        return $response;
    }
}

?>