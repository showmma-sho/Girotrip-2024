<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourest - Explore the World</title>

  <!-- Icona del sito -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- css principale del sito -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


  <!-- Font di google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comforter+Brush&family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="./assets/css/legend.css">
  <style>
.overlay-text {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* Black background with 50% opacity */
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  z-index: 1; /* Ensure the overlay text is above the card */
  font-size: 1.5em; /* Make the text bigger */
}


.blurred {
  filter: blur(2px);
}

.nav-item.dropdown {
    margin-top: 5px; /* Adjust as needed */
}

@media (max-width: 992px) { /* Adjust breakpoint as needed */
    .nav-item.dropdown {
        margin-top: 12px; /* Reset margin for mobile view */
    }
    .nav-link.dropdown-toggle.navbar-link {
        padding: 0 !important; /* Override the padding for mobile view */
    }
}

    .restaurant-cards-container {
    display: flex; /* Use flexbox to align items */
    justify-content: center; /* Center items horizontally */
    align-items: center; /* Center items vertically */
    flex-wrap: wrap; /* Allow items to wrap as needed */
    overflow-x: auto;
    padding-bottom: 100px;
    margin-top: -85px;

    }

    .restaurant-card {
        display: flex; /* Use flexbox for the card */
        flex-direction: column; /* Stack items vertically */
        margin: 10px; /* Add some margin around the cards */
        width: 18rem; /* Set a fixed width for the cards */
        position: relative;
    }

    .restaurant-card .card-title {
        white-space: nowrap; /* Keep the title in a single line */
        overflow: hidden; /* Hide overflow */
        text-overflow: ellipsis; /* Add ellipsis at the end if text overflows */
        max-width: 100%; /* Ensure the title does not exceed the card width */
    }
  </style>
 

</head>
<body id="top">
    <!-- 
    - #HEADER
  -->
    <header class="header" data-header>
      <div class="container">
        <a href="#">
          <h1 class="logo">GiroTrip</h1>
        </a>
        <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
          <ion-icon name="menu-outline" class="open"></ion-icon>
          <ion-icon name="close-outline" class="close"></ion-icon>
        </button>
        <nav class="navbar">
  <ul class="navbar-list">
    <li>
      <a class="navbar-link" href="about.html">About Us</a>
    </li>
    <li>
      <a class="navbar-link" href="#choose-your-place">Mappa</a>
    </li>
    <?php
session_start();
if(isset($_SESSION["Nome"])) {
  // User is logged in
  echo '<li><a class="navbar-link" href="feedback.html">Feedback</a></li>';
  echo '<li><a class="navbar-link" href="premium.php">Premium</a></li>';
  echo '<li class="nav-item dropdown">';
  echo '<a class="nav-link dropdown-toggle navbar-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
  echo $_SESSION["Nome"];
  echo '</a>';
  echo '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">'; // Align the dropdown menu to the right
  echo '<button class="dropdown-item btn btn-danger btn-block" onclick="location.href=\'logout.php\'">Logout</button>'; // Style the logout button with Bootstrap
  echo '</div>';
  echo '</li>';
} else {
  // User is not logged in
  echo '<li><a class="navbar-link" href="login.php">Login</a></li>';
  echo '<li><a class="navbar-link" href="crea.html">Registrati</a></li>';
}
?>

  </ul>
</nav>



      </div>
    </header>
    <main>
      <article>
        <!-- 
        - #HERO
      -->
        <section class="section hero" style="background-image: url('./assets/images/hero-bg-bottom.png') url('./assets/images/hero-bg-top.png')">
          <div class="container">
            <img src="./assets/images/shape-1.png" width="61" height="61" alt="Vector Shape" class="shape shape-1">
            <img src="./assets/images/shape-2.png" width="56" height="74" alt="Vector Shape" class="shape shape-2">
            <img src="./assets/images/shape-3.png" width="57" height="72" alt="Vector Shape" class="shape shape-3">
            <div class="hero-content">
              <p class="section-subtitle">Esplora le coste pugliesi</p>
              <h2 class="hero-title">Trova il posto più adatto a te</h2>
              <p class="hero-text"> Find your sea and Savor the Flavor! </p>
            </div>
            <figure class="hero-banner">
              <img src="./assets/images/hero-banner.png" width="686" height="812" loading="lazy" alt="hero banner" class="w-100">
            </figure>
          </div>
        </section>
        <!-- 
        - #DESTINATION
      -->
        <section class="section destination">
          <div class="container">
            <p class="section-subtitle">Destinations</p>
            <h2 class="h2 section-title">Choose Your Place</h2>
            <section id="choose-your-place">
            <div class="d-flex align-items-center justify-content-center">
    <div class="circle-container mr-3" onclick="filterMarkers('assente')">
      <div class="circle bg-success-border"></div>
      <span class="circle-text">Ottima</span>
    </div>
    <div class="circle-container mr-3" onclick="filterMarkers('discreta')">
      <div class="circle bg-danger-border"></div>
      <span class="circle-text">Discreta</span>
    </div>
    <div class="circle-container mr-3" onclick="filterMarkers('scarsa')">
      <div class="circle bg-warning-border"></div>
      <span class="circle-text">Scarsa</span>
    </div>
    <div class="circle-container" onclick="filterMarkers('modesta')">
      <div class="circle bg-orange-border"></div>
      <span class="circle-text">Modesta</span>
    </div>
  </div>
</div>
        </div>



          
          <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div id="map" style="height: 500px;"></div>
      </div>
    </div>
    <!-- Add the restaurant-cards-container div here -->
              <section class="section popular">
            <div class="container">
              <p class="section-subtitle">Ristoranti</p>
              <h2 class="h2 section-title">I piu vicini</h2>

            </div>
          </section>
    <div id="restaurant-cards-container" class="restaurant-cards-container">
      <!-- Restaurant cards will be dynamically inserted here -->
    </div>
  </div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  
  <script>
    var map = L.map('map').setView([41.1172, 16.8719], 7); 

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);

    var greenIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });

    var yellowIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });

    var orangeIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-orange.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });

    var redIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
    });

    <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");
include("restaurant.php");

// Fetch all beaches
$sql = "SELECT Latitude as lat1, Longitude as lon1, classe_abbondanza, denominazione, comune, provincia FROM mappa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $icon = "greenIcon"; 
    switch ($row["classe_abbondanza"]) {
      case "assente":
        $icon = "greenIcon";
        break;
      case "discreta":
        $icon = "redIcon";
        break;
      case "scarsa":
        $icon = "yellowIcon";
        break;
      case "modesta":
        $icon = "orangeIcon";
        break;
    }

    $restaurants = getNearbyRestaurants($row["lat1"], $row["lon1"], $conn);
    $restaurantData = json_encode($restaurants);
    //$buttonHtml = count($restaurants) > 0 ? "<button onclick='showRestaurants(" . $restaurantData . ")'>Qui Vicino</button>" : "";
    
    $buttonHtml = count($restaurants) > 0 ? "<button onclick='showRestaurants(" . $restaurantData . ")' class='btn btn-primary btn-lg' >Qui Vicino</button>" : "";

    $popupContent = "<div class='card'><div class='card-body'><h2 class='card-title'>" . $row["denominazione"] . "</h2><h2 class='card-subtitle mb-2 text-muted'><p>" . $row["comune"] . ", " . $row["provincia"] . "</h6>" . $buttonHtml . "</div></div>";

    echo "L.marker([" . $row["lat1"]. ", " . $row["lon1"]. "], {icon: " . $icon . "}).addTo(map).bindPopup(" . json_encode($popupContent) . ");";

    
  }
} else {
  echo "0 results";
}
$conn->close();
?>

function showRestaurants(restaurants) {
  var cardsContainer = $('#restaurant-cards-container');
  cardsContainer.empty(); // Clear previous cards

  if (restaurants.length === 0) {
    cardsContainer.hide();
    return;
  }

  // Fetch the user's payment status from the server
  $.get('paga_status.php', function(data) {
    var paymentStatus = JSON.parse(data);

    restaurants.forEach(function(restaurant, index) {
      // Ensure the URL starts with 'http://' or 'https://'
      var websiteUrl = restaurant.website;
      if (!websiteUrl.startsWith('http://') && !websiteUrl.startsWith('https://')) {
        websiteUrl = 'http://' + websiteUrl;
      }

      var cardHtml = '<div class="restaurant-card" style="width: 38rem; display: inline-block; margin-right: 10px;">' +
               '<div class="card' + (paymentStatus ? '' : ' blurred') + '">' +
               // Add a random wider image from Lorem Picsum
               '<img class="card-img-top" src="https://picsum.photos/300/200?random=' + index + '" alt="Restaurant Image">' +
               '<div class="card-body">' +
               '<h2 class="card-title">' + restaurant.name + '</h2>' +
               // Use the corrected websiteUrl and disable the button if paymentStatus is false
               '<a href="' + websiteUrl + '" class="btn btn-primary btn-lg' + (paymentStatus ? '' : ' disabled') + '" target="_blank">Visita sito</a>' +
               '</div>' +
               '</div>' +
               // Add the overlay text and a button if paymentStatus is false
               (paymentStatus ? '' : '<div class="overlay-text">You have to choose a premium plan to see more.<br><button class="btn btn-primary" onclick="location.href=\'premium.php\'">Go Premium</button></div>') +
               '</div>';

      cardsContainer.append(cardHtml);
    });

    // Show the container and scroll to it
    cardsContainer.show(0, function() {
      $('html, body').animate({
        scrollTop: cardsContainer.offset().top
      }, 1000);
    });
  });
}



  </script>
        </section>
          <!-- 
        - #POPULAR
      -->

          <!-- 
        - #ABOUT
      -->
 
      </article>
    </main>
    <!-- 
    - #FOOTER
  -->
 
    <!-- 
    - #GO TO TOP
  -->
    <a href="#top" class="go-top" data-go-top aria-label="Go To Top">
      <ion-icon name="chevron-up-outline"></ion-icon>
    </a>
    <!-- 
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./assets/js/legend.js"></script>
  </body>
</html>