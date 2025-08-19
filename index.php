<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Airbnb Clone – Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f5f5;
    }

    header {
      background-color: #ff385c;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }

    .search-box {
      background: white;
      margin: 40px auto;
      padding: 20px;
      max-width: 800px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .search-box input {
      width: 30%;
      padding: 12px;
      margin: 10px 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .search-box button {
      background-color: #ff385c;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .search-box button:hover {
      background-color: #e02e4e;
    }

    .featured {
      max-width: 1000px;
      margin: auto;
      padding: 20px;
    }

    .card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 6px rgba(0,0,0,0.1);
      margin: 15px;
      padding: 15px;
      display: inline-block;
      width: calc(33% - 40px);
      vertical-align: top;
    }

    .card img {
      width: 100%;
      border-radius: 8px;
    }

    .card h3 {
      margin: 10px 0 5px;
      font-size: 18px;
    }

    .card p {
      font-size: 14px;
      color: #777;
    }

    @media (max-width: 768px) {
      .card {
        width: calc(100% - 30px);
      }

      .search-box input {
        width: 80%;
        margin: 10px 0;
      }

      .search-box button {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<header>🏡 Welcome to Airbnb Clone</header>

<div class="search-box">
  <input type="text" id="location" placeholder="Enter location">
  <input type="date" id="checkin">
  <input type="date" id="checkout">
  <button onclick="searchProperties()">Search</button>
</div>

<div class="featured">
  <h2>✨ Featured Listings</h2>

  <div class="card">
    <img src="https://source.unsplash.com/featured/?apartment" alt="Property">
    <h3>Luxury Apartment</h3>
    <p>Karachi · PKR 15,000/night</p>
  </div>

  <div class="card">
    <img src="https://source.unsplash.com/featured/?villa" alt="Property">
    <h3>Beachside Villa</h3>
    <p>Gwadar · PKR 35,000/night</p>
  </div>

  <div class="card">
    <img src="https://source.unsplash.com/featured/?house" alt="Property">
    <h3>Modern House</h3>
    <p>Lahore · PKR 20,000/night</p>
  </div>
</div>

<script>
  function searchProperties() {
    const location = document.getElementById("location").value;
    const checkin = document.getElementById("checkin").value;
    const checkout = document.getElementById("checkout").value;

    if (!location || !checkin || !checkout) {
      alert("Please fill all fields.");
      return;
    }

    // Redirect using JavaScript
    window.location.href = `listings.php?location=${encodeURIComponent(location)}&checkin=${checkin}&checkout=${checkout}`;
  }
</script>

</body>
</html>
