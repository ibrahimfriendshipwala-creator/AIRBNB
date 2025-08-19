<?php
include "db.php";

$location = $_GET['location'] ?? '';
$checkin = $_GET['checkin'] ?? '';
$checkout = $_GET['checkout'] ?? '';

// Fetch properties from database
$sql = "SELECT * FROM properties WHERE location LIKE ?";
$stmt = $conn->prepare($sql);
$searchLocation = "%$location%";
$stmt->bind_param("s", $searchLocation);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Listings – Airbnb Clone</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f2f2f2;
    }

    header {
      background: #ff385c;
      color: white;
      padding: 15px;
      text-align: center;
      font-size: 22px;
    }

    .filters {
      margin: 20px auto;
      padding: 20px;
      background: white;
      border-radius: 12px;
      max-width: 900px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .filters select {
      padding: 10px;
      margin: 0 10px 10px 0;
      font-size: 16px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    .property-list {
      max-width: 1000px;
      margin: 20px auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .property-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 6px rgba(0,0,0,0.1);
      width: 280px;
      margin: 15px;
      overflow: hidden;
      transition: 0.3s;
    }

    .property-card:hover {
      transform: scale(1.03);
    }

    .property-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .property-card .info {
      padding: 10px;
    }

    .property-card h3 {
      margin: 5px 0;
      font-size: 18px;
    }

    .property-card p {
      margin: 3px 0;
      color: #555;
    }

    @media (max-width: 768px) {
      .property-card {
        width: 90%;
      }
    }
  </style>
</head>
<body>

<header>🔍 Properties in "<?php echo htmlspecialchars($location); ?>"</header>

<div class="filters">
  <label>Sort by:</label>
  <select onchange="sortBy(this.value)">
    <option value="">Select</option>
    <option value="low">Price: Low to High</option>
    <option value="high">Price: High to Low</option>
  </select>
</div>

<div class="property-list" id="propertyList">
  <?php while($row = $result->fetch_assoc()): ?>
    <div class="property-card">
      <img src="<?php echo $row['image']; ?>" alt="Property">
      <div class="info">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['location']; ?></p>
        <p><strong>PKR <?php echo $row['price']; ?>/night</strong></p>
        <button onclick="goToProperty(<?php echo $row['id']; ?>)">View</button>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<script>
  function goToProperty(id) {
    window.location.href = "property.php?id=" + id;
  }

  function sortBy(value) {
    let list = document.getElementById("propertyList");
    let cards = Array.from(list.children);

    cards.sort((a, b) => {
      let priceA = parseInt(a.querySelector("strong").textContent.replace(/[^\d]/g, ""));
      let priceB = parseInt(b.querySelector("strong").textContent.replace(/[^\d]/g, ""));
      return value === "low" ? priceA - priceB : priceB - priceA;
    });

    cards.forEach(card => list.appendChild(card));
  }
</script>

</body>
</html>
