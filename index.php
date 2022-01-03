<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<p class="msg"></p>
<p class="alt"></p>
<p class="altAcc"></p>
<p class="heading"></p>
<p class="lat"></p>
<p class="longitude"></p>
<p class="acc"></p>
<p class="speed"></p>
<p class="motion"></p>
<p class="orientation"></p>
<script>
//gps data
if(navigator.geolocation) {
    $('.msg').html('geolocation available,');  
    navigator.geolocation.watchPosition(showPosition);
} else {
    $('.msg').html('geolocation not available,');
}
//accelerometer data
if(window.DeviceMotionEvent){
    $('.msg').append('devicemotion available,');
    window.addEventListener("devicemotion", motion, false);
}else{
    $('.msg').append('devicemotion not available,');
}
//magnetometer data
if(window.DeviceOrientationEvent){
    $('.msg').append('deviceorientation available,');
    window.addEventListener("deviceorientation", handleOrientation, true);
}else{
    $('.msg').append('deviceorientation not available,');
}
function handleOrientation(event){
    $('.orientation').html("Magnetometer: "
    + event.absolute + ", "
    + event.alpha + ", "
    + event.beta + ", "
    + event.gamma
  );
}
function motion(event){
    $('.motion').html("Accelerometer: x:"
    + event.accelerationIncludingGravity.x + ", y:"
    + event.accelerationIncludingGravity.y + ", z:"
    + event.accelerationIncludingGravity.z
    );
}
function showPosition(position){
    $('.alt').html('altitude: '+ position.coords.altitude);
    $('.altAcc').html('altitude accuracy: '+ position.coords.altitudeAccuracy);
    $('.heading').html('heading: '+ position.coords.heading);
    $('.lat').html('lat: '+ position.coords.latitude);
    $('.longitude').html('long: '+ position.coords.longitude);
    $('.acc').html('gps accuracy: '+ position.coords.accuracy);
    $('.speed').html('speed: '+ position.coords.speed);
}

    
</script>