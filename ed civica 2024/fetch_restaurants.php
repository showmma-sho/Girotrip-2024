<?php
include("connection.php");
include("restaurant.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  // Fetch nearby restaurants using the provided latitude and longitude
  $restaurants = getNearbyRestaurants($latitude, $longitude, $conn);

  // Generate card HTML for each restaurant
  foreach ($restaurants as $restaurant) {
    // You will need to fetch the restaurant's image URL and other details
    echo "
      <div class='card restaurant-card' style='width: 18rem;'>
        <img class='card-img-top' src='path_to_restaurant_image.jpg' alt='Restaurant Image'>
        <div class='card-body'>
          <h5 class='card-title'>{$restaurant['name']}</h5>
          <a href='{$restaurant['website']}' class='btn btn-primary'>Visit Website</a>
        </div>
      </div>
    ";
  }
}
?>

