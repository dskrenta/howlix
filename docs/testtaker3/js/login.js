validate("username", "input_username", "username");
validate("password", "input_password", "password");

$("button").click(function()
{
  	$.post(
           	"http://howlix.com/testtaker3/application/login.php",
               	{
                   	username: $("#username").val(),
                      	password: $("#password").val()
             	},
            	function(data)
             	{
                  	if(data != "failure")
                      	{
                          	var user = JSON.parse(data);
				var cookie = JSON.stringify(user);
				localStorage.setItem("user", cookie);
                             	window.location = "http://howlix.com/testtaker3/dash";
                      	}
                     	else
                    	{
                             	alert("Please try again.");
                    	}
            	}
       	);
});

