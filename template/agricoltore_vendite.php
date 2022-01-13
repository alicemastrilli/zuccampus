
  <ul class="nav nav-tabs nav-justified">
    <li class="nav-item col-6">
      <a class="nav-link active" href="agricoltore_vendite.php"><h3>Vendite</h3></a>
    </li>
    <li class="nav-item col-6">
      <a <?php isActive("agricoltore_prodotti.php");?> class="nav-link" href="agricoltore_prodotti.php"><h3>Prodotti</h3></a>
    </li>
  </ul>
   <div class="p-3 text-center" > <h4>Guadagno: <span class="text-success">+26,50€</span></h4>  </div> </div>
  <canvas class="align-items-center" id="myChart" style="width:100%;max-width:700px"></canvas>
  <script>
    var xValues = ["gen 20","feb 20",70,80,90,100,110,120,130,140,150];
    var yValues = [7,8,8,9,9,9,10,11,14,14,15];
    
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
    </script>
  <div class="mx-4 p-3"> <h5>Ultime transazioni:</h5></div>
  <ul class="list-group mx-3 mb-3">
    <li class="list-group-item"> <div>Alice Conti <br>2 x zucca piccola<span class="float-end text-success"> <h6>+25,00€</h6></div></div> </li>
    <li class="list-group-item"><div>Elisa Barbeini <br>2 x zucca piccola<span class="float-end text-success"> <h6>+25,00€</h6></div></div></li>

  </ul>

</div>