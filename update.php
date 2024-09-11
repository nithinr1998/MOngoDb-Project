<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->cars;
$collection = $db->rentalcustomer;

// Check if the form is submitted
if (isset($_POST['is_submit'])) {
    try {
        // Get the patient ID from the URL parameter
        $rentalcustomerId = $_GET['id'];

        // Update the patient's information in the database
        $updateResult = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID($rentalcustomerId)],
            ['$set' => [
                'name' => $_POST['name'],
                'mobno' => $_POST['mobno'],
                'address' => $_POST['address'],
                'cartype' => $_POST['cartype'],
                'price' => $_POST['price']
            ]]
        );

        if ($updateResult->getModifiedCount() > 0) {
            echo '<script>alert("Customer information updated successfully!");</script>';
        } else {
            echo '<script>alert("No changes made to Customer information.");</script>';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

// Retrieve the patient's information
$rentalcustomerId = $_GET['id'];
$rentalcustomer = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($rentalcustomerId)]);
?>

<html>
<head>
    
<title>Update Customer</title>
</head>
<body>
<h2>Update Customer Information</h2>
<form method="post">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $rentalcustomer['name']; ?>"></td>
        </tr>
        <tr>
            <td>Mob No:</td>
            <td><input type="text" name="mobno" value="<?php echo $rentalcustomer['mobno']; ?>"></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><input type="text" name="address" value="<?php echo $rentalcustomer['address']; ?>"></td>
        </tr>
        <tr>
            <td>Cartype:</td>
            <td><input type="text" name="cartype" value="<?php echo $rentalcustomer['cartype']; ?>"></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="text" name="price" value="<?php echo $rentalcustomer['price']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Update" name="is_submit"></td>
        </tr>
    </table>
</form>
<a href="view.php">Back</a>
</body>
</html>
