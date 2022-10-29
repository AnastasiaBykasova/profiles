<?php 
    $a = date('d.m.Y');
    $b = date('H:i:s', strtotime('+3 hours'));
    echo "Сформировано " . $a . " в " . $b;
?>