// Скрипты личного кабинета
// Показать/Скрыть форму изменения никаx
function summonChanger(caller, calling) {
	if (!caller.classList.contains("hide")) {
		caller.classList.add("hide");
		calling.classList.remove("hide");
	} else {
		// var elem = caller;
		// var callingInner = setInterval(innerAnimation, 1);
		caller.classList.remove("hide");
		calling.classList.add("hide");
	}
}

// Запись в буфер обмена адреса сервера
function getIP() {
	console.log("Сработало!");
	navigator.clipboard.writeText("123");
}

// Получение $_GET значений
function getGET() {
	let getURL = location.search.substring(1)
	.split("&")
	.reduce(function(result, item) {
		var getVar = item.split("=");

		result[decodeURIComponent(getVar[0])] = getVar == 1 ? null : decodeURIComponent(getVar[1]);
		return result;
	}, {})
	console.log(getURL);
}

document.onload = function () {
	getGET();
}