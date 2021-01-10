<style>
   .border-n{
   border-radius : 8px;
   box-shadow: 0px 1px 2px 0px rgba(60,64,67,0.3), 0px 1px 3px 1px rgba(60,64,67,0.15);
   }
@media only screen and (max-width: 600px) {
  .box_col {
    width : 50%;
  }
  .text_col1{
      width : 90%;
  }
  .text_col2{
    width : 10%;
  }
  #layoutSidenav_content{
    margin-left: -252px !important;
  }
}
</style>
<div id="layoutSidenav_content">
<main>
   <div class="container py-5">
      <div class="row">
         <div class="col-md-8 py-3 border-n mx-1 my-2 text-white bg-primary">
             <div class="row py-2">
                 <div class="col-md-11 text_col1">
                     <h5>Estimated Tokens</h5>
                 </div>
                 <div class="col-md-1 text_col2">
                 <svg width="1.5em" height="2em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                </svg>
                 </div>
             </div>
            <div class="row py-2">
               <div class="col-md-3 box_col">
                  <p>Today so far</p>
                  <h3>TK <?php echo $statics['today']['count(id)'] ?></h3>
               </div>
               <div class="col-md-3 box_col">
                  <p>Yesterday</p>
                  <h3>TK <?php echo $statics['yesterday']['count(id)']; ?></h3>
               </div>
               <div class="col-md-3 box_col">
                  <p>Last 7 days</p>
                  <h3>TK <?php echo $statics['sdays']['count(id)']; ?></h3>
               </div>
               <div class="col-md-3 box_col">
                  <p>This month</p>
                  <h3>TK <?php echo $statics['month']['count(id)']; ?></h3>
               </div>
            </div>
         </div>
         <div class="col-md-3 py-3 border-n mx-1 my-2 text-white bg-primary">
         <div class="row py-2">
                 <div class="col-md-10 text_col1">
                     <h5>Tokens</h5>
                 </div>
                 <div class="col-md-1 text_col2">
                 <svg width="1.5em" height="2em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                </svg>
                 </div>
             </div>
            <div class="row py-2">
               <div class="col-md-12">
                  <p>Total Tokens</p>
                  <h3>TK <?php echo $statics['total']['count(id)']; ?></h3>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-6 my-2">
            <div class="card">
               <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Per Day Stats</div>
               <div class="card-body">
                  <canvas id="myAreaChart" width="100%" height="40"></canvas>
               </div>
            </div>
         </div>
         <div class="col-md-5 my-2">
            <div class="card">
               <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Month Bar Chart</div>
               <div class="card-body">
                  <canvas id="myBarChart" width="100%" height="40"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
   <div class="container">
      <div class="row">
         <div class="col-md-6 my-2">
            <div class="card">
               <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Top 5 Websites Stats</div>
               <div>
              <canvas id="myPieChart" style="max-width: 500px;"></canvas>
            </div>
            </div>
         </div>
         <div class="col-md-5 my-2">
            <div class="card">
               <div class="card-header py-4"><i class="fas fa-chart-area mr-1"></i>Dead & Active Tokens</div>
               <div>
              <canvas id="pieChart" style="max-width: 500px;"></canvas>
            </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
   <div class="card">
               <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Country Stats</div>
               <div class="card-body">
                  <table id="example" width="100%" cellspacing="0" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Country</th>
                        <th>Total</th>       
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($statics['country'] as $value){?>
                      <tr>
                        <td scope="row"><?php echo $value['country'] ; ?></td>
                        <td><?php echo $value['total'] ; ?></td>
                      </tr>
                    <?php }?>
                    </tbody>
                  </table>
               </div>
            </div>
   </div>
</main>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: 
    [
      <?php foreach($statics['month_data'] as $value){?>
      "<?php echo $value['month']; ?>",
      <?php } ?>
   ],
    datasets: [{
      label: "Tokens",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [
         <?php foreach($statics['month_data'] as $value){?>
         <?php echo $value['total']; ?>,
         <?php } ?>
      ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
      <?php foreach($statics['day_data'] as $value){?>
      "<?php echo $value['month'].' '.$value['day']; ?>",
      <?php } ?> 
      ],
    datasets: [{
      label: "Tokens",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [
         <?php foreach($statics['day_data'] as $value){?>
      <?php echo $value['total']; ?>,
      <?php } ?> 
         ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
      <?php $i=0;foreach($sites as $value){if($i>=4){break;}?>
     "<?php echo $value['host']; ?>",
      <?php $i++; } ?> 
      ],
    datasets: [{
      data: [
        <?php $i=0; foreach($sites as $value){if($i>=4){break;}?>
     <?php echo $value['total']; ?>,
      <?php $i++; } ?> 
      ],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745','#04FF00 ',],
    }],
  },
});

</script>
<script>
var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: [
          <?php foreach($statics['dead'] as $value){?>
          "<?php echo ($value['token_status']=='1')? 'Active' : 'Dead'; ?>",
          <?php } ?> 
        ],
        datasets: [{
          data: [
            <?php foreach($statics['dead'] as $value){?>
         <?php echo $value['total']; ?>,
          <?php } ?> 
          ],
          backgroundColor: ["#46BFBD","#F7464A"],
          hoverBackgroundColor: [ "#5AD3D1","#FF5A5E"]
        }]
      },
      options: {
        responsive: true
      }
    });

</script>
<script>
$(document).ready(function() {
  $('#example').DataTable({
  });
} );
</script>
