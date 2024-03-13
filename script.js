const price = document.getElementById("price");
const amount = document.getElementById("amount");
const percent = document.getElementById("percent");

console.log("cos");

const calculateRomperIndex = () => {
  document.getElementById("index").innerHTML =
    (amount.value * percent.value) / 100 / price.value;
};

const connected = () => {
  console.log("f");
  document.getElementById("connect").style.display = "block";
  setTimeout(() => {
    document.getElementById("connect").style.display = "none";
  }, 1000);
  console.log("2");
};
