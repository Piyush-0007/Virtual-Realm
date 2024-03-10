import { addToCart, toRupee } from "./cart.js";
async function productData() {
  const response = await fetch("./php/feting_product.php");
  const products = await response.json();
  let html = "";
  let search = "";
  for (let x = 0; x < products.length; x++) {
    const i = products[x];
    html += `
      <div class="card col-sm-12 col-md-6 col-lg-3 m-3 pt-3">
        <a href="./main/main.php?id=${i.id}" class="fix" data-id="${i.id}">
          <img src='./data/${i.label}_poster.jpg' class="card-img-top" alt="...">
          <div class="card-body d-flex justify-content-between flex-column">
            <div class="mb-3">
              <h5 class="card-title">${i.name}</h5>
              <h6 class="card-title"> - ${i.company}</h6>
              <p class="card-text">${i.detail}</p>
            </div>
            <div>
              <p>Rs.${toRupee(i.price)}/-  
                <span class='added js-added-${i.id} hide' > <i class="ri-add-circle-line"></i> Item Added </span> 
              </p>
              <a href="./main/main.php?id=${i.id}" class="btn btn-outline-primary">Buy Now</a>
              <button class="btn btn-primary js-add-to-cart" data-id='${i.id}'>Add to Cart</button>
            </div>
          </div>
        </a>
      </div>
      `;
    search += `
        <li class='js-product'>
          <a class="dropdown-item rounded-2 " href="./main/main.php?id=${i.id}">
            <img src="./data/${i.label}_poster.jpg" class="search-img me-1">
            <span class="js-product-name">${i.name}</span>
          </a>
        </li>
      `;
  }
  document.querySelector(".products").innerHTML = html;
  document.querySelector(".js-search-item").innerHTML = search;
  document.querySelectorAll(".js-add-to-cart").forEach((ele) => {
    const dis = document.querySelector(`.js-added-${ele.dataset.id}`);
    ele.addEventListener("click", () => {
      addToCart(ele.dataset.id, "./php/Updatecart.php");
      dis.classList.remove("hide");
      setTimeout(() => {
        dis.classList.add("hide");
      }, 1500);
    });
  });
}
document.addEventListener("DOMContentLoaded", productData);
// ===================== scroll up animation =================================
const sr = ScrollReveal({
  origin: "bottom",
  distance: "40px",
  opacity: 1,
  scale: 1,
  duration: 2500,
  delay: 300,
});
// console.log(sr);
sr.reveal(".js-pricing");
// ============================ search bar fecility ================================
function search(e) {
  const searchItem = document.querySelector(".js-search").value.toUpperCase();
  const productList = document.querySelectorAll(".js-product");
  for (let x of productList) {
    // console.log(x);
    const name = x.querySelector(".js-product-name").textContent.toUpperCase();
    if (name.indexOf(searchItem) > -1) {
      x.style.display = "";
    } else {
      x.style.display = "none";
    }
  }
}
document.querySelector(".js-search").addEventListener("focus", () => {
  document.querySelector(".dropdown-search").classList.remove("d-none");
});
document.querySelector(".js-search").addEventListener("blur", () => {
  setTimeout(() => {
    document.querySelector(".dropdown-search").classList.add("d-none");
  }, 200);
});
window.addEventListener("scroll", () => {
  const up = document.querySelector(".scroll-up");
  if (window.scrollY > 250) {
    up.style.transform = "translateY(0%)";
  } else {
    up.style.transform = "translateY(1000%)";
  }
});
document.querySelector(".js-search").addEventListener("keyup", search);
