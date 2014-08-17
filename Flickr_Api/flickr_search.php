<?php
require_once('flickr.php');
$Flickr = new Flickr;
if (!empty($_GET['q'])) {
    
    // Remove any hack attempts from input data 
    $search_term = htmlspecialchars($_GET['q']);
    
    $search_term   = $_GET['q'];
    $flickr_stream = '';
    $data          = $Flickr->search($search_term);
    
    foreach ($data['photos']['photo'] as $photo) {
        
        // The geolocation information    
        $photo_latlong = array(
            "latitude" => $photo['latitude'],
            "longitude" => $photo['longitude']
        );

        // the image URL becomes somthing like 
        // http://farm{farm-id}.static.flickr.com/{server-id}/{id}_{secret}.jpg  
        $flickr_html = '<a href="http://www.flickr.com/photos/' . $photo["owner"] . '/' . $photo["id"] . '/" target="_blank" rel="nofollow" data-geo=\'' . json_encode($photo_latlong) . '\'><img  border="0" src="http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" width="150" /></a>';
        

        $flickr_stream .= $flickr_html;
    }

    // Add the google map HTML
    $flickr_stream .= '<div id="google-map"></div>';

    print $flickr_stream;
    
} else {
    print 'No search terms found';
}
?>
