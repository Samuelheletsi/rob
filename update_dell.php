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

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $specification = $_POST['specification'];

    // Update product data in the database
    $sql = "UPDATE dell_product_tb SET name='$name', price=$price, description='$description', specification='$specification' WHERE id=$product_id";

    if ($conn->query($sql) === TRUE) {
        // echo "Product updated successfully"
        echo '<script>alert("Product updated successfully");</script>';
        sleep(2); // Introduce a delay of 2 seconds
        header("Location: admin-mag.php"); // Redirect to admin-mag.php after the delay
        exit();
    } else {
        // echo "Error updating product: " . $conn->error
        echo '<script>alert("Error updating product: ' . $conn->error . '");</script>';
    }
}

$conn->close();
?>
