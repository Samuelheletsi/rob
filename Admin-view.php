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
                        echo '<script>alert("New hp product added successfully");</script>';
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
                        echo '<script>alert("New dell product added successfully");</script>';
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
                        echo '<script>alert("New lonovo product added successfully");</script>';
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

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin1.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <aside>
        <h2>Admin Menu</h2>
        <ul id="asideMenu">
            <li><a href="#" class="active" onclick="toggleSubMenu('productsSubMenu')">Products</a>
                <ul id="productsSubMenu">
                    <li><a href="Admin-view.php">Add Product</a></li>
                    <li><a href="admin-mag.php">Manage Products</a></li>
                </ul>
            </li>
            <li><a href="#" onclick="toggleSubMenu('ordersSubMenu')">Orders</a>
                <ul id="ordersSubMenu" style="display: none;">
                    <li><a href="#">Pending Orders</a></li>
                    <li><a href="#">Completed Orders</a></li>
                </ul>
            </li>
            <li><a href="#" onclick="toggleSubMenu('customersSubMenu')">Customers</a>
                <ul id="customersSubMenu" style="display: none;">
                    <li><a href="#">View Customers</a></li>
                    <li><a href="#">Add Customer</a></li>
                </ul>
            </li>
            <li><a href="#">Settings</a></li>
        </ul>
    </aside>
    <main>
        <div class="switch-pro">
             <button onclick="hpC()">HP</button>
             <button onclick="dellC()">Dell</button>
             <button onclick="lonovoC()">Lonovo</button>
        </div>
        <div class="container" id="hp">
            <h2>Add HP Product</h2>
            <form id="productForm"  method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="add_hp_product" value="1"> <!-- Hidden input field to indicate adding a new product -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="specification">Specification:</label>
                    <textarea id="specification" name="specification" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <button type="submit" id="submitBtn">Add Product</button>
                </div>
            </form>
        </div>

        <div class="container-lonovo"  id="lonovo">
            <h2>Add Lonovo Product</h2>
            <form id="productForm"  method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="add_lonovo_product" value="2"> <!-- Hidden input field to indicate adding a new product -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="specification">Specification:</label>
                    <textarea id="specification" name="specification" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <button type="submit" id="submitBtn">Add Product</button>
                </div>
            </form>
        </div>

        <div class="container-dell"  id="dell">
            <h2>Add Dell Product</h2>
            <form id="productForm"  method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="add_dell_product" value="3"> <!-- Hidden input field to indicate adding a new product -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="specification">Specification:</label>
                    <textarea id="specification" name="specification" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <button type="submit" id="submitBtn">Add Product</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        function toggleSubMenu(subMenuId) {
            var subMenu = document.getElementById(subMenuId);
            if (subMenu.style.display === 'none') {
                subMenu.style.display = 'block';
            } else {
                subMenu.style.display = 'none';
            }
        }

        // Highlight active link
        var asideMenu = document.getElementById('asideMenu');
        var links = asideMenu.getElementsByTagName('a');
        for (var i = 0; i < links.length; i++) {
            links[i].addEventListener('click', function() {
                var current = document.getElementsByClassName('active');
                if (current.length > 0) {
                    current[0].className = current[0].className.replace('active', '');
                }
                this.className += ' active';
            });
        }

        // Function to switch between product containers
        var hp = document.getElementById('hp').style;
        var dell = document.getElementById('dell').style;
        var lonovo = document.getElementById('lonovo').style;

        function hpC(){
             hp.visibility = "visible";
             dell.visibility = "hidden";
             lonovo.visibility = "hidden";
        }
        function dellC(){
             hp.visibility = "hidden";
             dell.visibility = "visible";
             lonovo.visibility = "hidden";
        }
        function lonovoC(){
             hp.visibility = "hidden";
             dell.visibility = "hidden";
             lonovo.visibility = "visible";
        }
        
        // Function to validate form fields
        function validateForm(containerId) {
            var name = document.getElementById(containerId + "_name").value;
            var price = document.getElementById(containerId + "_price").value;
            var description = document.getElementById(containerId + "_description").value;
            var specification = document.getElementById(containerId + "_specification").value;
            var image = document.getElementById(containerId + "_image").value;

            if (name.trim() == "" || price.trim() == "" || description.trim() == "" || specification.trim() == "" || image.trim() == "") {
                alert("All fields are required");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
