function login(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var checkbox = document.getElementById('potoco_check');
	if (checkbox.checked) {
		//alert('123');
	}
	if (username != '' && password != '') {
		console.log(username,password);
		document.getElementById("form").submit();
	}
}

function register(){
	document.getElementById("form_register").submit();
}

function forget(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	//var pwd = document.getElementById("pwd").value;
	var checkbox = document.getElementById('potoco_check');
	if (username != '' && password != '') {
		console.log(username,password);
		//document.getElementById("wron").innerHTML = "";
		document.getElementById("forgeform").submit();
	}
}

function ribit(){
	var types = document.getElementById('password').type;
	if (types == "text") {
		document.getElementById('password').type = "password";
		document.getElementById('ribit').className='icon';
	}else{
		document.getElementById('password').type = "text";
		document.getElementById('ribit').className='icon slide';
	}
}