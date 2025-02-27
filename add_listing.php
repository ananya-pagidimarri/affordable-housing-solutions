<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    // Move uploaded file to the server
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Insert listing details into the database
        $sql = "INSERT INTO listings (location, price, description, image)
                VALUES ('$location', '$price', '$description', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "New listing posted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $conn->close();
}
?>
