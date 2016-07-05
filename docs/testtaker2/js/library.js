/*
 *	Library.js - David Skrenta
 */

function clearValidate(input_id, form_group_id, sector)
{
	$("." + sector + " #inputSuccess2Status").remove();
        $("." + sector + " #inputError2Status").remove();
        $("." + sector + " #success").remove();
        $("." + sector + " #danger").remove();
        $("#" + form_group_id).removeClass("has-feedback has-error");
       	$("#" + form_group_id).removeClass("has-feedback has-success");	
}

function validate(input_id, form_group_id, type)
{
	//var html_success = "<span id=\"success\" class=\"glyphicon glyphicon-ok form-control-feedback\" aria-hidden=\"true\"></span><span id=\"inputSuccess2Status\" class=\"sr-only\">(success)</span>";
	//var html_danger = "<span id=\"danger\" class=\"glyphicon glyphicon-remove form-control-feedback\" aria-hidden=\"true\"></span><span id=\"inputError2Status\" class=\"sr-only\">(error)</span>";
	var html_success = "<span id=\"success\" style=\"line-height: 34px;\" class=\"fa fa-check fa-lg form-control-feedback\" aria-hidden=\"true\"></span><span id=\"inputSuccess2Status\" class=\"sr-only\">(success)</span>";
	var html_danger = "<span id=\"danger\" style=\"line-height: 34px;\" class=\"fa fa-times fa-lg form-control-feedback\" aria-hidden=\"true\"></span><span id=\"inputError2Status\" class=\"sr-only\">(error)</span>";	

	switch(type)
	{
		case "username":
			$("#" + input_id).change(function()
                	{
                        	var username = $("#" + input_id).val();
                        	if(username.match(/^[a-z0-9]*$/i))
                        	{
					clearValidate(input_id, form_group_id, "input_username");
                                	$(html_success).insertAfter("#" + input_id)
                                	$("#" + form_group_id).addClass("has-feedback has-success");
                        	}
                        	else
				{
					clearValidate(input_id, form_group_id, "input_username");
                                	$(html_danger).insertAfter("#" + input_id)
                                	$("#" + form_group_id).addClass("has-feedback has-error");
                        	}
                	})
			break;
		case "email":
			$("#" + input_id).change(function()
                        {
                                var email = $("#" + input_id).val();
                                if(email.match(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/))
                                {
					clearValidate(input_id, form_group_id, "input_email");
                                        $(html_success).insertAfter("#" + input_id)
                                        $("#" + form_group_id).addClass("has-feedback has-success");
                                }
                                else
                                {
					clearValidate(input_id, form_group_id, "input_email");
                                        $(html_danger).insertAfter("#" + input_id)
                                        $("#" + form_group_id).addClass("has-feedback has-error");
                                }
                        })
			break;
		case "password":
			$("#" + input_id).change(function()
                        {
                                var password = $("#" + input_id).val();
                                if(password.match(/^[a-z0-9]*$/i))
                                {
					clearValidate(input_id, form_group_id, "input_password");
                                        $(html_success).insertAfter("#" + input_id)
                                        $("#" + form_group_id).addClass("has-feedback has-success");
                                }
                                else
                                {
					clearValidate(input_id, form_group_id, "input_password");
                                        $(html_danger).insertAfter("#" + input_id)
                                        $("#" + form_group_id).addClass("has-feedback has-error");
                                }
                        })
			break;
		case "first_name":
			$("#" + input_id).change(function()
                        {
                                var first_name = $("#" + input_id).val();
                                if(first_name.match(/^[a-z]*$/i))
                                {
					clearValidate(input_id, form_group_id, "input_first_name");
                                        $(html_success).insertAfter("#" + input_id)
                                        $("#" + form_group_id).addClass("has-feedback has-success");
                                }
                                else
                                {
					clearValidate(input_id, form_group_id, "input_first_name");
                                        $(html_danger).insertAfter("#" + input_id)
                                        $("#" + form_group_id).addClass("has-feedback has-error");
                                }
                        })
			break;
		case "last_name":
			$("#" + input_id).change(function()
                        {
                                var last_name = $("#" + input_id).val();
                                if(last_name.match(/^[a-z]*$/i))
                                {
					clearValidate(input_id, form_group_id, "input_last_name");
                                        $(html_success).insertAfter("#" + input_id)
                                        $("#" + form_group_id).addClass("has-feedback has-success");
                                }
                                else
                                {
					clearValidate(input_id, form_group_id, "input_last_name");
                                        $(html_danger).insertAfter("#" + input_id)
                                        $("#" + form_group_id).addClass("has-feedback has-error");
                                }
                        })
			break;
	}
}

function user(username, email, password, first_name, last_name, type, uuid, tests)
{
	this.username = username;
	this.email = email;
	this.password = password;
	this.first_name = first_name;
	this.last_name = last_name;
	this.type = type;
	this.uuid = uuid;
	this.tests = tests;
}

function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}

function cookie()
{
	var cookies = document.cookie.split(';');
	return cookies[0];
}

var w;

function worker()
{
	w = new Worker("user_worker.js");
	w.onmessage = function(event)
	{
		localStorage.setItem("user", event.data);
	}
}
