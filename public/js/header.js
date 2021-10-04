// "use strict";
// document.addEventListener("DOMContentLoaded", () => {
//   const header = document.querySelector(".header");
//   const kreativ = document.querySelector(".kreativ");
//   let scrollPrev = 0;

//   window.addEventListener("scroll", function () {
//     let scrollTop = window.scrollY;
//     let kreativCentr = kreativ.offsetHeight / 3;
//     if (scrollTop >= kreativCentr) {
//       header.classList.add("fixed");
//     } else {
//       header.classList.remove("fixed");
//     }
//   });
// });
"use strict";
document.addEventListener("DOMContentLoaded", () => {
  const header_burger = document.querySelector(".header_burger");
  const header_menu = document.querySelector(".header_menu");
  const links = document.querySelectorAll(".links");

  header_burger.addEventListener("click", () => {
    const _link = document.querySelector("._link");

    header_burger.classList.toggle("active");
    header_menu.classList.toggle("active");
    document.body.classList.toggle("log");
    for (let i = 0; i < links.length; i++) {
      links[i].classList.toggle("links-active");
    }
    _link.style.fontSize = "46px";
  });
});
