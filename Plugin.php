<?php
function get_info($mode){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://mybrowserinfo.com');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
  $result = curl_exec($ch);
  curl_close($ch);
  $ch = curl_init();
  if (strtolower($mode) == "location"){
    $r1 = explode('Country of origin: <span>', $result);
    $r2 = explode('</span>', $r1[1]);
    $hasil = $r2[0];
  }elseif (strtolower($mode) == "ip"){
    $p1 = explode('Your IP Address is ', $result);
    $p2 = explode('</h1>', $p1[1]);
    $hasil = $p2[0];
  }else{
    $hasil = "Command Type Not Found!!\nSupport Command: \n Get IP = get_info('IP')\n Get Location = get_info('Location')";
  }
  return $hasil;
}


?>
