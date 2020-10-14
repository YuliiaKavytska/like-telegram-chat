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