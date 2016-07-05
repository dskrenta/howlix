var source = new EventSource("application/sse.php");
source.onmessage = function(event)
{
	postMessage(event.data);
}	
