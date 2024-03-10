async function getUserDetails(){
    const response = await fetch('./user.php');
    const productList = await response.json();

    let html = `
        <div class="row border-bottom">
            <div class="col-3">ID</div>
            <div class="col-3">NAME</div>
            <div class="col-3">Email</div>
            <div class="col-3">Active-Status</div>
        </div>
    `;
    for(let x of productList){
        html += `
        <div class="row border-bottom js-product">
            <div class="col-3 mt-2 js-product-id">${x.userID}</div>
            <div class="col-3 mt-2 js-product-name">${x.username}</div>
            <div class="col-3 mt-2">${x.email}</div>
            <div class="col-3 mt-2">${x.active_status}</div>
        </div>
        `;
    }
    document.querySelector('.js-product-details').innerHTML = html;

}

document.addEventListener('DOMContentLoaded', getUserDetails);

function search(e) {
    const searchItem = document.querySelector('.js-search').value.toUpperCase();
    const productList = document.querySelectorAll('.js-product');

    for(let x of productList){
        // console.log(x);
        const name = x.querySelector('.js-product-name').textContent.toUpperCase();
        const id = x.querySelector('.js-product-id').textContent;
        if(name.indexOf(searchItem) > -1 ||  id.indexOf(searchItem) > -1){
           x.style.display = "";
       } else {
           x.style.display = "none";
       }
    }
}
document.querySelector('.js-search').addEventListener('keyup',search);