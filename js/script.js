// файл с аякс
/*
1. вывести все контакты в отдельный файл
2. добавить событие на кнопку добавить в друзья
3. отправить запрос на сервер
4. если запрос выполнн успешно, вывести контакты
*/


var friendList = document.querySelector("#friend-list");

function addFriend(element){
	var link = element.dataset.href;
	var ajaxQuery = new XMLHttpRequest(); //создать новый объект для отправки http запроса
		 ajaxQuery.open("GET", link, false); //открываем ссылку передавая метод запроса и саму ссылку
		 ajaxQuery.send(); //отправляем запрос
	friendList.innerHTML = ajaxQuery.response; //меняем контент в блоке френд лист
}

function deleteFriend(friend){
	var deleteQuery = new XMLHttpRequest();
	var deleteLink = friend.dataset.href;
	deleteQuery.open("GET", deleteLink, false);
	deleteQuery.send();
	friendList.innerHTML = deleteQuery.response;
}
// ===============================================

var form = document.querySelector("#send-message");

form.onsubmit = function(event){
	
	var sender = form.querySelector("input[name='user_id']");
	var recipient = form.querySelector("input[name='user_id_2']");
	var textMessage = form.querySelector("textarea");

	var data = "send_message=1" +
				  "&user_id="      + sender.value	 +
				  "&user_id_2="    + recipient.value +
				  "&text-message="		 + textMessage.value;

	var sendQuery = new XMLHttpRequest();
		 sendQuery.open("POST", form.action, false);
		 sendQuery.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		 sendQuery.send(data);
	console.dir(sendQuery);
	var messageStory = document.querySelector("#messages");
	messageStory.innerHTML = sendQuery.response;
	messageStory.scrollTop = messages.scrollHeight;
}