<?php
function formatSubscriberCount($number) {
    if ($number >= 1000000) {
        return round($number / 1000000, 1) . 'M';
    } elseif ($number >= 1000) {
        return round($number / 1000, 1) . 'K';
    }
    return (string) $number;
}

$tests = [1500, 1200000, 850];
foreach ($tests as $num) {
    echo $num . " → " . formatSubscriberCount($num) . "<br>";
}
?>