addEventListener('submit', invia);

function invia(event){
	
	const password = document.querySelector('.password input').value;
	if((password.length) < 8){
		document.querySelector('.password span').textContent = "Caratteri password insufficienti";
	}
}

const username = document.querySelector('.username input').value;
if((username.length) > 0){
	fetch("http://localhost/hw1/get_username.php?param=" + username).then(onResponseUsername).then(onUsername);
}

function onResponseUsername(response) {
	return response.json();
}


function onUsername(json){
	
	if(json.gia_presente == true){
		document.querySelector('.username span').textContent = "Username già presente";
	}
	
}




