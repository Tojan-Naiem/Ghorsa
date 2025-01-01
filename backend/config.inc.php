<?php
$cfg['blowfish_secret'] = 'your_random_secret_key_here'; 

$i = 0;
$i++;

$cfg['Servers'][$i]['auth_type'] = 'cookie'; 
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['port'] = ''; 
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = true;


$cfg['DefaultLang'] = 'en'; 
$cfg['ServerDefault'] = 1; 
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = ''; 
?>