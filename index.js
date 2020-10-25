"use strict";

const mileage__radios = document.querySelectorAll("div.mileage__radio > input");

for (let i = 1; i <= mileage__radios.length; i++) {
  mileage__radios[i - 1].addEventListener("click", (event) => {
    const mileage__radio__Id = document.getElementById("mileage_" + i);
    const mileage__radio__value = mileage__radio__Id.Value();
    submit(mileage__radio__value);
  });
}

function submit(getValue) {
  //   document.mileage.action = "./result.php";
  //   document.mileage.method = "GET";

  //   document.mileage.submit();
  const param = "mile=" + getValue;
  const url = "./result.php?" + param;
  const request = createXMLHttpRequest();
  request.open("GET", url, true);
  request.send("");
}
