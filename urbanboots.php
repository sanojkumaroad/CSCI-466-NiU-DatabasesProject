<html>



<head>

<title> Urban Street Boots  </title>

</head>


<body>

<b>


    <h1> <center> Urban Street Boots </center> </h1>
    <center><img src="https://www.palazzodiscarpe.gr/wp-content/uploads/2022/10/IMG_5672-256x256.jpg" alt="white sneakers"></center>
	

<?php

    include 'connection.php';

?>


   <?php

    $queryP = mysqli_query($connection, "select ProductName, ProductPrice, ProductDescription, Qty from Products WHERE ProductName = 'Urban Street Boots'");
    while($row = mysqli_fetch_array($queryP, MYSQLI_ASSOC)) { 
     ?>
	<h3> Name: </h3> <?php echo $row['ProductName']; ?> <br>
	<h3> Price: </h3> <?php echo $row['ProductPrice']; ?> <br>
	<h3> Description: </h3> <?php echo $row['ProductDescription']; ?> <br>
	<h3> Quantity: </h3> <?php echo $row['Qty']; ?> <br>
<?php  } ?>



	<h2> Add to Cart </h2>
	<form action="urbanboots.php" method="post">

        <input type="text" placeholder="Qty" name="Quantity" required/><br>
	
	<input type="submit" name="adding" value="ADD">

        

	</form>

   

</b>


</body>





</html>   
