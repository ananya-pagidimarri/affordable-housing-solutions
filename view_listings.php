<?php
include 'db_config.php';

$sql = "SELECT * FROM listings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $price = $row['price'];
        $imagePath = $row['image'];
        $color = getColor($price);
        echo "<div class='listing' style='background-color: $color;'>";
        echo "<h3>" . $row['location'] . "</h3>";
        echo "<p>Price: $" . $price . "</p>";
        echo "<p>" . $row['description'] . "</p>";
        if($imagePath) {
            echo "<img src='$imagePath' alt='Property Image' class='listing-image'>";
        }
        echo "</div><hr>";
    }
} else {
    echo "No listings available.";
}
$conn->close();

function getColor($price) {
    if ($price <= 50000) {
        return '#d4edda';  // Light green for affordable
    } elseif ($price <= 100000) {
        return '#fff3cd';  // Light yellow for moderate
    } elseif ($price <= 200000) {
        return '#f8d7da';  // Light red for high
    } else {
        return '#e2e3e5';  // Gray for luxury
    }
}
?>
