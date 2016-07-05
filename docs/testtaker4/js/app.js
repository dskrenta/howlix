/*
 *	Library.js
 */

if(localStorage.getItem("user") != null)
{
	var user = localStorage.getItem("user");
	user = window.atob(user);
	user = JSON.parse(user);
	userUuid = user.uuid;
}

function user(uuid, googleId, name, email, profileImage, type, tests, classes)
{
	this.uuid = uuid;
	this.googleId = googleId;
	this.name = name;
	this.email = email;
	this.profileImage = profileImage;
	this.type = type;
	this.tests = tests;
	this.classes = classes;
}

function guid()
{
	function s4() 
	{
    		return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
  	}
  	return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}

function yearFooter()
{
	var d = new Date();
        var n = d.getFullYear();
      	document.getElementById("date").innerHTML = n;
}

function renderButton() 
{
	gapi.signin2.render('my-signin2', 
	{
        	'scope': 'https://www.googleapis.com/auth/plus.login',
        	'width': 200,
        	'height': 50,
        	'longtitle': false,
        	'theme': 'dark',
        	'onsuccess': onSuccess,
        	'onfailure': onFailure
      	});
}

function onSuccess(googleUser) 
{
	profile = googleUser.getBasicProfile();
	$.post(
		"http://howlix.com/testtaker4/application/userCheck.php",
		{
			uuid: window.btoa(profile.getEmail())
		},
		function(data)
		{
			if(data != "false")
			{
				localStorage.setItem("user", window.btoa(data));
				window.location = "http://howlix.com/testtaker4/dash";	
			}
			else
			{
				profile = googleUser.getBasicProfile(); //GLOBAL
                        
				user = {
					"uuid": window.btoa(profile.getEmail()),
					"google_id": profile.getId(),
					"name": profile.getName(),
					"email": profile.getEmail(),
					"image_url": profile.getImageUrl(),
					"type": null, 
					"tests": null,
					"classes": null
				};

				json = JSON.stringify(user);				

				$.post( 
                                	"http://howlix.com/testtaker4/application/userRegister.php",
                                	{
                                        	uuid: window.btoa(profile.getEmail()),
						json: json
                                	},      
                                	function(data)
                               		{
                                    		if(data == "success")
                                        	{
							document.getElementById("name").innerHTML = profile.getName();
							$('#myRegisterModal').modal('show')
                                        	}       
                                        	else    
                                        	{
                                       			alert("Error logging in."); 
                                        	}
                                	}       
                        	);
			}	
		}
	);			
}
    
function onFailure(error) 
{
	console.log(error);
	alert("Failed to login");
}

function setType(type)
{
	$.post(
        	"http://howlix.com/testtaker4/application/userTypeRegister.php",
		{
                	type: type,
			uuid: window.btoa(profile.getEmail())
              	},
               	function(data)
               	{
			if(data != "failure")
			{
				localStorage.setItem("user", window.btoa(data));
				window.location = "http://howlix.com/testtaker4/dash";
			}
			else
			{
				alert("error");
			}
		}
	);
}

function initUser()
{
	var json = window.atob(localStorage.getItem("user"));
	user = JSON.parse(json); //GLOBAL
}

function signOut()
{
	var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function ()
        {
        	console.log('User signed out.');
      	});
			
	localStorage.removeItem("user");
	window.location="http://howlix.com/testtaker4";
}

function onLoad() 
{
	gapi.load('auth2', 
		function() 	
		{
       			gapi.auth2.init();
      		}
	);
}

function displayList(id, type)
{
	if(id && type)
	{
		$.get(
			"http://howlix.com/testtaker4/application/getList.php",
			{
				uuid: user.uuid, 
				type: type
			},
			function(data)
			{
				if(data != "failure")
				{
					var list = JSON.parse(data);
					if(list != null)
					{
                                       		//for(var i = 0; i < list.length; i++)
						for(var i = list.length-1; i >= 0; i--)
						{
                                               		if(type == "classes")
                                               		{
                                                       		var html = "<a href=\"test_view.html\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + list[i].classTitle + "</h4><p class=\"list-group-item-text\">" + list[i].classDescription + "</p><p class=\"list-group-item-text\">" + list[i].classId + "</p></a>";
                                               		}
                                               		else
                                               		{
								if(user.type == 0)
								{
									var testDate = new Date(list[i].testDate);
									var currentDate = new Date();
									if(testDate.getFullYear() == currentDate.getFullYear() && testDate.getMonth() == currentDate.getMonth() && testDate.getDay() == currentDate.getDay())
									{
										var html = "<a href=\"test_view.html\" class=\"list-group-item active\"><span class=\"badge badge-success\">Now</span><h4 class=\"list-group-item-heading\">" + list[i].testTitle + "</h4><p class=\"list-group-item-text\">" + list[i].testDescription + "</p><p class=\"list-group-item-text\">" + list[i].testId + " &middot; " + list[i].testTimeAllowed + " Minutes" + list[i].testDate + list[i].testStartTime + list[i].testEndTime + "</p></a>";
                                                			}
									else
									{
										var html = "<a href=\"test_view.html\" class=\"list-group-item disabled\"><h4 class=\"list-group-item-heading\">" + list[i].testTitle + "</h4><p class=\"list-group-item-text\">" + list[i].testDescription + "</p><p class=\"list-group-item-text\">" + list[i].testId + " &middot; " + list[i].testTimeAllowed + " Minutes" + list[i].testDate + list[i].testStartTime + list[i].testEndTime + "</p></a>";	
									}
								}
								else
								{
									var html = "<a href=\"test_view.html\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + list[i].testTitle + "</h4><p class=\"list-group-item-text\">" + list[i].testDescription + "</p><p class=\"list-group-item-text\">" + list[i].testId + " &middot; " + list[i].testTimeAllowed + " Minutes" + list[i].testDate + list[i].testStartTime + list[i].testEndTime + "</p></a>";
								}
							}
                                                	$("#" + id).append(html);
                                        	}
					}
					else
					{
						if(type == "classes")
                                        	{
                                             		var html = "<h4>No Classes Yet!</h4>";
                                        	}       
                                        	else(type == "tests")
                                        	{
                                                	var html = "<h4>No Tests Yet!</h4>";
                                        	}       
                                        	$("#" + id).append(html);
					} 
				}
				else
				{
					alert("failure");
				}
			}
		);
	}
	else
	{
		alert("failure");
	}
}

// NULL PROBLEM
/*
function displayList(id, type)
{
	$.get(
                "http://howlix.com/testtaker4/application/getList.php",
                {
                        uuid: user.uuid,
                        type: type
                },

                function(data)
                {
			console.log(typeof data)
                        if(data != "failure")
                        {
                                if(data)
                                {
                                        var list = JSON.parse(data);
                                        for(var i = 0; i < list.length; i++)
                                        {
						if(type == "classes")
						{
                                                	var html = "<a href=\"test_view.html\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + list[i].classTitle + "</h4><p class=\"list-group-item-text\">" + list[i].classDescription + "</p><p class=\"list-group-item-text\">" + list[i].classId + "</p></a>";
                                               	}
						else
						{
							var html = "<a href=\"test_view.html\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + list[i].testTitle + "</h4><p class=\"list-group-item-text\">" + list[i].testDescription + "</p><p class=\"list-group-item-text\">" + list[i].testId + " &middot; " + list[i].testTimeAllowed + " Minutes" + list[i].testDate + list[i].testStartTime + list[i].testEndTime + "</p></a>";
						}
						$("#" + id).append(html);
                                        }
                                }
                                else
                                {
					if(type == "classes")
					{
                                        	var html = "<h4>No Classes Yet!</h4>";
					}
					else
					{
						var html = "<h4>No Tests Yet!</h4>";
					}
                                        $("#" + id).append(html);
                                }
                        }
			else
			{
				alert("failure");
			}		
                }
        );
}
*/

/*
function listTests(id)
{
	$.get(
                "http://howlix.com/testtaker4/application/getList.php",
                {
                        uuid: user.uuid,
                        type: "tests"
                },

                function(data)
                {
                        if(data != "failure")
                        {
                                if(data != null)
                                {
                                        var tests = JSON.parse(data);
                                        for(var i = 0; i < tests.length; i++)
                                        {
                                                var html = "<a href=\"test_view.html\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + tests[i].classTitle + tests[i].classId + tests[i].classDescription + "</h4></a>";
                                                $("#" + id).append(html);
                                        }
                                }
                                else
                                {
                                        var html = "<h4>No Classes Yet!</h4>";
                                        $("#" + id).append(html);
                                }
                        }
                }
        );
}

function listClasses(id)
{
	$.get(
                "http://howlix.com/testtaker4/application/getList.php",
                {
                        uuid: user.uuid,
                        type: "classes"
                },

                function(data)
                {
                        if(data != "failure")
        		{
                		if(data != null)
              		  	{
                        		var classes = JSON.parse(data);
                        		for(var i = 0; i < classes.length; i++)
					{
                                		var html = "<a href=\"test_view.html\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + classes[i].classTitle + classes[i].classId + classes[i].classDescription + "</h4></a>";
                                		$("#" + id).append(html);
                        		}       
                		}       
                		else    
                		{
                        		var html = "<h4>No Classes Yet!</h4>";
                        		$("#" + id).append(html);         
                		}       
        		}     
                }
        );
}
*/

/*
function listSections(id, sectionList)
{
		for (var item in sectionList)
        	{
          		var html = "<a href=\"test_view.html\" class=\"list-group-item\"><h4 class=\"list-group-item-heading\">" + sectionList[item] + "</h4></a>";
               		$("#" + id).append(html);
        	}
}
*/

function createClass()
{
	var classId = guid();	
	var date = new Date();
	var students;		
	
	var localStore = localStorage.getItem("user");
	var decoded_user_data = window.atob(localStore);
	var parsed = JSON.parse(decoded_user_data);
	var uuid = parsed.uuid;

	var classData = {
		"classId": classId, 
		"classTitle": $("#title").val(), 
		"classDescription": $("#description").val(), 
		"uuid": uuid,
		"students": null, 
		"tests": null, 
		"timestamp": Date()
	};

	var json = JSON.stringify(classData);

	$.post(
		"http://howlix.com/testtaker4/application/createClass.php", 
		{ 
			json: json, 
			classId: classId,
			uuid: uuid
		}, 
		function(data) 
		{
			if(data != "failure")
			{ 
				//localStorage.setItem("user", window.btoa(data))
				window.location = "http://howlix.com/testtaker4/dash";
			} 
			else
			{ 
				alert("Please try again."); 
			} 
		} 
	);
}

function addClass()
{	
	var localStore = localStorage.getItem("user");
	var decoded_user_data = window.atob(localStore);
	var parsed = JSON.parse(decoded_user_data);
	var uuid = parsed.uuid;

	$.post(
		"http://howlix.com/testtaker4/application/addClass.php", 
		{ 
			classId: $("#classId").val(),
			uuid: uuid
		}, 
		function(data) 
		{
			if(data != "failure")
			{ 
				//localStorage.setItem("user", window.btoa(data));
				window.location = "http://howlix.com/testtaker4/dash";
			} 
			else
			{ 
				alert("Please try again."); 
			} 
		} 
	);
}

var count = 2;

function addQuestion()
{
	var html = "<div class=\"panel panel-default\"><div class=\"panel-body\"><div class=\"form-group\"><textarea id=\"question_" + count + "\" name=\"question_" + count + "\" class=\"form-control\" rows=\"2\" placeholder=\"Question " + count + "\"></textarea></div><div class=\"form-group\"><input type=\"text\" class=\"form-control\" id=\"answer_" + count + "_1\" name=\"answer_" + count + "_1\" placeholder=\"Answer A\"></div><div class=\"form-group\"><input type=\"text\" class=\"form-control\" id=\"answer_" + count + "_2\" name=\"answer_" + count + "_2\" placeholder=\"Answer B\"></div><div class=\"form-group\"><input type=\"text\" class=\"form-control\" id=\"answer_" + count + "_3\" name=\"answer_" + count + "_3\" placeholder=\"Answer C\"></div><div class=\"form-group\"><input type=\"text\" class=\"form-control\" id=\"answer_" + count + "_4\" name=\"answer_" + count + "_4\" placeholder=\"Answer D\"></div><div class=\"form-group\"><input type=\"text\" class=\"form-control\" id=\"answer_" + count + "_5\" name=\"answer_" + count + "_5\" placeholder=\"Answer E\"></div><div class=\"form-group\"><label>Correct Answer</label><select class=\"form-control\" id=\"answer_" + count + "\" name=\"answer_" + count + "\"><option value=\"1\">A</option><option value=\"2\">B</option><option value=\"3\">C</option><option value=\"4\">D</option><option value=\"5\">E</option></select></div></div></div>";			

	$(html).insertAfter(".panel:last");
	count ++;
}

function createTest()
{
	var arr = [];	
	var testId = guid();	
	var number = 1;		 
	var date = new Date();
	var classId = $("#class_id").val();

	var info = {"testId": testId, "testTitle": $("#test_title").val(), "testDescription": $("#test_description").val(), "testDate": $("#test_date").val(), "testTimestamp": Date(), "testStartTime": $("#start_time").val(), "testEndTime": $("#end_time").val(), "testTimeAllowed": $("#test_time_allowed").val(), "class": $("#class_id").val(), "uuid": userUuid};
	arr.push(info);
	
	while($("#question_" + number).length)
	{
		question = $("#question_" + number).val();
		answerA = $("#answer_" + number + "_1").val(); 
		answerB = $("#answer_" + number + "_2").val();
		answerC = $("#answer_" + number + "_3").val();
		answerD = $("#answer_" + number + "_4").val();
		answerE = $("#answer_" + number + "_5").val();
		correctAnswer = $("#answer_" + number).val(); 

		var question = {"question": question, "answerA": answerA, "answerB": answerB, "answerC": answerC, "answerD": answerD, "answerE": answerE, "correctAnswer": correctAnswer};
		arr.push(question);

		number ++;
	}

	var json = JSON.stringify(arr);

	$.post(
		"http://howlix.com/testtaker4/application/createTest.php", 
		{ 
			json: json, 
			testId: testId,
			uuid: userUuid,
			classId: classId 
		}, 
		function(data) 
		{
			if(data != "failure")
			{
				//localStorage.setItem("user", window.btoa(data)); 
				window.location = "http://howlix.com/testtaker4/dash";
			} 
			else
			{ 
				alert("Please try again."); 
			} 
		} 
	);
}
