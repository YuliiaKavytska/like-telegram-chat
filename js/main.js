// Переменные для открытия модальных окон
let showContacts = document.querySelector("#open-contacts");
let contactsModal = document.querySelector("#contacts-modal");
let closeContactsBtn = document.querySelector("#contacts-modal .close");
// ===============================================
let showSetings = document.querySelector("#open-setings");
let setingsModal = document.querySelector("#setings-modal");
let closeSetingssBtn = document.querySelector("#setings-modal .close");
// ===============================================

let baground = document.querySelector(".baground");

// ===============================================
var messages = document.getElementById("messages");
messages.scrollTop = messages.scrollHeight;
// ===============================================
showContacts.onclick = function(){
	contactsModal.style.display = "block";
	baground.style.display = "block";
}
closeContactsBtn.onclick = function(){
	baground.style.display = "none";
	contactsModal.style.display = "none";
}

// ===============================================
showSetings.onclick = function(){
	setingsModal.style.display = "block";
	baground.style.display = "block";
}
closeSetingssBtn.onclick = function(){
	baground.style.display = "none";
	setingsModal.style.display = "none";
}
// ===============================================

baground.onclick = function(){
	setingsModal.style.display = "none";
	contactsModal.style.display = "none";
	if(document.location.href != "index.php"){
		document.location.href = "index.php";
	}
	baground.style.display = "none";
}
