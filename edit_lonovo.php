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

    // Fetch product data based on ID
    $sql = "SELECT * FROM lonovo_product_tb WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the product data in a form for editing
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="admin1.css">
            <title>Edit Product</title>
        </head>
        <body>
           <div class="container2">
           <h2>Edit Lonovo Product</h2>
            <form action="update_lonovo.php" method="post"> <!-- added action attribute -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required><?php echo $row['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="specification">Specification:</label>
                    <textarea id="specification" name="specification" rows="4" required><?php echo $row['specification']; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Update Product</button>
                </div>
            </form>
           </div>
        </body>
        </html>

        <?php
    } else {
        // echo "Product not found.";
        echo '<script>alert("Product not found");</script>'; // corrected closing tag for script
    }
} else {
    // echo "Product ID not provided.";
    echo '<script>alert("Product ID not provided.");</script>'; // corrected closing tag for script
}

$conn->close();
?>
