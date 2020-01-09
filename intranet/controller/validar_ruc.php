<?php

$ruc = filter_input(INPUT_POST, 'ruc');
//$direcion = 'https://www.conmetal.pe/erp/ajax_post/consulta_ruc_nubefact.php?ruc=' . $ruc;
$direcion = 'http://lunasystemsperu.com/consultas_json/composer/consulta_sunat_JMP.php?ruc='. $ruc;

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $direcion);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);
if (curl_errno($ch)) {
  echo curl_error($ch);
  echo "\n<br />";
  $contents = '';
} else {
  curl_close($ch);
}

if (!is_string($contents) || !strlen($contents)) {
echo "Failed to get contents.";
$contents = '';
}

echo $contents;
?>

