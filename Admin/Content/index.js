async function getCount() {
  const response = await fetch("dashboard.php");
  const values = await response.json();
  document.querySelector(".js-product-count").innerText =
    values[0].productCount;
  document.querySelector(".js-user-count").innerText = values[1].userCount;
  document.querySelector(".js-active-users").innerText = values[2].activeUsers;
  document.querySelector(".js-pending-users").innerText =
    values[3].pendingUsers;
  const productResponse = await fetch("./getSales.php");
  const sales = await productResponse.json();
  let html = `
        <div class="row border-bottom text-center">
            <div class="col-3 font-weight-bold">ProductID</div>
            <div class="col-3 font-weight-bold">Name</div>
            <div class="col-3 font-weight-bold">Amount</div>
            <div class="col-3 font-weight-bold">Month</div>                  
        </div>
    `;
  for (let x of sales) {
    html += `
        <div class="row border-bottom js-product text-center">
            <div class="col-3 mt-2 js-product-id">${x.productID}</div>
            <div class="col-3 mt-2 js-product-name">${x.name}</div>
            <div class="col-3 mt-2 js-product-amount">${(x.amount / 100).toFixed(2)}</div>
            <div class="col-3 mt-2">${x.months}</div>
        </div>
        `;
  }
  document.querySelector(".js-sales-area").innerHTML = html;
  //   --------------------------------------------------------------------
  sales.sort((a,b)=> b.amount - a.amount);
  console.log(sales);
  let label = [], data = [];
  const item = document.querySelectorAll('.item');
  for(let i = 0; i < 3; i++){
    label.push(sales[i].name);
    data.push((sales[i].amount/100).toFixed(2));
    item[i].innerText = sales[i].name;
  }
  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: "doughnut",
    data: {
    //   labels: ["Direct", "Referral", "Social"],
      labels: label,
      datasets: [
        {
          data: data,
          backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
          hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false,
      },
      cutoutPercentage: 80,
    },
  });
}

document.addEventListener("DOMContentLoaded", getCount);
