<?php
function getNearbyRestaurants($lat, $lon, $conn) {
    $sql = "SELECT NOMEOPERATORE, SITOWEB, LATITUDINE, LONGITUDINE, 
            ( 6371 * acos( cos( radians($lat) ) 
            * cos( radians( LATITUDINE ) ) 
            * cos( radians( LONGITUDINE ) - radians($lon) ) 
            + sin( radians($lat) ) 
            * sin(radians(LATITUDINE)) ) ) AS distance 
            FROM ristoranti 
            HAVING distance < 3 
            ORDER BY distance 
            LIMIT 0 , 20";
    $result = $conn->query($sql);

    $restaurants = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $restaurants[] = array(
                "name" => $row["NOMEOPERATORE"],
                "website" => $row["SITOWEB"]
            );
        }
    }
    return $restaurants;
}
?>
