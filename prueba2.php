<?php
$currentdate=date('Y-m-d');
echo $currentdate;
$d=strtotime("+1 Months");
$sigpago=date("Y-m-d", $d);
echo $sigpago;
$float=33.69;
echo "<br>";
echo number_format($float,2,'.','');
echo "<br>";
$locale = 'es_MX';
$fmt = numfmt_create($locale, NumberFormatter::SPELLOUT);
$in_words = numfmt_format($fmt, $float);

echo $in_words;
?>