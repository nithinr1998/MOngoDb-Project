<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->cars;
$collection = $db->rentalcustomer;
?>


<?php
$rentalcustomers = $collection->find();
?>

<html>
<head>
<title>View Customer</title>
<style>
    body {
    background-image: 
    url("bg1.png");
    }


    table {
        border: 1px solid black;
        border-collapse: collapse;
        margin: auto;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<div style="text-align: center;">
    <h2>Customer Details</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Mob No</th>
            <th>Address</th>
            <th>cartype</th>
            <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($rentalcustomers as $rentalcustomer) : ?>
            <tr>
                <td><?php echo $rentalcustomer['name']; ?></td>
                <td><?php echo $rentalcustomer['mobno']; ?></td>
                <td><?php echo $rentalcustomer['address']; ?></td>
                <td><?php echo $rentalcustomer['cartype']; ?></td>
                <td><?php echo $rentalcustomer['price']; ?></td>
                <td><a href="update.php?id=<?php echo $rentalcustomer['_id']; ?>">Update</a></td>
                <td><a href="delete.php?id=<?php echo $rentalcustomer['_id']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
