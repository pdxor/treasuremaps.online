		// addEventListener("message", receiveMessage, false);

		

		function showHideDiv(id) {

		    var e = document.getElementById(id);

		    if(e.style.display == null || e.style.display == "none") {

		        e.style.display = "block";

		    } else {

		        e.style.display = "none";

		    }

		}



	function getlookat()

	{

		var krpano = document.getElementById("krpanoSWFObject");

		

		if (krpano && krpano.get)	// it can take some time until krpano is loaded and ready

		{

			krpano.call("screentosphere(mouse.x, mouse.y, mouseath, mouseatv);");

		}

	}





	// update mouse info 30 times per second

	var lookat_interval = setInterval('getlookat()', 1000.0 / 30.0);

	

	

	// disable text selection to avoid cursor flickering

	window.onload = function() 

	{

  		document.onselectstart = function() {return false;} // ie

  		document.onmousedown = function() {return false;} // mozilla

	}

	function enterdata()

	{

	  var pathArray = window.location.pathname.split( '/' );

	  var urltag = pathArray[2];

	  var krpano = document.getElementById("krpanoSWFObject");

			

			var mouse_at_x = krpano.get("mouse.x");  

			var mouse_at_y = krpano.get("mouse.y");

			var mouse_at_h = krpano.get("mouseath");

			var mouse_at_v = krpano.get("mouseatv");

			

				$("#myModal").modal("show");	

			var wh = document.getElementById('mcswap');

			wh.innerHTML = '<iframe style="height: 999px; width: 100%;" name="myIframe" frameborder="0" src="https://www.treasuremaps.online/id-a-node/?ath='+mouse_at_h.toFixed(2)+'&atv='+mouse_at_v.toFixed(2)+'&urltag='+urltag+'"></iframe>';



	}

	function hslink(a)

	{

	$("#myModal").modal("show");		

	var wh = document.getElementById('mcswap');

			wh.innerHTML = '<iframe style="height: 999px; width: 100%;" name="myIframe" frameborder="0" src="'+a+'"></iframe>';

	}

	function runhotspot(a)

	{

	$("#myModal").modal("show");

	var pathArray = window.location.pathname.split( '/' );

	  var urltag = pathArray[2];

	var wh = document.getElementById('mcswap');

			wh.innerHTML = '<iframe style="height: 999px; width: 100%;" name="myIframe" frameborder="0" src="'+a+'/?urltag='+urltag+'"></iframe>';

	}
		function gototour(a)

	{

	window.location = a;

	}