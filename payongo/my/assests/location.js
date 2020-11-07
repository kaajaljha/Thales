function geoipGet() {
  var latlon = 0; //for long/lat
		//get geolocation from API  
 		$.getJSON("https://ipinfo.io?token=20de57451ee87d", function (response) {
   		var keys = Object.keys(response);
  		latlon = response.loc;
      var locat = response.city + ", " + response.country;
  $.getJSON("https://api.darksky.net/forecast/f44a6b0153eb763f119c3a0a16e2c6c3/"+ latlon + "?exclude=minutely,hourly,alerts,flags&lang=en&callback=?", function(json) {
    $("#location").html("<strong>" + locat + "</strong>"); //get city name from api        
	});
});
}
geoipGet();
