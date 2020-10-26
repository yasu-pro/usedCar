"use strict";

const mileage__radios = document.querySelectorAll("div.mileage__radio > input");
const years__radios = document.querySelectorAll("div.years__radio > input");

for (let i = 1; i <= mileage__radios.length; i++) {
  mileage__radios[i - 1].addEventListener("click", (event) => {
    document.mileage.action = "./result.php";
    document.mileage.method = "GET";
    document.mileage.submit();
  });
  years__radios[i - 1].addEventListener("click", (event) => {
    document.years.action = "./result.php";
    document.years.method = "GET";
    document.years.submit();
  });
}
