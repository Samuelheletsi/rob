<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_products_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch products from the database
function fetchProducts($conn) {
    $sql = "SELECT * FROM product_tb";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["specification"] . "</td>";
            echo "<td><img src='" . $row["image_path"] . "' alt='Product Image' style='width: 100px; height: auto;'></td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "<td>" . $row["updated_at"] . "</td>";
            echo "<td class='edit-b' ><a href='edit_product.php?id=" . $row["id"] . "'>Edit</a></td>";
            echo "<td class='delete-b'><a href='delete_product.php?id=" . $row["id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "0 results for hp";
    }
}


function fetchDe($conn) {
    $sql = "SELECT * FROM dell_product_tb";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["specification"] . "</td>";
        echo "<td><img src='" . $row["image_path"] . "' alt='Product Image' style='width: 100px; height: auto;'></td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "<td>" . $row["updated_at"] . "</td>";
        echo "<td class='edit-b' ><a href='edit_dell.php?id=" . $row["id"] . "'>Edit</a></td>";
        echo "<td class='delete-b'><a href='delete_product.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results for lonovo";
}
}

function fetchLo($conn) {
    $sql = "SELECT * FROM lonovo_product_tb";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["specification"] . "</td>";
        echo "<td><img src='" . $row["image_path"] . "' alt='Product Image' style='width: 100px; height: auto;'></td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "<td>" . $row["updated_at"] . "</td>";
        echo "<td class='edit-b' ><a href='edit_lonovo.php?id=" . $row["id"] . "'>Edit</a></td>";
        echo "<td class='delete-b'><a href='delete_product.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results for dell";
}
}

?>
