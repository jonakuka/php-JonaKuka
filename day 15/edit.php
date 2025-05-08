<?php
include_once("config.php");

$id = $title = $description = $quantity = $price = "";

// Editing: fetch product by ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $title = $product['title'];
        $description = $product['description'];
        $quantity = $product['quantity'];
        $price = $product['price'];
    }
}

// Form submission (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    if ($id !== '') {
        // Update existing
        $stmt = $conn->prepare("UPDATE products SET title = ?, description = ?, quantity = ?, price = ? WHERE id = ?");
        $stmt->execute([$title, $description, $quantity, $price, $id]);
    } else {
        // Insert new
        $stmt = $conn->prepare("INSERT INTO products (title, description, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $description, $quantity, $price]);
    }

    // Redirect to challange.php
    header("Location: challange.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $id ? 'Edit' : 'Add'; ?> Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2><?php echo $id ? 'Edit' : 'Add New'; ?> Product</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required value="<?php echo htmlspecialchars($title); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required><?php echo htmlspecialchars($description); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" required value="<?php echo htmlspecialchars($quantity); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input type="text" name="price" class="form-control" required value="<?php echo htmlspecialchars($price); ?>">
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $id ? 'Update' : 'Add'; ?> Product</button>
        <a href="challange.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>