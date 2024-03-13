const price = document.getElementById("price");
const amount = document.getElementById("amount");
const percent = document.getElementById("percent");

console.log("cos");

const calculateRomperIndex = () => {
  document.getElementById("index").innerHTML =
    (amount.value * percent.value) / 100 / price.value;
};
