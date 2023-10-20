<?php

$numberOfUser = '100';
$url = 'https://randomuser.me/api/?results='.$numberOfUser.'&inc=name,email,picture';
$data = json_decode(file_get_contents($url), true);
$data = $data['results'];

return $data;