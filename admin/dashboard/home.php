<?php

$cus = customer_get_one($_SESSION['login_id']);
extract($cus);
$temp = customer_total();
extract($temp);
$temp = food_total();
extract($temp);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="head">
  <div class="col-div-6">
    <span style="font-size:30px;cursor:pointer; color: white;" class="nav">&#9776; Dashboard</span>
    <span style="font-size:30px;cursor:pointer; color: white;" class="nav2">&#9776; Dashboard</span>
  </div>

  <div class="col-div-6">
    <div class="profile">

      <a href="../account/"><img src="<?= $ROOT_URL . $cus_avatar ?>" class="pro-img" /></a>
      <p><?= $first_name ?> <span><?= $last_name ?></span></p>
    </div>
  </div>
  <div class="clearfix"></div>
</div>

<div class="clearfix"></div>
<br />

<div class="col-div-3">
  <div class="box">
    <p><?= $cus_total ?><br /><span>Customers</span></p>
    <i class="fa fa-users box-icon"></i>
  </div>
</div>
<div class="col-div-3">
  <div class="box">
    <p><?= $food_total ?><br /><span>Foods</span></p>
    <i class="fa fa-cutlery box-icon"></i>
  </div>
</div>
<div class="col-div-3">
  <div class="box">
    <p>99<br /><span>Orders</span></p>
    <i class="fa fa-shopping-bag box-icon"></i>
  </div>
</div>
<div class="col-div-3">
  <div class="box">
    <p>78<br /><span>Comments</span></p>
    <i class="fa fa-commenting-o box-icon"></i>
  </div>
</div>
<div class="clearfix"></div>
<br /><br />
<div class="col-div-8">
  <div class="box-8">
    <div class="content-box">
      <p>New member in this week <span>Sell All</span></p>

      <div class="chart">
        <canvas id="myChart">

        </canvas>
      </div>

      <br />

    </div>
  </div>
</div>

<div class="col-div-4">
  <div class="box-4">
    <div class="content-box">
      <p>Total Sale <span>Sell All</span></p>

      <div class="circle-wrap">
        <div class="circle">
          <div class="mask full">
            <div class="fill"></div>
          </div>
          <div class="mask half">
            <div class="fill"></div>
          </div>
          <div class="inside-circle"> 70% </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<script>
  let fullDateOfWeek = [];

  function nextweek(i) {
    var today = new Date();
    var nextweek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - i).toDateString();
    let res = nextweek.split(" ").slice(1);
    fullDateOfWeek.push(res);
  }
  for (let i = 6; i >= 0; i--) {
    nextweek(i);
  }



  const ctx = document.querySelector("#myChart").getContext("2d");
  let gradient = ctx.createLinearGradient(0,0,0,400);
  gradient.addColorStop(0,"#192a56");
  gradient.addColorStop(1,"#27ae60");
  function uniq(a) {
    return Array.from(new Set(a));
  }
  // get array of current week day
  $('document').ready(function() {
    $.ajax({
      type: 'get',
      dataType: 'json',
      url: '../../ajax/get_data_for_chart.php',
      data: {},
      success: function(result) {

        // dataDate = result.map(e => {
        //   return e.cus_date_resgister;
        // });

        // labels = uniq(dataDate);

        let labels = [];
        let signinInADay = [0,0,0,0,0,0,0];

        fullDateOfWeek.forEach((day, index) => {
          labels.push(day.slice(0,2).join(" "));
          result.forEach(e => {
            if (e.cus_date_resgister.split("-")[2] == day[1]) {
              if (!signinInADay[index]) {
                signinInADay[index] = 1;
              } else {
                signinInADay[index] += 1;
              }
            } 

          })
        })

        const data = {
          labels,
          datasets: [{
            data: signinInADay,
            label: "Quantity of last 7 day",
          }]
        }
      
        const confic = {
          type: "line",
          data: data,
          options: {
            responsive: true,
            fill: true,
            backgroundColor: gradient,
            borderColor: "#000",
          }

        }
        const myChart = new Chart(ctx, confic);

      }
    })
  })
</script>