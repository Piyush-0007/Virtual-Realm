var cart = JSON.parse(localStorage.getItem('cart'));
if(cart == null){
    cart = [];
}
displayCart(cart);
fetch('./getCart.php')
.then((response)=>{
    console.log(response);
    if(response.ok){
        return response.json();
    }else{
        return null;
    }
}).then((data)=>{
    console.log(data);
    if(data != null){
        cart = data;
        localStorage.setItem('cart', JSON.stringify(cart));
        console.log(cart);
    }else if(localStorage.getItem('cart')){
        cart = JSON.parse(localStorage.getItem('cart'));
    }else{
        cart = [];
    }
    displayCart(cart);
});
export function addToCart(id, address) {
    if(!cart.includes(`${id}`)){
        console.log(cart);
        cart.push(`${id}`);
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCart(address, cart);
    }
}
async function displayCart(cart) {
    console.log(Array.isArray(cart));
    let html = ``;
    let total = 0;
    cartCount();
    if(cart.length > 0){

        const response = await fetch("./php/feting_product.php");
        const products = await response.json();
        for (const id of cart) {
            let  product = products.find((p) => p.id === id);
            if (product) {
                
                total += parseInt(product.price);            
                html+= `
                    <div class="item js-product">
                        <img src="./data/${product.label}_poster.jpg" alt="">
                        <div class="details">
                            <div class="item-detail">
                                <h4 id='product-label' >${product.name}</h4>
                                <p>Price: Rs. ${toRupee(product.price)} /-</p>
                                <span class="platforms"> ${getPlatform(product)} </span>
                            </div>
                            <div class="remove" data-id=${id}>
                                <i class="ri-delete-bin-line"></i>
                                
                            </div>
                        </div>
                    </div>
                `;
            }
        }
    }else{
        html = `
        <div class="item">
            <img src="./images/empty_cart.svg" alt="">
            <div class="details">
                <div class="item-detail mt-2" >
                    <h2>Your TVR cart is empty</h2>
                    <a href = './index.php' class="mt-2 shop-link"> Shop Now </a>
                </div>
            </div>
        </div>
        `;
    }
    document.querySelector('.order-summary').innerHTML = html;
    document.querySelector('.js-cart-total').innerText = toRupee(total);
    let tax = total*0.18;
    document.querySelector('.js-cart-tax').innerText = toRupee(tax);
    document.querySelector('.js-cart-grand-total').innerText = toRupee(tax + total);

    document.querySelectorAll('.remove').forEach(element => {
        element.addEventListener('click',()=>{
            const idx = cart.indexOf(element.dataset.id);
            if(idx != -1){
                cart.splice(idx,1);
                console.log(cart);
                localStorage.setItem('cart',JSON.stringify(cart));
            }
            console.dir(document.querySelectorAll('.js-cart-count'));
            cartCount();
            updateCart('./php/Updatecart.php');
            displayCart(cart);
        })
    });

}
function getPlatform(product) {
    let platform = '';
    if(product.window == 1){
        platform+= '<i class="ri-windows-fill"></i>';                                    
    }if(product.mac == 1){
        platform += `<i class="ri-finder-fill"></i>`;
    }if(product.linux == 1){
        platform += `<i class="ri-ubuntu-fill"></i>`;
    }
    return platform;
}
function cartCount() {
    document.querySelectorAll('.js-cart-count').forEach(
        ele =>{
            ele.innerText = cart.length;
        }
    )
}
export function toRupee(val) {
    val = (val/100).toFixed(2);
    return val;
}
async function updateCart(address, cart){
    const response = await fetch(address, {
        "method" : "POST",
        "headers":{
            "Content-Type": "application/json"
        },
        "body": JSON.stringify(cart)
    });
    const txt = await response.json();
    console.log(txt);
}
const logout = document.querySelector('.js-logout');
console.log(logout);
if(logout != null){
    logout.addEventListener('click', ()=>{
        localStorage.clear();
        fetch("./login/logout.php");
        window.location.href = "./index.php";
    });
}
document.querySelector('.js-search').addEventListener('keyup',function(e){
    const val = this.value.toUpperCase();
    document.querySelectorAll('.js-product').forEach((item)=>{
        let name = item.querySelector('#product-label').textContent.toUpperCase();
        if(name.indexOf(val) > -1){
            item.style.display = "";
        }else{
            item.style.display = "none";

        }
    })
});