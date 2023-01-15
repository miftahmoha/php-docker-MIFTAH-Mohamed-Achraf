// selecting the number of items to add to the cart.
const plus = document.querySelector(".plus");
const minus = document.querySelector(".minus");
let input = document.querySelector(".paint-input");
input.value = 1;
// plus
plus.addEventListener("click", function() {
    input.value = parseInt(input.value) + 1;
});

// minus
minus.addEventListener("click", function() {
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
});

// look at the stock.
let lookStock = document.createElement("h3");
let product = document.documentElement.getAttribute("class");
switch(product) {
    case "prdt1":
        lookStock.textContent = "This product is available, 5 remaining.";
        lookStock.classList.add("stockText-v");
        break;
    case "prdt2":
        lookStock.textContent = "This product is not available, 0 remaining.";
        lookStock.classList.add("stockText-r");
        break;
    case "prdt3":
        lookStock.textContent = "This product is available, 10 remaining.";
        lookStock.classList.add("stockText-v");
        break;
    case "prdt4":
        lookStock.textContent = "This product is available, 2 remaining.";
        lookStock.classList.add("stockText-v");
        break;
    case "prdt5":
        lookStock.textContent = "This product is not available, 0 remaining.";
        lookStock.classList.add("stockText-r");
        break;
    case "prdt6":
        lookStock.textContent = "This product is available, 2 remaining.";
        lookStock.classList.add("stockText-v");
        break;
    case "prdt7":
        lookStock.textContent = "This product is not available, 0 remaining.";
        lookStock.classList.add("stockText-r");
        break;
    case "prdt8":
        lookStock.textContent = "This product is not available, 0 remaining.";
        lookStock.classList.add("stockText-r");
        break;   
};

let buttonStock = document.querySelector(".stock");
let section = document.querySelector(".info")
buttonStock.addEventListener("click", function() {
    section.appendChild(lookStock);
});