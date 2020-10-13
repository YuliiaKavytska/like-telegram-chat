let signUpModal = document.querySelector("#sign-up-modal");
let closeSignUpBtn = document.querySelector("#sign-up-modal .close");
let haveAcount = document.querySelector("#go-to-log-in");
let signUpBtn = document.querySelector("#sign-up");
let passwordsMatch = document.querySelector("#passwords-match");
// ===============================================

signUpBtn.onclick = function(){
	let password = document.querySelector("#password-up-1");
	let confirmedPassword = document.querySelector("#password-up-2");
	if((confirmedPassword.value != password.value)){
		signUpBtn.type = "button";
		passwordsMatch.style.display = "block";
	}else{
		passwordsMatch.style.display = "none";
		signUpBtn.type = "submit";
	}
}