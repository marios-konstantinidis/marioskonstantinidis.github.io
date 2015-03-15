

var days = <?php echo $remainingDay; ?>  
  var hours = <?php echo $remainingHour; ?>  
  var minutes = <?php echo $remainingMinutes; ?>  
  var seconds = <?php echo $remainingSeconds; ?>  

function setCountDown ()
{
  seconds--;
  if (seconds < 0){
      minutes--;
      seconds = 59
  }
  if (minutes < 0){
      hours--;
      minutes = 59
  }
  if (hours < 0){
      days--;
      hours = 23
  }
  document.getElementById("remain").innerHTML = days+" days, "+hours+" hours, "+minutes+" minutes, "+seconds+" seconds";
  setTimeout ( "setCountDown()", 1000 );
}


	function refresh() {
		var location = window.location;
		var location_array = (location.toString()).split(".php");
		var refresh_location = location_array[0] + ".php";
		window.location = refresh_location;
	}

	function hoverOver(id) {
		eval("document." + id + ".src = '../images/" + id + "_h.png'");
	}

	function hoverOut(id) {
		eval("document." + id + ".src = '../images/" + id + ".png'");
	}
	
	function checkLogin() {
		var password = document.getElementById('loginPassword');
		var username = document.getElementById('loginUsername');
		var errorID = 'errorLogin';
		
		if ((username.value == '') || (password.value == '')) {
			errorForm(errorID,'-  The form has not been completed. ' );
			return false;
		}
	}
	
	function checkCheckout() {
		var date = document.getElementById('deldate').value;
		var accountNum = document.getElementById('accountNum').value;
		var sortCode = document.getElementById('sortCode').value;
		var creditMethod = document.getElementById('creditMethod');
		var errorCheckout = "errorCheckout";
		
		if (date == '') {
			errorForm(errorCheckout,'-  The form is incomplete. ' );
			return false;
		} else if (date.length != 8) {
			errorForm(errorCheckout,'-  The supplied date is invalid. ' );
			return false;
		}
		if (!(creditMethod.checked)) {
			if ((accountNum == '') || (sortCode == '')) {
				errorForm(errorCheckout,'-  The form is incomplete. ' );
				return false;
			} else if (!(IsNumeric(accountNum))) {
				errorForm(errorCheckout,'-  The supplied account number is invalid. ' );
				return false;	
			}	
		}
	}
	
	function checkSignup() {
		var password = document.getElementById('signuppassword').value;
		var rpassword = document.getElementById('signuprpassword').value;
		var dusername = document.getElementById('signupdusername').value;
		var email = document.getElementById('signupemail').value;
		var forename = document.getElementById('signupfor').value;
		var surname = document.getElementById('signupsur').value;
		var tel = document.getElementById('signuptel').value;
		var postcode = document.getElementById('signuppost').value;
		var city = document.getElementById('signupcity').value;
		var addline1 = document.getElementById('signupadd1').value;
		var addline2 = document.getElementById('signupadd2').value;
		var errorID = 'errorSignup';
	
		if ((password == '') || (rpassword == '') || (dusername == '') || (email == '') || (forename == '') || (surname == '') || (tel == '') || (postcode == '') || (city == '') || (addline1 == '')|| (addline2 == '')) {
			errorForm(errorID,'-  The form has not been completed. ' );
			return false;
		} else if (dusername.length < 5) {
			errorForm(errorID,'-  The username supplied is not valid. ' );
			return false;			
		} else if (password != rpassword) {
			errorForm(errorID,'-  The passwords supplied do not match. ' );
			return false;
		} else if (password.length < 5) {
			errorForm(errorID,'-  The password supplied is invalid. ' );
			return false;
		} else if (!(email.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,2}))$)\b/gi))) {
			errorForm(errorID,'-  The email supplied is invalid. ' );
			return false;
		} else if (tel.length < 7) {
			errorForm(errorID,'-  The supplied telephone is invalid. ' );
			return false;
		} else if (tel.length > 13) {
			errorForm(errorID,'-  The supplied telephone is invalid. ' );
			return false;
		} else if (!(IsNumeric(tel))) {
			errorForm(errorID,'-  The supplied telephone is invalid. ' );
			return false;
		} else if (postcode.length > 7) {
			errorForm(errorID,'-  The postcode supplied is invalid. ' );
			return false;
		}
	}
	
	function checkCustomerForm() {
		var addline1 = document.getElementById('custaddline1').value;
		var addline2 = document.getElementById('custaddline2').value;
		var city = document.getElementById('custcity').value;
		var postcode = document.getElementById('custpostcode').value;
		var tel = document.getElementById('custtel').value;
		var errorID = 'errorCustomer';
				
		if ((addline1 == '') || (addline2 == '') || (city == '') || (postcode == '') || (tel == '')) {
			errorForm(errorID,'- The form has not been completed. ' );
			return false;
		} else if (!(IsNumeric(tel))) {
			errorForm(errorID,'-  The supplied telephone is invalid. ' );
			return false;
		}  else if (postcode.length > 7) {
			errorForm(errorID,'-  The supplied postcode is invalid. ' );
			return false;
		} else if (tel.length < 7) {
			errorForm(errorID,'-  The supplied telephone is invalid. ' );
			return false;
		} else if (tel.length > 13) {
			errorForm(errorID,'-  The supplied telephone is invalid. ' );
			return false;
		}
	}
	
	function IsNumeric(sText) {
	   var ValidChars = "0123456789";
	   var IsNumber=true;
	   var Char;

	   for (i = 0; i < sText.length && IsNumber == true; i++) 
		  { 
		  Char = sText.charAt(i); 
		  if (ValidChars.indexOf(Char) == -1) 
			 {
			 IsNumber = false;
			 }
		  }
	   return IsNumber;
	}
	
	function errorForm(id, message) {
		var returnVar = document.getElementById(id);
		returnVar.style.display = 'block';
		returnVar.innerHTML = message;
	}
	
	function checkAccountForm() {
		var cpass = document.getElementById('cpass').value;
		var npass = document.getElementById('npass').value;
		var rpass = document.getElementById('rpass').value;
		var errorID = 'errorAccount';
		
		if ((cpass == '') || (npass == '') || (rpass == '')) {
			errorForm(errorID,'- The form has not been completed. ' );
			return false;
		} else if (npass != rpass) {
			errorForm(errorID,'-  The new password supplied is invalid. ' );
			return false;			
		} else if (npass.length < 5) {
			errorForm(errorID,'-  The new password supplied is invalid. ' );
			return false;			
		}
	}
	
	function checkCreditForm() {
		var credit = document.getElementById('creditFormCredit').value;
		var accountnum = document.getElementById('accountNum').value;
		var sortcode = document.getElementById('sortCode').value;
		var errorID = 'errorCreditForm';
		
		if ((credit == '') || (accountnum == '') || (sortcode == '')) {
			errorForm(errorID,'- The form has not been completed. ' );
			return false;
		} else if (!(IsNumeric(credit))) {
			errorForm(errorID,'-  The supplied credit is invalid. ');
			return false;			
		} else if (credit < 5) {
			errorForm(errorID,'-  The minimum credit amount is £5. ');
			return false;			
		} else if (!(IsNumeric(accountnum))) {
			errorForm(errorID,'-  The supplied account number is invalid. ');
			return false;			
		} 
	}
	
	function deskon(id) {
		var strgID = "productDesk" + id;
		var returnVar = document.getElementById(strgID);
		
		returnVar.style.display = "table-row";
		strgID = "productDeskBool" + id;
		var returnVal = document.getElementById(strgID);
		eval("returnVal.innerHTML = \"<a href='javascript:deskoff(" + id + ")'>-</a>\"");
	}
	
	function deskoff(id) {
		var strgID = "productDesk" + id;
		var returnVar = document.getElementById(strgID);
		
		returnVar.style.display = "none";
		strgID = "productDeskBool" + id;
		var returnVal = document.getElementById(strgID);
		eval("returnVal.innerHTML = \"<a href='javascript:deskon(" + id + ")'>+</a>\"");
	}
	
	function showlayer(layer){
	var myLayer = document.getElementById(layer);
	if(myLayer.style.display=="none" || myLayer.style.display==""){
	myLayer.style.display="block";
	} else {
	myLayer.style.display="none";
	}
	}
