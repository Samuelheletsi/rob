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

// Fetch products from the database
$sql = "SELECT * FROM dell_product_tb";
$result = $conn->query($sql);

// Initialize an empty array to store product data
$products = array();

if ($result->num_rows > 0) {
    // Loop through each row of the result and add product data to the array
    while($row = $result->fetch_assoc()) {
        $product = array(
            'name' => $row["name"],
            'price' => $row["price"],
            'description' => $row["description"],
            'image_path' => $row["image_path"],
            'specification' => $row["specification"]

        );
        // Add each product to the products array
        $products[] = $product;
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();

// Output the products array as JSON
echo json_encode($products);
?>
