<?php
$id = $_GET['id'] ?? '';
$location = $_GET['location'] ?? '';
$checkin = $_GET['checkin'] ?? '';
$checkout = $_GET['checkout'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Hotel</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eef4ff;
      padding: 30px;
    }
    .booking-form {
      background: white;
      max-width: 600px;
      margin: auto;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #003580;
    }
    input, button {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #003580;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #002b66;
    }
  </style>
</head>
<body>

<div class="booking-form">
  <h2>Book Your Stay</h2>
  <form onsubmit="handleBooking(event)">
    <input type="text" id="name" placeholder="Full Name" required>
    <input type="email" id="email" placeholder="Email" required>
    <input type="hidden" id="hotel_id" value="<?= $id ?>">
    <input type="hidden" id="location" value="<?= $location ?>">
    <input type="hidden" id="checkin" value="<?= $checkin ?>">
    <input type="hidden" id="checkout" value="<?= $checkout ?>">
    <button type="submit">Confirm Booking</button>
  </form>
</div>

<script>
function handleBooking(e) {
  e.preventDefault();

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const hotel_id = document.getElementById("hotel_id").value;
  const location = document.getElementById("location").value;
  const checkin = document.getElementById("checkin").value;
  const checkout = document.getElementById("checkout").value;

  const url = `confirm.php?name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&id=${hotel_id}&location=${location}&checkin=${checkin}&checkout=${checkout}`;

  window.location.href = url;
}
</script>

</body>
</html>
