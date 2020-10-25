"use strict";

const mileage__radios = document.querySelectorAll("div.mileage__radio > input");

for (let i = 1; i <= mileage__radios.length; i++) {
  mileage__radios[i - 1].addEventListener("click", (event) => {
    const mileage__radio__Id = document.getElementById("mileage_" + i);
    submit();
  });
}

function submit() {
  document.mileage.action = "./result.php";
  document.mileage.method = "get";
  document.mileage.submit();
}
