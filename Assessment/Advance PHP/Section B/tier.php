<?php

$followerCount = 5000;

if ($followerCount < 1000) {
    $tier = "Newbie";
}
elseif ($followerCount <= 10000) {
    $tier = "Rising Star";
}
else {
    $tier = "Influencer";
}

echo "Followers: " . $followerCount;
echo "<br>";
echo "Tier: " . $tier;

?>