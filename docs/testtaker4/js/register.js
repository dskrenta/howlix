validate("username", "input_username", "username");
validate("email", "input_email", "email");
validate("password", "input_password", "password");
validate("first_name", "input_first_name", "first_name");
validate("last_name", "input_last_name", "last_name");

var count = 0;

$("button").click(function()
{
     	var uuid = guid();
	var tests = [];
	var classes = [];

       	if(count == 0)
     	{
        	user = new user($("#username").val(), $("#email").val(), $("#password").val(), $("#first_name").val(), $("#last_name").val(), $("#type").val(), uuid, tests, classes);
      	}
      	else
     	{
         	user.username = $("#username").val();
               	user.email = $("#email").val();
           	user.password = $("#password").val();
               	user.first_name = $("#first_name").val();
             	user.last_name = $("#last_name").val();
              	user.type = $("#type").val();
               	user.uuid = uuid;
             	user.tests = tests;
		user.classes = classes;
       	}
       	
	var json = JSON.stringify(user);

     	$.post(
           	"http://howlix.com/testtaker3/application/register.php",
              	{
                   	json: json,
                    	username: $("#username").val()
              	},
              	function(data)
              	{
                     	if(data == "success")
                     	{
                  		window.location = "http://howlix.com/testtaker3/login";
                       	}
                       	else
                      	{
                                count++;
                            	alert("Please try again.");
                     	}
           	}
    	);
});
