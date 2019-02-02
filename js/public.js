		embedpano({swf:"../tour.swf", xml:"tour.xml", target:"pano", html5:"prefer", passQueryParameters:true});
		
		// function receiveMessage(event)
		// {
		//   location.reload();

		// }
	function krpano() 
	{
		return document.getElementById("krpanoSWFObject");
	}
    
	function loadpano(xmlname)
	{
		krpano().call("loadpano(" + xmlname + ", null, keepview, BLEND(0.5));");
	
	}
	
	function viewset(a){
		
moveto(100.0,5,linear(10));
	}
		// addEventListener("message", receiveMessage, false);
		
		function showHideDiv(id) {
		    var e = document.getElementById(id);
		    if(e.style.display == null || e.style.display == "none") {
		        e.style.display = "block";
		    } else {
		        e.style.display = "none";
		    }
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
function aboot()
{
		$("#newModal").modal("show");	
}
		function gototour(a)

	{

	window.location = a;

	}
