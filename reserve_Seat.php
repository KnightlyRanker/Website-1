<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seat_number = $_POST['seat_number'];
    $reserved_by = $_POST['reserved_by'];

    $stmt = $conn->prepare("UPDATE seats SET reserved_by = ? WHERE seat_number = ?");
    $stmt->bind_param("si", $reserved_by, $seat_number);

    if ($stmt->execute()) {
        echo "Seat reserved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>