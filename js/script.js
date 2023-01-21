
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
setTimeout(() => {
	document.querySelector('.fail-msg').style.display = "none";
}, 5000);


// js for header
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
	menu.classList.toggle('bx-x');
	navbar.classList.toggle('open');
}
//js for header ends



//js for ordernow popup form
function increaseCount(a, b) {
	var input = b.previousElementSibling;
	var value = parseInt(input.value, 10);
	value = isNaN(value) ? 0 : value;
	value++;
	input.value = value;
  }
  
  function decreaseCount(a, b) {
	var input = b.nextElementSibling;
	var value = parseInt(input.value, 10);
	if (value > 1) {
	  value = isNaN(value) ? 0 : value;
	  value--;
	  input.value = value;
	}
  }