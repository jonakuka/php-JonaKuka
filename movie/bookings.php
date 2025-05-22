<?php
session_start();

// Check if user is logged in and session variables are set
if (!isset($_SESSION['id'], $_SESSION['username'], $_SESSION['is_admin'])) {
    header('Location: login.php');
    exit();
}

include_once('config.php');

$user_id = $_SESSION['id'];

// Simpler admin check to avoid errors
$is_admin = !empty($_SESSION['is_admin']);

if ($is_admin) {
    $sql = "SELECT movies.movie_name, users.email, bookings.id, bookings.nr_tickets, bookings.date, bookings.is_approved, bookings.time 
            FROM movies
            INNER JOIN bookings ON movies.id = bookings.movie_id
            INNER JOIN users ON users.id = bookings.user_id";
    $selectBookings = $conn->prepare($sql);
    $selectBookings->execute();
    $bookings_data = $selectBookings->fetchAll();
} else {
    $sql = "SELECT movies.movie_name, users.email, bookings.nr_tickets, bookings.date, bookings.is_approved, bookings.time
            FROM movies
            INNER JOIN bookings ON movies.id = bookings.movie_id
            INNER JOIN users ON users.id = bookings.user_id
            WHERE bookings.user_id = :user_id";
    $selectBookings = $conn->prepare($sql);
    $selectBookings->bindParam(':user_id', $user_id);
    $selectBookings->execute();
    $bookings_data = $selectBookings->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
        <?php echo "Welcome to dashboard " . htmlspecialchars($_SESSION['username']); ?>
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search" />
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="logout.php">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <?php if ($is_admin) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_movies.php">Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bookings.php">Bookings</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bookings.php">Bookings</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <h2>Movie Bookings</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Movie Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">Number of Tickets</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Approved</th>
                        <?php if ($is_admin) { ?>
                            <th scope="col">Approve</th>
                            <th scope="col">Decline</th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($bookings_data as $booking_data) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($booking_data['movie_name']); ?></td>
                            <td><?php echo htmlspecialchars($booking_data['email']); ?></td>
                            <td><?php echo (int)$booking_data['nr_tickets']; ?></td>
                            <td><?php echo htmlspecialchars($booking_data['date']); ?></td>
                            <td><?php echo htmlspecialchars($booking_data['time']); ?></td>
                            <td>
                                <?php
                                if ($booking_data['is_approved'] === '1' || $booking_data['is_approved'] === 1) {
                                    echo '<span class="badge bg-success">Approved</span>';
                                } elseif ($booking_data['is_approved'] === '0' || $booking_data['is_approved'] === 0) {
                                    echo '<span class="badge bg-warning text-dark">Pending</span>';
                                } else {
                                    echo '<span class="badge bg-danger">Declined</span>';
                                }
                                ?>
                            </td>

                            <?php if ($is_admin) { ?>
                                <td><a href="approve.php?id=<?php echo urlencode($booking_data['id']); ?>" class="btn btn-sm btn-success">Approve</a></td>
                                <td><a href="decline.php?id=<?php echo urlencode($booking_data['id']); ?>" class="btn btn-sm btn-danger">Decline</a></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
