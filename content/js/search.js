// Search form apperence animation
let searchIcon = document.querySelector('#search-icon');
let searchForm = document.querySelector('#search-form');
let searchClose = document.querySelector('#close');
searchIcon.onclick = () =>{
  searchForm.classList.add('active');
}
searchClose.onclick = () =>{
  searchForm.classList.remove('active');
}
