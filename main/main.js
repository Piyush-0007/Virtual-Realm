import { toRupee, addToCart } from "../cart.js";
const id = new URLSearchParams(window.location.search).get('id');
async function display() {
    const response = await fetch(`./getProduct.php`,{
        "method" : "POST",
        "headers" : {
          "Content-Type" : "application/json"
        },
        "body" : JSON.stringify(id)
      });
    const productList = await response.json();
    if(productList != null){
       document.querySelector('.carousel-inner').innerHTML = `
        <div class="carousel-item active">
            <video src="../data/${productList.label}_trailer.webm" autoplay loop muted class="d-block w-100" alt="..." poster="../data/${productList.label}_poster.jpg">
        </div>
        <div class="carousel-item">
            <img src="../data/${productList.label}_1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../data/${productList.label}_3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../data/${productList.label}_4.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../data/${productList.label}_2.jpg" class="d-block w-100" alt="...">
        </div>
      `;
      document.querySelector('.js-product-name').innerText = productList.name;
      document.querySelector('.product-deatil').innerHTML = `
        <div class="poster-img">
            <img src="../data/${productList.label}_poster.jpg" alt="">
        </div>
        <div class="container">

            <div class="product-contant --bs-body-color">
                Set in the underworld of Fortune Valley, you and your crew were divided by betrayal and reunited by revenge to take down The House, a nefarious cartel that rules the city's casinos, criminals and cops. In this corrupt gambler's paradise, the stakes are high and The House always wins.
            </div>
            <div class="price font-weight-bold">
                Rs. ${toRupee(productList.price)}/-
                <span class='added js-added-${productList.id} hide' > <i class="ri-add-circle-line"></i> Item Added </span> 

            </div>
            <button class="btn btn-primary js-add-to-cart" data-id='${id}'>Add to Cart</button>
            <a href="../php/payment.php?id=${id}" class="btn btn-outline-primary js-add-to-cart" data-id='${id}'>Buy Now</a>
        </div>
      `;
      document.querySelector('.js-add-to-cart').addEventListener('click', function(){
        const obj = document.querySelector(`.js-added-${this.dataset.id}`);
        addToCart(this.dataset.id, "../php/Updatecart.php");
        obj.classList.remove('hide');
        setTimeout(
          ()=>{
            obj.classList.add('hide');
          },1500
        )
      });
    }
}
document.addEventListener('DOMContentLoaded', display);