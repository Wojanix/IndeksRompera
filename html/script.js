const price = document.getElementById("price");
const amount = document.getElementById("amount");
const percent = document.getElementById("percent");

const calculateRomperIndex = () => {
  document.getElementById("index").innerHTML = price.value / (amount * percent);
};
