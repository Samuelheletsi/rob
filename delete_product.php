<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_products_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if product ID is provided
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Delete product from the database
    $sql = "DELETE FROM product_tb WHERE id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    echo "Product ID not provided.";
}

$conn->close();
?>
