const price = document.getElementById("price");
const amount = document.getElementById("amount");
const percent = document.getElementById("percent");

console.log("cos");

const calculateRomperIndex = () => {
  console.log("sdd");
  document.getElementById("index").innerHTML =
    (amount.value * percent.value) / 100 / price.value;
};

const connected = () => {
  document.getElementById("connect").style.display = "block";
  setTimeout(() => {
    document.getElementById("connect").style.display = "none";
  }, 1000);
};
const dataSent = () => {
  document.getElementById("dataSent").style.display = "block";
  setTimeout(() => {
    document.getElementById("dataSent").style.display = "none";
  }, 1000);
};
const dataError = () => {
  document.getElementById("dataError").style.display = "block";
  setTimeout(() => {
    document.getElementById("dataError").style.display = "none";
  }, 1000);
};
const redirect = (tr) => {
  console.log(tr);
};

function displayComments() {
  let x = document.getElementById("commentContainer");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
