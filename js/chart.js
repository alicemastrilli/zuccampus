function prova(xValues, yValues){
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
          yAxes: [{ticks: {min: 0, max:20}}],
        }
      }
    });}

    function deliveryAnimation(){

        
          let id = null;
          const elem = document.getElementById("animate");   
          let pos = 50;
          clearInterval(id);
          id = setInterval(frame, 1);
          function frame() {
            if (pos == 350) {
              clearInterval(id);
            } else {
              pos++; 
              elem.style.left = pos + "px"; 
            }
          }

    }