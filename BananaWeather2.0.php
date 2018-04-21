<!DOCTYPE html>
<html>
<body>

<h2>Convert a JavaScript object into a JSON string, and send it to the server.</h2>
<button id="ajaxButton" type="button">Make a request</button>
<p id="demo"></p>

<?php
echo "Hello World!";
$basic  = new \Nexmo\Client\Credentials\Basic(NEXMO_API_KEY, NEXMO_API_SECRET);
$client = new \Nexmo\Client($basic);
$message = $client->message()->send([
    'to' => TO_NUMBER,
    'from' => 'Acme Inc',
    'text' => 'A text message sent using the Nexmo SMS API'
]);
const Nexmo = require('nexmo');

const nexmo = new Nexmo({
  apiKey: 'f1384f1c',
  apiSecret: 'sV9HDzeqW0UKzZA2'
});

const from = '12017785266';
const to = '19808298396';
const text = 'Bananaaaassssssssss';

nexmo.message.sendSms(from, to, text, (error, response) => {
  if(error) {
    throw error;
  } else if(response.messages[0].status != '0') {
    console.error(response);
    throw 'Nexmo returned back a non-zero status';
  } else {
    console.log(response);
  }
});
?>
<script>
(function() {
  var httpRequest;
  document.getElementById("ajaxButton").addEventListener('click', makeRequest);

  function makeRequest() {
    httpRequest = new XMLHttpRequest();
    httpRequest.responseType = 'json';

    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', 'https://api.breezometer.com/baqi/?lat=40.7324296&lon=-73.9977264&key=0ecdb6430876462dbaa36f9bcff095bc', true);
    httpRequest.send();
    //var myObj =httpRequest.responseText;
  //  myObj.breezometer_aqi;
  }

  function alertContents() {
    //var x =httpRequest.responseText.breezometer_aqi;
    //myObj.breezometer_aqi;
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
      //  alert(httpRequest);
          var x =httpRequest.response;
        document.getElementById("demo").innerHTML = x.breezometer_aqi;

      } else {
        alert('There was a problem with the request.');
      }
    }
  }
})();

</script><!--
<script>

var myObj = {
    "datetime": "2016-06-21T11:36:00",
    "country_name": "United States",
    "breezometer_aqi": 68,
    "breezometer_color": "#90D32D",
    "breezometer_description": "Fair Air Quality",
    "country_aqi": 39,
    "country_aqi_prefix": "",
    "country_color": "#00E400",
    "country_description": "Good air quality",
    "data_valid": true,
    "key_valid": true,
    "random_recommendations": {
        "children": "Have fun with the kids outside, but stay alert for our notifications",
        "sport": "You can exercise outdoors - but make sure to stay alert to our notifications",
        "health": "There is no real danger for people with health sensitivities. Just keep an eye out for changes in air quality for the next few hours",
        "inside": "The amount of pollutants in the air is noticeable, but still there is no danger to your health - It is recommended to continue monitoring changes in the coming hours",
        "outside": "It's still OK to go out and enjoy a stroll, just pay attention for changes in air quality"
    },
    "dominant_pollutant_canonical_name": "pm2.5",
    "dominant_pollutant_description": "Fine particulate matter (<2.5µm)",
    "dominant_pollutant_text": {
        "main": "The dominant pollutant is fine particulate matter (PM2.5).",
        "effects": "Particles enter the lungs and cause local and systemic inflammation in the respiratory system & heart, thus cause cardiovascular and respiratory diseases such as asthma and bronchitis.",
        "causes": "Main sources are fuel burning processes in industry, transportation and indoor heating."
    },
    "pollutants": {
        "co": {
            "pollutant_description": "Carbon monoxide",
            "units": "ppb",
            "concentration": 101.24
        },
        "no2": {
            "pollutant_description": "Nitrogen dioxide",
            "units": "ppb",
            "concentration": 9.49
        },
        "o3": {
            "pollutant_description": "Ozone",
            "units": "ppb",
            "concentration": 31.4
        },
        "pm10": {
            "pollutant_description": "Inhalable particulate matter (<10µm)",
            "units": "ug/m3",
            "concentration": 3
        },
        "pm25": {
            "pollutant_description": "Fine particulate matter (<2.5µm)",
            "units": "ug/m3",
            "concentration": 5.22
        },
        "so2": {
            "pollutant_description": "Sulfur dioxide",
            "units": "ppb",
            "concentrati0on": null
        }
    }
};
var myJSON = JSON.stringify(myObj);
window.location = "demo_json.php?x=" + myJSON;

</script-->

</body>
</html>
