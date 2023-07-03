google.charts.load('current', { 'packages': ['bar'] });
google.charts.setOnLoadCallback(drawStuff);
// var casosPenales = 11;
// var casosCiviles = 11;

function drawStuff() {
    let input = document.getElementById("campo").value;
    let input2 = document.getElementById("campo2").value;
    let url = "../../controller/gestionarReporteController.php";
    let formaData = new FormData();
    formaData.append('campo', input);
    formaData.append('campo2', input2);

    fetch(url, {
        method: "POST",
        body: formaData
    }).then(response => response.json())
        .then(data => {
            var casosPenales = data.data3;
            var casosCiviles = data.data4;

            //generar grafico de barras
            var data = new google.visualization.arrayToDataTable([
                ['Move', 'Cantidad'],
                ["Casos Penales", casosPenales],
                ["Casos Civiles", casosCiviles]
            ]);

            var options = {
                width: 800,
                legend: { position: 'none' },
                chart: {
                    title: 'Estadistica',
                    subtitle: 'Cantidad por cada caso'
                },
                axes: {
                    x: {
                        0: { side: 'top', label: 'Casos' } // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" },
                colors: ['#34495E', 'green'],
                vAxis: {
                    textStyle: {
                        color: 'rgb(161, 161, 3)' // Color de los números en el eje vertical (vertical axis)
                    }
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        })
        .catch(error => console.log(error));

};

document.addEventListener('DOMContentLoaded', function () {//espera que toda la estructura del html este bien cargada
    getData();
    document.getElementById("campo").addEventListener("keyup", getData);
    document.getElementById("campo2").addEventListener("keyup", getData);
    function getData() {
        let input = document.getElementById("campo").value;
        let content = document.getElementById("content");
        let input2 = document.getElementById("campo2").value;
        let content2 = document.getElementById("content2");
        let url = "../../controller/gestionarReporteController.php";
        let formaData = new FormData();
        formaData.append('campo', input);
        formaData.append('campo2', input2);

        fetch(url, {
            method: "POST",
            body: formaData
        }).then(response => response.json())
            .then(data => {
                let data1 = data.data1;
                let data2 = data.data2;

                content.innerHTML = data1;
                content2.innerHTML = data2;
            }).catch(error => console.log(error))
    }

});
