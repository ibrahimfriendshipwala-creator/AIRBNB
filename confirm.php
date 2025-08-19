<?php
$name = $_GET['name'] ?? '';
$email = $_GET['email'] ?? '';
$location = $_GET['location'] ?? '';
$checkin = $_GET['checkin'] ?? '';
$checkout = $_GET['checkout'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmed</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #dff0d8;
      padding: 50px;
      text-align: center;
    }
    .confirmation-box {
      background: white;
      display: inline-block;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    h2 {
      color: green;
    }
  </style>
</head>
<body>

<div class="confirmation-box">
  <h2>✅ Booking Confirmed!</h2>
  <p>Thank you <strong><?= htmlspecialchars($name) ?></strong> for booking with us.</p>
  <p>Your stay in <strong><?= htmlspecialchars($location) ?></strong> is confirmed from <strong><?= $checkin ?></strong> to <strong><?= $checkout ?></strong>.</p>
  <p>A confirmation email has been sent to <strong><?= htmlspecialchars($email) ?></strong>.</p>
</div>

</body>
</html>
