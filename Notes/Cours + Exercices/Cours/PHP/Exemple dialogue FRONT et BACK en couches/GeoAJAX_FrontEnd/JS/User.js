
/* https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/email
* TL;DR :
* Browsers that support the <input type="email"> automatically provide
* validation to ensure that only text that matches the standard format for
* Internet e-mail addresses is entered into the input box. Browsers that
* implement the specification should be using an algorithm equivalent to
* the following regular expression:
*/
function MyUser(){
	const MAIL_REGEX = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	
	const LNAME_MIN_LENGTH = 1;
	const FNAME_MIN_LENGTH = 1;
	const LNAME_MAX_LENGTH = 256;
	const FNAME_MAX_LENGTH = 256;
	
	const PWD_MIN_LENGTH = 8;
	const PWD_MAX_LENGTH = 256;

	this.lName = "TBD";
	this.fName = "TBD";
	this.email = "";
	this.pwd = "";
	
	this.checkLName = function(s) {
		return ((s.length >= LNAME_MIN_LENGTH) && (s.length <= LNAME_MAX_LENGTH));
	}
	
	this.checkFName = function(s) {
		return ((s.length >= FNAME_MIN_LENGTH) && (s.length <= FNAME_MAX_LENGTH));
	}
	
	this.checkPwd = function(s) {
		return ((s.length >= PWD_MIN_LENGTH) && (s.length <= PWD_MAX_LENGTH));
	}
	
	this.checkMail = function(s) {
		return MAIL_REGEX.test(s);
	}
}

