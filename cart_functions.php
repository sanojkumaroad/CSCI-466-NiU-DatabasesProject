<?php
    // Include database connection
    include 'connection.php';
    // $connection is available and connected to the database.
    // Perform your database operations using $connection.

    // Function to add a product to the cart
    function addToCart($product_id) {
        // Check if the product is already in the cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Increment the quantity if the product is already in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            // Add the product to the cart with quantity 1
            $product = getProductById($product_id);

            if ($product) {
                $_SESSION['cart'][$product_id] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => 1,
                ];
            }
        }
    }

    // Function to remove a product from the cart
    function removeItem($remove_id) {
        // Check if the product is in the cart
        if (isset($_SESSION['cart'][$remove_id])) {
            // Decrement the quantity
            $_SESSION['cart'][$remove_id]['quantity']--;

            // Remove the product if the quantity becomes 0
            if ($_SESSION['cart'][$remove_id]['quantity'] == 0) {
                unset($_SESSION['cart'][$remove_id]);
            }
        }
    }

    // Function to get cart items
    function getCartItems() {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        } else {
            return [];
        }
    }


    // Function to calculate the subtotal of items in the cart
    function calculateSubtotal() {
        $subtotal = 0;

        // Check if the cart is set and not empty
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
        }

        return $subtotal;
    }


    // Function to calculate the total with tax and shipping
    function calculateTotal() {
        $subtotal = calculateSubtotal();
        $taxRate = 0.0495; // 4.95%
        $estimatedShipping = 0.00; // Assume free shipping for simplicity

        $total = $subtotal + ($subtotal * $taxRate) + $estimatedShipping;

        return $total;
    }

    // Function to calculate the tax based on the subtotal
    function calculateTax() {
        $taxRate = 0.0495; // 4.95%
    
        // Calculate tax based on the subtotal
        $tax = calculateSubtotal() * $taxRate;

        return $tax;
    }

    // Function to get product details by ID from the database
    function getProductById($product_id) {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM Products WHERE id = ?");
        $query->execute([$product_id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
?>
