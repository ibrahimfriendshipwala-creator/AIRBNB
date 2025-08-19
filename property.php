<?php
include "db.php";

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM properties WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
  echo "Property not found.";
  exit;
}

$property = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $property['title']; ?> – Airbnb Clone</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: #f7f7f7;
    }

    header {
      background-color: #ff385c;
      color: white;
      padding: 20px;
      font-size: 22px;
      text-align: center;
    }

    .container {
      max-width: 900px;
      margin: 30px auto;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .property-img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }

    .details {
      padding: 20px;
    }

    .details h2 {
      margin-top: 0;
      font-size: 26px;
    }

    .details p {
      font-size: 16px;
      color: #555;
      margin: 10px 0;
    }

    .details .price {
      font-size: 20px;
      color: #000;
      margin: 15px 0;
    }

    .details button {
      background-color: #ff385c;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
    }

    .details button:hover {
      background-color: #e12f50;
    }

    @media (max-width: 768px) {
      .details h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>

<header>🏠 Property Details</header>

<div class="container">
  <img class="property-img" src="<?php echo $property['image']; ?>" alt="Property Image">
  <div class="details">
    <h2><?php echo $property['title']; ?></h2>
    <p><strong>Location:</strong> <?php echo $property['location']; ?></p>
    <p class="price"><strong>PKR <?php echo $property['price']; ?></strong> per night</p>
    <p><?php echo $property['description']; ?></p>
    <button onclick="bookNow(<?php echo $property['id']; ?>)">Book Now</button>
  </div>
</div>

<script>
  function bookNow(id) {
    window.location.href = 'book.php?id=' + id;
  }
</script>

</body>
</html>
