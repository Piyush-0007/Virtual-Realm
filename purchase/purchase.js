
fetch('./getPurchaseCart.php')
.then((response)=>{
    if(response.ok){ return response.json(); }
    else{ return null; }
}).then((data)=>{
    let purchased = [];
    if(data != null){
        console.log(purchased);
        purchased = data;
    }
    displayCart(purchased);
});
async function displayCart(purchased) {
    console.log(purchased);
    let html = ``;
    let total = 0;
    document.querySelector('.js-cart-count').innerText = purchased.length;
    if(purchased.length > 0){
        const response = await fetch("../php/feting_product.php");
        const products = await response.json();
        for (const id of purchased) {
            let  product = products.find((p) => p.id === id);
            if (product) {
                total += parseInt(product.price);            
                html+= `
                    <div class="item js-product">
                        <img src="../data/${product.label}_poster.jpg" alt="">
                        <div class="details">
                            <div class="item-detail">
                                <h4 id='product-label'>${product.name}</h4>
                                <span class="platforms"> ${getPlatform(product)} </span>
                            </div>
                            <div class="remove" data-id=${id}>
                               <button class='btn btn-primary'>Download</button>
                            </div>
                            
                        </div>
                    </div>
                `;
            }
        }
    }else{
        html = `
        <div class="item">
            <img src="../images/empty_cart.svg" alt="">
            <div class="details">
                <div class="item-detail mt-2" >
                    <h2>No Item Purchased</h2>
                    <a href = '../index.php' class="mt-2 shop-link"> Shop Now </a>
                </div>
            </div>
        </div>
        `;
    }
    document.querySelector('.order-summary').innerHTML = html;
}
document.querySelector('.js-search').addEventListener('keyup',function(e){
    const val = this.value.toUpperCase();
    document.querySelectorAll('.js-product').forEach((item)=>{
        let name = item.querySelector('#product-label').textContent.toUpperCase();
        if(name.indexOf(val) > -1){
            item.style.display = "";
        }else{ item.style.display = "none"; }
    })
});
const logout = document.querySelector('.js-logout');
console.log(logout);
if(logout != null){
    logout.addEventListener('click', ()=>{
        localStorage.clear();
        fetch("../login/logout.php");
        window.location.href = "../index.php";
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