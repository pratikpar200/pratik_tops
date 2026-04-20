<?php
// 10) LAB EXERCISE:

echo "<h3>1. For Loop: Numbers 1 to 10</h3>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br><hr>";

echo "<h3>2. For Loop (Addition): Add all integers from 0 to 30</h3>";
$sum = 0;
for ($i = 0; $i <= 30; $i++) {
    $sum += $i; // Better standard than $sum = $sum + $i
}
echo "Total = " . $sum;
echo "<br><hr>";

echo "<h3>3. Chessboard Pattern (8x8 grid)</h3>";
echo "<table border='1' cellspacing='0' cellpadding='20'>";
for ($row = 1; $row <= 8; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 8; $col++) {
        if (($row + $col) % 2 == 0) { // logic for alternating colors
            echo "<td bgcolor='black'></td>";
        } else {
            echo "<td bgcolor='white'></td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
echo "<hr>";

echo "<h3>4. Various Patterns</h3>";
echo "<h4>(a) Star Pattern</h4>";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<h4>(b) Number Pattern</h4>";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}
?>
