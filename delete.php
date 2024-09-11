<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->cars;
$collection = $db->rentalcustomer;

// Check if the patient ID is provided in the URL
if (isset($_GET['id'])) {
    try {
        // Get the patient ID from the URL parameter
        $rentalcustomerId = $_GET['id'];

        // Delete the patient's information from the database
        $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($rentalcustomerId)]);

        if ($deleteResult->getDeletedCount() > 0) {
            echo '<script>alert("customer information deleted successfully!");</script>';
        } else {
            echo '<script>alert("customer not found.");</script>';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

// Redirect back to the view page after deletion
header('Location: view.php');
exit;
?>
