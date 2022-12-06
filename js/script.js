
//script for error message
setTimeout(() => {
	let box = document.querySelectorAll('.error-msg');
	for(i=0;i<box.length;i++){
	box[i].style.display = "none";
	}
}, 5000);
setTimeout(() => {
	document.querySelector('.success-msg').style.display = "none";
}, 5000);


// js for header
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
	menu.classList.toggle('bx-x');
	navbar.classList.toggle('open');
}
//js for header ends

