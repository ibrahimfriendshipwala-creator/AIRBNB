<?php
include "db.php";

// Delete existing records (optional - uncomment if needed)
// $conn->query("DELETE FROM properties");

$properties = [
  [
    "title" => "Cozy Apartment in Lahore",
    "location" => "Lahore",
    "price" => 15000,
    "image" => "https://source.unsplash.com/featured/?apartment,luxury",
    "description" => "A cozy modern apartment perfect for solo travelers or couples."
  ],
  [
    "title" => "Beachfront Villa in Gwadar",
    "location" => "Gwadar",
    "price" => 35000,
    "image" => "https://source.unsplash.com/featured/?villa,beach",
    "description" => "Enjoy the ocean breeze in this stunning beachfront villa."
  ],
  [
    "title" => "Modern Family Home in Islamabad",
    "location" => "Islamabad",
    "price" => 25000,
    "image" => "https://source.unsplash.com/featured/?house,family",
    "description" => "A spacious and stylish home ideal for families."
  ],
  [
    "title" => "Luxury Penthouse in Karachi",
    "location" => "Karachi",
    "price" => 45000,
    "image" => "https://source.unsplash.com/featured/?penthouse,city",
    "description" => "Top-floor penthouse with skyline views and modern amenities."
  ],
  [
    "title" => "Treehouse Escape in Murree",
    "location" => "Murree",
    "price" => 12000,
    "image" => "https://source.unsplash.com/featured/?treehouse,nature",
    "description" => "A peaceful hideout surrounded by lush greenery and nature."
  ]
];

foreach ($properties as $prop) {
  $stmt = $conn->prepare("INSERT INTO properties (title, location, price, image, description) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssiss", $prop['title'], $prop['location'], $prop['price'], $prop['image'], $prop['description']);
  $stmt->execute();
}

echo "<div style='font-family:Segoe UI; padding:30px; font-size:18px;'>✅ Sample properties inserted successfully!<br><br><a href='index.php'>Go to Homepage</a></div>";
?>
