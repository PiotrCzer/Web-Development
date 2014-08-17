// jQuery script for search request with server 
jQuery(document).ready(function($) { 
 
 // Run when Search button is clicked 
 $('#search_button').click(function(){ 
 
 // Display a progress indicator 
 $('#search_results').html('<center><img src="images/loader.gif" id="spinner" width="64px" height="64px"></center>');
 $('#search_results1').html('<center><img src="images/loader.gif" id="spinner" width="64px" height="64px"></center>'); 
 
 
 // Get the value of the input field 
 // Encode it for use in a URL 
 var search_value = encodeURIComponent($('input[name=search_terms]').val()); 
 
 // Send the search terms to the server in an Ajax request 
 $.ajax({ 
	url: 'http://trendmashing.gopagoda.com/Twitter_Api/search_server.php?q=' + search_value,
	success: function(data)
	{ 
		// Display the results 
		$('#search_results').html(data); 
	} 
})
 $.ajax({
	url: 'http://trendmashing.gopagoda.com/Flickr_Api/flickr_search.php?q=' + search_value,
	success: function(data1)
		{ 
		// Display the results and delete progress indicator
		$('#search_results1').html(data1);

        // Initialize the google map
        initializeMap(createGeolocationData());

		} 
 	})

})

  // This function gets the data from the elements, the elements are NOT on the page until
  // the AJAX request above to the API is complete, so it needs to run after.
  function createGeolocationData() {

    // Create a blank array to store geolocation information from the HTML
    // elements
    var geolocationData = new Array();
    
    // This loops through every HTML element with a data-geo attribute
    $('[data-geo]').each(function(index, element) {
      
        // The geolocation information stored on each element is not readable
        // by JavaScript yet (because of json_encode in PHP), so we need to
        // parse it using JSON.parse and add it to our geolocationData array
        geolocationData.push(
          JSON.parse($(this).attr('data-geo'))
        );
      
    });

    return geolocationData;

  }

  // This function initializes the map, it requires geolocation data to be passed as an argument
  function initializeMap(geolocationData) {

    // Map options
    var mapOptions = {
      zoom: 2,
      center: new google.maps.LatLng(53.279470, -6.358698)
    };

    // Create a new map
    var map = new google.maps.Map(document.getElementById("google-map"), mapOptions);

    // Loop through all of the geo locations we have and add a marker
    for(var i = 0; i < geolocationData.length; i++) {

      // Add the marker - https://developers.google.com/maps/documentation/javascript/examples/icon-simple
      new google.maps.Marker({
        position: new google.maps.LatLng(geolocationData[i]['latitude'], geolocationData[i]['longitude']),
        map: map
      });

    }

  }


})
