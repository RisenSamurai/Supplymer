let burgerButton = document.querySelector(".burger-menu-container");
let burgerMenu = document.querySelector('.main-page-nav-list');
let signInButton = document.querySelector('.sign-in-button');
let loginModal = document.querySelector('.login-modal-window-container');
let signInCross = document.querySelector('.login-modal-cross');
let siteBody = document.querySelector('main');
let cartButton = document.querySelector('.cart-button');
let cartModal = document.querySelector('.cart-modal-window-container');
let cartModalCross = document.querySelector('.cart-modal-cross-top');
let modalCatalog = document.querySelector('.modal-filters-catalog');
let filtersButton = document.querySelector(".filters-button");
let filtersCross= document.querySelector('.catalog-modal-cross-top');





// opens burger menu
burgerButton.onclick = function () {
  burgerMenu.classList.toggle('opened');
  burgerButton.classList.toggle('change');
}

//--------------------------------------------------


// opens sign in modal form and closes burger menu
signInButton.onclick = function () {
  loginModal.classList.toggle('opened');
  burgerMenu.classList.remove('opened');
  burgerButton.classList.toggle('change');
}
//--------------------------------------------------

// closes sign in modal window
signInCross.onclick = function () {
  loginModal.classList.remove('opened');
}

//--------------------------------------------------

// closes sign in modal by click on main section
siteBody.onclick = function () {
  loginModal.classList.remove('opened');
}

//--------------------------------------------------

//opens cart modal form

cartButton.onclick = function () {
  cartModal.classList.toggle('opened');
}

//--------------------------------------------------

//closes cart modal window

cartModalCross.onclick = function () {
  cartModal.classList.remove('opened');
  modalCatalog.classList.remove('opened');
}





//--------------------------------------------------

filtersButton.onclick = function () {
  modalCatalog.classList.add('opened');
}

filtersCross.onclick = function () {
  modalCatalog.classList.remove('opened');
}



