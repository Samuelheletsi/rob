<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Products</title>
    <link rel="stylesheet" href="admin1.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard - Products</h1>
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
        <div class="container1">
            <h2>Hp Products</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Specification</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        // Include PHP code to fetch and display products
                        include 'fetch_products.php';

                        fetchProducts($conn);
                        fetchDe($conn);
                        fetchLo($conn);
                        

                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

       
    </main>
    <script>
        // Function to toggle submenu
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
    </script>
</body>
</html>
