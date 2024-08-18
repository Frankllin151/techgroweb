const btnMobile = document.getElementById("btn-mobile-menu");
const navMobile = document.querySelector(".navagation-mobile");
btnMobile.addEventListener("click", () =>{
 navMobile.classList.toggle("active-menu-mobile");
})