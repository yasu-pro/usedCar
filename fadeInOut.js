"use strict";

const imgBoxArray = document.querySelectorAll("div.imgBox > img");
let popUp_img = document.getElementById("popUp_img");
let popUp = document.getElementById("popUp");
const popUp_close = document.getElementById("popUp_close");
const timeout = 1000;

for (let i = 1; i <= imgBoxArray.length; i++) {
  let imgPath = "";
  imgBoxArray[i - 1].addEventListener("click", () => {
    const id = imgBoxArray[i - 1].getAttribute("id");
    console.log(id);
    const idData = document.getElementById(id);
    imgPath = idData.getAttribute("src");
    console.log(imgPath);
    popUp_img.src = imgPath;
  });
  imgBoxArray[i - 1].addEventListener("click", () => {
    popUp.setAttribute("class", "display_block");
    popUp.style.display = "block";
  });
}

popUp_close.addEventListener("click", () => {
  popUp.classList.remove("display_block");
  popUp.setAttribute("class", "display_none");
  setTimeout(() => {
    popUp.style.display = "none";
  }, timeout);
});
