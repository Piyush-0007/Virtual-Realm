async function getProductDetails(){
    const response = await fetch('./product.php');
    const productList = await response.json();
    let html = `
        <div class="row border-bottom">
            <div class="col-1 font-weight-bold">ID</div>
            <div class="col-4 font-weight-bold">NAME</div>
            <div class="col-4 font-weight-bold">Company</div>
            <div class="col-2 font-weight-bold">Price (Rs.)</div>
            <div class="col-1 font-weight-bold">Remove</div>                      
        </div>
    `;
    for(let x of productList){
        html += `
        <div class="row border-bottom js-product">
            <div class="col-1 mt-2 js-product-id">${x.id}</div>
            <div class="col-4 mt-2 js-product-name">${x.name}</div>
            <div class="col-4 mt-2">${x.company}</div>
            <div class="col-2 mt-2">${isFree(x.price)}</div>
            <div class="col-1 mt-2 remove text-center" data-id=${x.id}><i class="fa-solid fa-trash"></i></div>
        </div>
        `;
    }
    document.querySelector('.js-product-details').innerHTML = html;
    document.querySelectorAll('.remove').forEach(element => {
        element.addEventListener('click',()=>{
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result) => {
                if (result.isConfirmed) {
                    // deleteElement(element.dataset.id);
                    if(deleteElement(element.dataset.id)){

                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success",
                            timer:1000
                        });
                    }else{
                        Swal.fire({
                            title: "Request Rejected!",
                            text: "Your request has been rejected by server.",
                            icon: "error",
                            // timer:1000
                        });
                    }
                    setTimeout(
                        ()=>{getProductDetails();},
                        1000
                    )
                }
              });
        });                  
    });
}
document.addEventListener('DOMContentLoaded', getProductDetails);
function isFree(val) {
    if(val == 0){
        return 'Free';
    }else{
        return (val/100).toFixed(2);
    }
}
async function deleteElement(id) {
    const response = await fetch('./productRemove.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(id ),
    });
    const ok = await response.json();
    console.log(id);
    console.log(ok);
   if(ok){
    return true;
   }else{
    return false;
   }
}
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
