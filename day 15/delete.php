<?php 

include_once("config.php");

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=:id";

$getUsers = $conn->prepare($sql);

$getUsers->bindParam(':id', $id);

$getUsers->execute();

header('Location:challange.php');

	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Product List</h2>
    <a href="edit.php" class="btn btn-success mb-3">Add New Product</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price ($)</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        try {
            $stmt = $conn->query("SELECT * FROM products");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                echo "<td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='challange.php?delete={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</a>
                      </td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='6'>Error loading data: " . $e->getMessage() . "</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>