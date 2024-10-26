<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cloth";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Get product details from id
    $stmt = $conn->prepare("SELECT * FROM clothes WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product && $product['Quantity'] > 0) {
        // Reduce quantity in the database
        $newQuantity = $product['Quantity'] - 1;
        $updateStmt = $conn->prepare("UPDATE clothes SET Quantity = ? WHERE ID = ?");
        $updateStmt->bind_param("ii", $newQuantity, $id);
        $updateStmt->execute();

        // Add product to cart session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $productExists = false;

        //If product doesn't exist in cart
        if (!$productExists) {
            $product['quantity'] = 1;
            $_SESSION['cart'][] = $product;
        }

        //If product exist in cart
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['ID'] == $id) {
                $item['quantity'] += 1;
                $productExists = true;
                break;
            }
        }

        header("Location: cart.php");
    } else {
        echo "Product not available or out of stock.";
    }
}

$conn->close();
?>
