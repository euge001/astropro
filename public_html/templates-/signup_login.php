<?php

session_start();
include ('modules/head.php');
include ('modules/header.php');
include 'modules/nav.php';
require_once('../../mysqli_connect_online_calcs_db_MYSQLI.php');
require_once ('../../my_functions_MYSQLI.php');
$email = safeEscapeString($conn, $_POST["email"]);

   		if (!empty($_SESSION['email']))  
			{
			$email = $_SESSION['email'];
			}else{
			$email = $email;
			}
 	   if (!empty($_SESSION['name']))  
			{
			$name = $_SESSION['name'];
			}else{
			$name = '';
			}		
?>


<div class="block_one">
	<div class="container">
		<div class="wrapper">
		<div class="col-md-12">
        <div class="main-content">
      <form class="form-signin" name="form1" action="../online_calcs/process_new.php" method="post">
	   <div class="spacer-30"></div>
        <h1 class="h3 mb-3 font-weight-normal">Customize your horoscope</h1>
        <label>First name:</label>
        <input class='form-control' placeholder='Choose a username:' maxLength=12 size=17 name='username' value="<?php echo $name ?>">
        
        <div class="row">
        <div class="col-md-6">
              <label>Birth month:</label>
              <select size="1" id='month' name="month" class="form-control">
              <option selected value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
          </select>
          </div>

        <div class="col-md-3">
        <label>Birth day:</label>
        <select id="day" name="day" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
          </select>
        </div>
        
            <div class="col-md-3">
            <label>Birth year:</label>
            <select id="year" name="year" class="form-control"></select>
            </div>
            </div>
        
              <div class="row-1">
              <label>City</label>
              <div id="locationField">  <input id="autocomplete" placeholder="Enter your address" type="text" class="form-control col-lg-7"></input></div>
              </div>

           <div class="row">
           <div class="col-md-4">
           <label>Birth hour:</label>
           <select id="hour" name="hour" class="form-control">
		      <?php
		      for ($i=1; $i<=12; $i++){
			      echo "<option value='".$i."'>" . $i ."</option>";
		      }
		      ?>
            </select>
            </div>


            <div class="col-md-4">
            <label>Birth minute:</label>
            <select id="minute" name="minute" class="form-control">
		        <?php
		        for ($i=0; $i<=59; $i++){
			        echo "<option value='".$i."'>" . $i ."</option>";
		        }
		        ?>
            </select>
             </div>

            <div class="col-md-4">
            <label>am/pm</label>
            <select id="amorpm" name="amorpm" class="form-control">
            <option value="AM"> AM </option>
            <option value="PM"> PM </option>
            <option value="unknown"> Unknown </option>
            </select>
            </div>
            </div>

            <div class="row">
            <div class="col-md-12">
            <label>I don't know my birth time</label>
            <input type="checkbox" id="myCheck" onclick="enableText(this.checked)">
            </div>
            </div>

              <div class="hidden">
              <div class="row-1">
              <label>City</label>
              <input id="locality" disabled="true" class="form-control col-lg-7"></input>
              </div>

              <div class="row-1">
              <label>State</label>
                  <input id="administrative_area_level_1" disabled="true" class="form-control col-lg-7"></input>
              </div>

              <div class="row-1">
              <label>Country</label>
                      <input id="country" disabled="true" class="form-control col-lg-7"></input>
              </div>

              <div class="row-1">
              <label>Latitude</label>
          <input name="latitude" id="latitude" placeholder="Latitude" class="form-control col-lg-2">
              </div>

              <div class="row-1">
              <label>Longitude</label>
              <input name="longitude" id="longitude" placeholder="Longitude" class="form-control col-lg-2">
              </div>

              <div class="row-1">
        <label>Time zone:</label>
              <input id='timezone' name='timezone' class='form-control col-lg-2'>
              </div>
   
        Longitude: <input maxlength='3' size='3' id='long_deg' name='long_deg' class='form-control col-lg-2'>&nbsp;
        <input maxlength='1' size='1' id='ew' name='ew' class='form-control col-lg-2'>&nbsp;
        <input maxlength='2' size='2' id='long_min' name='long_min' class='form-control col-lg-2'> (the format here is like 88 W 37 - don't change the order)

        Latitude: <input maxlength='3' size='3' id='lat_deg' name='lat_deg' class='form-control col-lg-2' value = "">&nbsp;
        <input maxlength='1' size='1' id='ns' name='ns' class='form-control col-lg-2'>&nbsp;
        <input maxlength='2' size='2' id='lat_min' name='lat_min' class='form-control col-lg-2'> (the format here is like 42 N 1 - don't change the order)
      
<input class='form-control' id='email' type='email' maxLength='16' size='17' name='email' VALUE='<?php echo $email ?>' placeholder='email' required>
</div>


<div class="spacer-30"></div>
<input class='btn btn-lg btn-primary btn-block' type="submit" value="Continue">
 <div class="spacer-30"></div>
</form>
</div>
      </div>
      </div>
  </div>
  </div>





  <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            document.getElementById("latitude").value = lat;
            document.getElementById("longitude").value = lng;
        }
    }
    document.getElementById('timezone').value = Math.round(longitude.value * 24 / 360);

    var dms = function (
        a, // decimal value (ex. -14.23463)
        b, // boundary; accepts "90" (Latitude) or "180" (Longitude)
        c  // precision for seconds
    ) {
        window.globalVar
        H = 'NSEW'[
            2 * (b != 90)      // expressions in brackets are booleans, that get coerced into 0 or 1
            + (a < 0)         // is the decimal value less than 0, coerced into 0 or 1
        ],
            a = (a < 0 ? -a : a) % b,  // convert value to absolute. shorten than Math.abs(a)
            // also get the modulo of the value and the boundary

            D = 0 | a,          // Degress: get the integer value; like Math.floor(a)
            a = (a - D) * 60,     // calulate the rest and multiply by 60
            M = 0 | a,          // Minutes
            a = (a - M) * 60,
            S = a.toFixed(c); // Seconds

        return [D + '°', M + '′', S + '″', H].join('\xA0');
    }
    console.log(timezone)
    var lt = latitude.value;
    var ln = longitude.value;

    var lt = dms( lt, 90);
    document.getElementById('lat_deg').value = D;
    document.getElementById('lat_min').value = M;
    var lts = S;
    document.getElementById('ns').value = H;

    var ln = dms( ln, 180);
    document.getElementById('long_deg').value = D;
    document.getElementById('long_min').value = M;
    var lns = S;
    document.getElementById('ew').value = H;
    console.log(long_deg)

}



    </script>




 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKRtOkPBEPK9Ys5pXI5KPwyx8PWLTpGhM&libraries=places&callback=initAutocomplete" async defer></script>
    <!-- <script src="http://localhost/astro_new/public_html/online_calcs/scripts/geoloc.js"></script> -->



<?php
include ('modules/footer.php');
?>

 <script type="text/javascript">
$("#myModal").modal('show');

//    $(function () {
//         // var input = document.getElementById("keyword");
//         // var autocomplete = new google.maps.places.Autocomplete(input);


// });
</script>
<script>
    var year = 1930;
    var till = 2018;
    var options = "";
    for(var y=year; y<=till; y++){
        options += "<option>"+ y +"</option>";
    }
    document.getElementById("year").innerHTML = options;
</script>
<script>
function enableText(checked){
    if(!checked){
        document.getElementById('hour').disabled = false;
        document.getElementById('minute').disabled = false;
        document.getElementById('amorpm').disabled = false;
        document.getElementById('txt').disabled = true;
        }
    else{
        document.getElementById('hour').disabled = true;
        document.getElementById('minute').disabled = true;
        document.getElementById('amorpm').disabled = true;
        document.getElementById('txt').disabled = false;
    }
}
</script>
<!-- <script>
var autoElm = document.getElementById('elm-name');
autocomplete = new google.maps.places.Autocomplete(autoElm);
google.maps.event.addListener(autocomplete, 'place_changed', function () {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
        return;
    }
});


// need to stop prop of the touchend event
if (navigator.userAgent.match(/(iPad|iPhone|iPod)/g)) {
    setTimeout(function() {
        var container = document.getElementsByClassName('pac-container')[0];
        container.addEventListener('touchend', function(e) {
            e.stopImmediatePropagation();
        });
    }, 500);
}
</script> -->
<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>


