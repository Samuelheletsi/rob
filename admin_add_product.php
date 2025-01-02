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

// Handle form submission to add hp laptops
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the action is to add a new product
    if (isset($_POST['add_hp_product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $specification = $_POST['specification'];

        // Check if file was uploaded successfully
        if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $target_dir = "uploads/"; // Directory where images will be uploaded
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            // Check if file already exists
            if (file_exists($target_file)) {
                // echo "Error: File already exists.";
                 echo '<script>alert("Error: File already exists.");</script>';

            } else {
                // Move uploaded file to target directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = $target_file;

                    // Prepare and bind SQL statement
                    $sql = "INSERT INTO product_tb (name, price, description, specification, image_path) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssss", $name, $price, $description, $specification, $image_path);

                    // Execute SQL statement
                    if ($stmt->execute()) {
                        // echo "New product added successfully";
                        echo '<script>alert("New product added successfully");</script>';
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    // echo "Error: Failed to move uploaded file.";
                    echo '<script>alert("Error: Failed to move uploaded file.");</script>';
                }
            }
        } else {
            // echo "Error: File upload error.";
            echo '<script>alert("Error: File upload error.");</script>';
        }
    }
   
   
    
}

// Handle form submission to add dell laptops
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the action is to add a new product
    if (isset($_POST['add_dell_product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $specification = $_POST['specification'];

        // Check if file was uploaded successfully
        if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $target_dir = "uploads/"; // Directory where images will be uploaded
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            // Check if file already exists
            if (file_exists($target_file)) {
                // echo "Error: File already exists.";
                 echo '<script>alert("Error: File already exists.");</script>';

            } else {
                // Move uploaded file to target directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = $target_file;

                    // Prepare and bind SQL statement
                    $sql = "INSERT INTO dell_product_tb (name, price, description, specification, image_path) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssss", $name, $price, $description, $specification, $image_path);

                    // Execute SQL statement
                    if ($stmt->execute()) {
                        // echo "New product added successfully";
                        echo '<script>alert("New product added successfully");<script/>';
                        
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    // echo "Error: Failed to move uploaded file.";
                    echo '<script>alert("Error: Failed to move uploaded file.");<script/>';
                }
            }
        } else {
            echo '<script>alert("Error: File upload error.");<script/>';
        }
    }
   
   
    
}

// Handle form submission to add hp laptops
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the action is to add a new product
    if (isset($_POST['add_lonovo_product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $specification = $_POST['specification'];

        // Check if file was uploaded successfully
        if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $target_dir = "uploads/"; // Directory where images will be uploaded
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            // Check if file already exists
            if (file_exists($target_file)) {
                // echo "Error: File already exists.";
                 echo '<script>alert("Error: File already exists.");</script>';

            } else {
                // Move uploaded file to target directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = $target_file;

                    // Prepare and bind SQL statement
                    $sql = "INSERT INTO lonovo_product_tb (name, price, description, specification, image_path) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssss", $name, $price, $description, $specification, $image_path);

                    // Execute SQL statement
                    if ($stmt->execute()) {
                        // echo "New product added successfully";
                        echo '<script>alert("New product added successfully");<script/>';
                        
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    // echo "Error: Failed to move uploaded file.";
                    echo '<script>alert("Error: Failed to move uploaded file.");<script/>';
                }
            }
        } else {
            echo '<script>alert("Error: File upload error.");<script/>';
        }
    }
   
   
    
}

$conn->close();
?>
