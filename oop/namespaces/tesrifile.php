<?php

include './1file.php';
include './dusrifile.php';


$pehliClass = new pehliFile\add();
echo $pehliClass->add();

echo '<br>';

$dusriClass = new dusriFile\add();
echo $dusriClass->add();
