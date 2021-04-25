function del_load(id){

	document.getElementById("del_id_val").value=id;
	

}
function update_load(id,name,email,mobile,state,city,address){

	$.ajax({
		url: "load_cities.php",
		type: "POST",
		data: {
		state_name: state
		},
		cache: false,
		success: function(result){
		$("#ucity").html(result);
		document.getElementById("ucity").value=city;
		}
		});
	document.getElementById("uid_val").value=id;
	document.getElementById("uname").value=name;
	document.getElementById("umail").value=email;
	document.getElementById("umobile").value=mobile;
	document.getElementById("uaddress").value=address;
	document.getElementById("ustate").value=state;
	
}
function validate(){
	console.log("rce");
	var x = document.getElementById("add-form").getElementsByTagName("input"); 
	var y = document.getElementById("add-form").getElementsByTagName("select"); 
	var z = document.getElementById("add-form").getElementsByTagName("textarea");
	var error = document.getElementById("add-form").getElementsByClassName("invalid"); 

	var valid = 1;
	//name validation
	if(/^[a-zA-Z\s]+$/.test(x[0].value)==false){
		error[0].innerHTML="Please enter a valid name"; 
		valid = 0;
	}else{
		error[0].innerHTML=""; 
	}

	//email validation
	const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if(re.test(x[1].value)==false){
		error[1].innerHTML="Please enter a valid e-mail id";
		valid = 0;
	}else{
		error[1].innerHTML="";
	}

	//number validation
	if(isNaN(x[2].value)==true||x[2].value==0){
		error[2].innerHTML="Please enter a valid mobile no.";
		valid=0;
	}
	else{
		error[2].innerHTML="";
	}
	
	//state validation
	if(y[0].value==""){
		error[3].innerHTML="Please enter a state";
		valid = 0;
	}
	else{
		error[3].innerHTML="";
	}

	//city validation
	if(y[1].value==""){
		error[4].innerHTML="Please enter a city";
		valid = 0;
	}
	else{
		error[4].innerHTML="";
	}

	
	if(z[0].value.trim()==""){
		error[5].innerHTML="Please enter your address";
		valid = 0;
	}
	else{
		error[5].innerHTML="";
	}



	if(valid==1){
		document.getElementById("add-form").submit();
	}
		

}
function uvalidate(){
	console.log("rce");
	var x = document.getElementById("u-form").getElementsByTagName("input"); 
	var y = document.getElementById("u-form").getElementsByTagName("select"); 
	var z = document.getElementById("u-form").getElementsByTagName("textarea");
	var error = document.getElementById("u-form").getElementsByClassName("invalid"); 

	var valid = 1;
	//name validation
	if(/^[a-zA-Z\s]+$/.test(x[0].value)==false){
		error[0].innerHTML="Please enter a valid name"; 
		valid = 0;
	}else{
		error[0].innerHTML=""; 
	}

	const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if(re.test(x[1].value)==false){
		error[1].innerHTML="Please enter a valid e-mail id";
		valid = 0;
	}else{
		error[1].innerHTML="";
	}

	if(isNaN(x[2].value)==true||x[2].value==0){
		error[2].innerHTML="Please enter a valid mobile no.";
		valid=0;
	}
	else{
		error[2].innerHTML="";
	}
	console.log("y0"+y[0].value);

	if(y[0].value==""){
		error[3].innerHTML="Please enter a state";
		valid = 0;
	}
	else{
		error[3].innerHTML="";
	}
	if(y[1].value==""){
		error[4].innerHTML="Please enter a city";
		valid = 0;
	}
	else{
		error[4].innerHTML="";
	}

	if(z[0].value.trim()==""){
		error[5].innerHTML="Please enter your address";
		valid = 0;
	}
	else{
		error[5].innerHTML="";
	}



	if(valid==1){
		document.getElementById("u-form").submit();
	}
		

}

