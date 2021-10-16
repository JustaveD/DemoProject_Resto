// Toggle bars in header responsive
let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

menu.onclick = ()=>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navbar a');
window.onscroll = ()=>{
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
  
// Impaction of the current section with nav link
  sections.forEach(section=>{

    let scrollValue = window.scrollY;
    let distanceFromTopToThisSection = section.offsetTop -150;
    let heightOfSection = section.offsetHeight;

    let id=section.getAttribute("id");
    
    if(scrollValue >= distanceFromTopToThisSection && scrollValue < distanceFromTopToThisSection + heightOfSection){
      navLinks.forEach(links=>{
        links.classList.remove('active');
      })
      document.querySelector(`header .navbar a[href='#${id}']`).classList.add('active');
    }
  })
}



// Slide use SWIPER for home
var swiper = new Swiper(".home-silder", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop: true,
});
// Slide use SWIPER for REVIEW
var swiper = new Swiper(".review-slider", {
  
  spaceBetween: 20,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  loop:true,
});

// Loader fade out
const fadeOutLoader = ()=>{
  document.querySelector('.loader-container').classList.add('fade-out');
}
const finishLoader = () =>{
  setTimeout(fadeOutLoader,3000);
}
window.onload = finishLoader;