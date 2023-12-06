<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products. VRAMS Shoe Store.</title>
    <link rel="stylesheet" href="stylesproducts.css">

</head>

<body>

<header>
    <div class="navbar" id="navbar">
        <a href="mainVRAMS.php"><img src="VRAMSLogo.png" alt="VRAMS logo" width="200" height="150"></a>
        <a href="shop.php">Shop</a>
        <a href="InventoryCheck.php">Employee</a>
        <a href="AboutUs.php">About Us</a>
        <a href="Contact.php">Contact</a>
        <a href="Login.php">Login/Sign Up</a>
        <a href="cart.php">Cart</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()"> &#9776; </a>
    </div>
</header>
<b>


    <h1> <center>Slip-On Comfort</center> </h1>
    <center><img src="https://www.revereshoes.com/cdn/shop/products/rev_Jamica-Black-Angle_3Q_256x.jpg?v=1696615513" alt="Slip-on Comfort"></center>



    <?php
include 'connection.php';
include 'cart_functions.php';

// Fetch product details from the database
$queryProduct = mysqli_query($connection, "SELECT ProductID, ProductName, ProductPrice, ProductDescription, Qty FROM Products WHERE ProductName = 'Slip-on Comfort'");
$product = mysqli_fetch_array($queryProduct, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adding'])) {
    // Assuming you have a function to insert the product into the cart in the database
    if (isset($_POST['productId'])) {
        $productId = $_POST['productId'];
        addToCart($productId);

        // Redirect to cart.php after adding the product to the cart
        header("Location: cart.php");
        exit();
    }
}

$queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Slip-on Comfort'");
while ($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) {
    ?>
    <h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
    <h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
    <h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
    <h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php } ?>

    <h2> Add to Cart </h2>
   <form action="cart.php" method="post">
    <input type="hidden" name="productId" value="<?php echo $product['ProductID']; ?>">
    <input type="text" placeholder="Qty" name="Quantity" required/><br>
    <input type="submit" name="adding" value="ADD">
</form>

   

</b>

<footer>
    <div class="contact-us">
        <h2>Contact Us</h2>
        <p>Email: info@vramsshoestore.com</p>
        <p>Phone: (555) 123-4567</p>
    </div>
    <p>All rights reserved. © 2023 VRAMS Shoe Store</p>
</footer>
</body>





</html>
