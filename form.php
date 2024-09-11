  

	<?php
require_once __DIR__ . '/vendor/autoload.php';



$client = new MongoDB\Client('mongodb://localhost:27017');
echo $client;
$db = $client -> cars;
//$collection=$db->createCollection("rentalcustomer");
$collection=$db->rentalcustomer;

if (isset($_POST['is_submit'])) {
    try {
        $insertOneResult = $collection->insertOne([

            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'mobno' => $_POST['mobno'],
            'address' => $_POST['address'],
            'cartype' => $_POST['cartype'],
            'price' => $_POST['price']
        ]);

        if ($insertOneResult->getInsertedCount() > 0) {
            echo '<script>alert("Inserted Successfully!");</script>';

        }
		
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
  <html>
  <head>

  <link rel="stylesheet" href="style.css">
  
  <title>SignIn</title>
  </head>

	<body>


<form method="post" action="#">
	<div id="main" style="  ;padding-left:5px;padding-right:5px;padding-bottom:5px;border-radius:3px" >
	<div class="h-tag">
        <center><h2 style="margin-top:150px;color:green;padding-top:10px">VROOM VROOM!!</h2></center>
	
	</div>
	
	<div class="login">
	<table cellspacing="2" align="center" cellpadding="8" border="0">
	<tr>
	<td align="right">Id:</td>
	<td><input type="text"  class="tb" name="id"/></td>
	</tr>
    
    
    
    
    <tr>
	<td align="right">Customer Name :</td>
	<td><input type="text"   class="tb" name="name"/></td>
	</tr>
	<tr>
	<td align="right">Mob No :</td>
	<td><input type="number" placeholder="+91 0000000000" class="tb" name="mobno"/></td>
	</tr>
	<tr>
	<td align="right">Address :</td>
	<td><input type="text" class="tb" name="address"/></td>
	</tr>
	
	<TR align="RIGHT">
        <TD align="RIGHT">
    <label for="cartype">   CarType: </label>
    <select name ="cartype"> 
  <option value="Select">Select</option>
  <option value="BUGATTI">Bugatti</option>  
  <option value="BMW X5">Bmw X5</option>  
  <option value="GOLF GTI">GOLF GTI</option>  
</TD>
</TR>
</select>   

	</tr>
	<tr>
	<td align="right">Price :</td>
	<td><input type="number"  class="tb" name="price"/></td>
	</tr>
	<tr>
	<td></td>
	<td>

	<input type="submit" value="Submit" class="btn" name="is_submit" /></td>
	</tr>
	</table>
	</div>

	</div>
	<center><a href="view.php" style="text-decoration:none;color:black">Customer</Details></a></center>
</form>
	</body>
	</html>


  