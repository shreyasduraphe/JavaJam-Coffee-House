/* check for validation for name, email and experience */

function formValidate() {

	/* Variable initialization */
	var name = document.getElementById("myName").value;
	var email = document.getElementById("myEmail").value;
	var experience = document.getElementById("myComments").value;
	var msgError, emailError, experienceError, nameError;
	nameError = "";
	emailError = "";
	experienceError = "";
	msgError = "";
	/* Check if name is empty */
	if (name == "" || name == null) {
		nameError = "- Name cannot be empty!";
		msgError = nameError;
	}//endif

	/* Check if email is empty or invalid */
	if (email == "" || email == null){
		    	if(nameError == ""){
		    		emailError = "- e-mail cannot be empty!";
		    		msgError = emailError;
		    	}else{
		    		emailError = "- e-mail cannot be empty!";
		    		msgError = msgError + "\n" + emailError;
		    	}//endif inner
	}else{
			/* check for email validation with regular expresssion */
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
				var np = "";
		    }else{
		    	if(nameError == "" || nameError == null){
		    		emailError = "- Invalid e-mail!";
		    		msgError = emailError;
		    	}else{
		    		emailError = "- Invalid e-mail!";
		    		msgError = msgError + "\n" + emailError;
		    	}//endif inner
		    }
    }//endif outer

	/* check if experience is empty */
	if (experience == "" || experience == null) {
		if((nameError == "" || nameError == null) && (emailError == "" || emailError == null)){
			experienceError = "- Experience cannot be empty!";
			msgError = experienceError;
		}else{
			experienceError = "- Experience cannot be empty!";
			msgError = msgError + "\n" + experienceError;			
		}//endif inner
	}//endif outer 

	// display errors to the user if any
	if(msgError != ""){
		alert(msgError);
	}else{
		console.log("Before inert Php Call");
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","insertDataJobs.php?nm="+document.getElementById("myName").value + "&em="+document.getElementById("myEmail").value +"&exp="+document.getElementById("myComments").value,false);
		xmlhttp.send(null);
		alert("Your Application is submitted successfully!");
	}
	return false;
	
}//endofemailValidate

function goToCart(name){
	consol.log(name);
	alert(name);

}

function insertOrdersToDb(){
	var name    = document.getElementById("myName").value;
	var email   = document.getElementById("myEmail").value;
	var address = document.getElementById("myAddress").value;
	var city    = document.getElementById("myCity").value;
	var state   = document.getElementById("myState").value;
	var zip     = document.getElementById("myZip").value;
	var credit  = document.getElementById("myCredit").value;
	var month   = document.getElementById("myMonth").value;
	var year    = document.getElementById("myYear").value;
	var nameError, emailError, addressError, cityError,stateError, zipError, creditError, monthError, yearError; 
	nameError = emailError =  addressError = cityError = stateError =  zipError =  creditError = monthError = yearError = false;
	var invalidEmail = false;
	var msgError = "";

	if(name == "" || name == null){
		nameError = true;
		msgError = msgError + '-Name is Empty!\n';
	}

	if(email == "" || email == null){
		emailError = true;
		msgError = msgError + '-Email is Empty!\n';
	}else{
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
				var np = "";
		}else{
		    invalidEmail = true;
		    msgError = msgError + '-Email is invalid!\n';
		}
	}

	if(address == "" || address == null){
		addresError = true;
		msgError = msgError + '-Address is Empty!\n';
	}

	if(city == "" || city == null){
		cityError = true;
		msgError = msgError + '-City is Empty!\n';
	}

	if(state == "" || state == null){
		stateError = true;
		msgError = msgError + '-State is Empty!\n';
	}
	var invalidZip = false;
	if(zip == "" || zip == null){
		zipError = true;
		msgError = msgError + '-Zip is Empty!\n';
	}

	if(credit == "" || credit == null){
		creditError = true;
		msgError = msgError + '-Credit is Empty!\n';
	}

	if(month == "" || month == null){
		monthError = true;
		msgError = msgError + '-Month is Empty!\n';
	}

	if(year == "" || year == null){
		yearError = true;
		msgError = msgError + '-Year is Empty!\n';
	}

	if (nameError == true || emailError == true ||  addressError == true|| cityError == true|| stateError == true||  zipError == true||  creditError == true|| monthError == true || yearError== true){
		alert(msgError);
	}else{
		console.log("Before inert Php Call");
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","insertDataOrders.php?nm="+document.getElementById("myName").value + "&em="+document.getElementById("myEmail").value +"&add="+document.getElementById("myAddress").value + "&city="+document.getElementById("myCity").value + "&state="+document.getElementById("myState").value + "&zip="+document.getElementById("myZip").value +"&cred="+document.getElementById("myCredit").value+"&mon="+document.getElementById("myMonth").value +"&year="+document.getElementById("myYear").value,false);
		xmlhttp.send(null);
		alert("Your Order is placed successfully!");	
	}
	return false;
}
