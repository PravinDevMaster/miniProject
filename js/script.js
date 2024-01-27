var bar = document.querySelector(".navbar .navbar-brand.bar");
var sideBar = document.querySelector(".sideBar");

bar.addEventListener('click', () => {
  sideBar.classList.toggle("open");
  sideBar.classList.remove("close");
});

var closeBtn = document.querySelector(".closeBtn");
closeBtn.addEventListener('click', () => {
  sideBar.classList.add("close");
})

var classesMenu = document.querySelector(".sideBar #classesMenu");
var subMenu = document.querySelector(".subMenu");

classesMenu.addEventListener('click', () => {
  subMenu.classList.toggle("active");

});