var modal3 = document.getElementById('simpleModal3');
var modalBtn3 = document.getElementById('noshoot');
var closebtn3 = document.getElementsByClassName('closeBtn3')[0];

var modal = document.getElementById('simpleModal');
var modalBtn = document.getElementById('modalBtn');
var closebtn = document.getElementsByClassName('closeBtn')[0];

var modal2 = document.getElementById('simpleModal2');
var modalBtn2 = document.getElementById('modalBtn2');
var closebtn2 = document.getElementsByClassName('closeBtn2')[0];


modalBtn.addEventListener('click', openModal);
closebtn.addEventListener('click', closeModal);
window.addEventListener('click', clickOutside);

modalBtn2.addEventListener('click', openModal2);
closebtn2.addEventListener('click', closeModal2);
window.addEventListener('click', clickOutside2);


function openModal() {
  modal.style.display ='block';
}

function closeModal() {
  modal.style.display ='none';
}
function clickOutside(e) {
  if (e.target == modal)
    modal.style.display ='none';
}

function openModal2() {
  modal2.style.display ='block';
}

function closeModal2() {
  modal2.style.display ='none';
}

function clickOutside2(i) {
  if (i.target == modal2)
    modal2.style.display ='none';
}


modalBtn3.addEventListener('click', openModal3);
closebtn3.addEventListener('click', closeModal3);
window.addEventListener('click', clickOutside3);

function openModal3() {
  modal3.style.display = 'block';
}

function closeModal3() {
  modal3.style.display ='none';
}
function clickOutside3(e) {
  if (e.target == modal3)
    modal3.style.display = 'none';
}
