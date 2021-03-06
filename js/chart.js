function prova(xValues, yValues) {
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
            legend: { display: false },
            scales: {
                yAxes: [{scaleLabel: {
                    display: true,
                    labelString: 'zucche vendute',
                    fontStyle: 'bold',
                    fontSize:16
                  },
                  ticks: { min: 0, max: 14 } }],
                xAxes: [{scaleLabel: {
                    display: true,
                    labelString: 'giorno',
                    fontStyle: 'bold',
                    fontSize:16
                  }}]
        }
    }
    });
}

function getUserGraph(xValues, yValues) {
    var barColors = ["red", "green","blue","orange","brown"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: barColors,
                borderColor: "rgba(0,0,255,0.1)",
                data: yValues
            }]
        },
        options: {
            legend: { display: false },
            scales: {
                yAxes: [{scaleLabel: {
                    display: true,
                    labelString: 'zucche acquistate',
                    fontStyle: 'bold',
                    fontSize:16
                  },
                  ticks: { min: 0, max: 50 } }],
                xAxes: [{scaleLabel: {
                    display: true,
                    labelString: 'azienda agricola',
                    fontStyle: 'bold',
                    fontSize:16
                  }}]
            }
        }
    });
}


function deliveryAnimation(stop) {
    if(stop != 10){
    const arrivo = parseInt(window.innerWidth * stop / 100);
    const start = parseInt(window.innerWidth * 9 / 100);
    let id = null;
    const elem = document.getElementById("animate");
    let pos = start;
    clearInterval(id);
    id = setInterval(frame, 1);

    function frame() {
        if (pos == arrivo - 3 * start) {
            clearInterval(id);
        } else {
            pos++;
            elem.style.left = pos + "px";
        }
    }
}

}