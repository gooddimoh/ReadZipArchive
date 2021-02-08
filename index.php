<?php

$url = 'http://api.bestchange.ru/info.zip';

$ch = curl_init($url);

$dir = './courses/';
$zip = new ZipArchive;
if ($zip->open('info.zip') === TRUE) {

    $zip->extractTo('/courses/datafiles');
    $zip->close();
    echo 'Unzipped Process Successful!';
} else {
    echo 'Unzipped Process failed';
}

$file_name = basename($url);

$save_file_loc = $dir . $file_name;

$fp = fopen($save_file_loc, 'wb');

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);

fclose($fp);