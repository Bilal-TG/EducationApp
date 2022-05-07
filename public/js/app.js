let addBtn = document.querySelector('.add-class-btn');
let popUp = document.querySelector('.popUp-card');
let closeBtn = document.querySelector('.close-btn');

addBtn.addEventListener("click", addPopup);
closeBtn.addEventListener("click", closePopup);

function addPopup() {
    popUp.style.display = 'block';
}

function closePopup(){
    popUp.style.display = 'none';
}

