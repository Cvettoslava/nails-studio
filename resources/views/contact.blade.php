@extends('layouts.app')

@section('content')
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 11px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}

</style>
</head>
<body>

<h3>Contact Form</h3>

<div class="container">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
 
    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    
    <label for="lname">Email</label>
    <input type="text" id="lname" name="email" placeholder="Your email..">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
<!--The div element for the map -->
<div id="map"></div>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
      src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
      async
    ></script>

</body>

<script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: -25.344, lng: 131.036 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
@endsection