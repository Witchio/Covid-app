<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        main {
            width: 800px;
            height: 800px;
        }
    </style>
</head>

<body>

</body>
<main>
    <canvas id="chart" width="20" height="20"></canvas>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    //This table will catch the data of the API call
    const xlabels = [];
    chartIt();
    async function chartIt() {
        await getData();
        let dates = [];
        let newCases = [];
        xlabels.forEach(data => {
            dates.push(data[0]);
        });
        xlabels.forEach(data => {
            newCases.push(data[1]);
        });
        var ctx = document.getElementById('chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    data: newCases,
                    label: 'Total Cases Luxemburg',
                    //Css
                    //Fill the graph or not
                    fill: false,
                    //Color of the line
                    borderColor: 'rgba(255, 99, 132, 0.7)',
                    //Border of the line
                    borderWidth: 1,
                    //Border of the data point
                    pointRadius: 0.5,
                }]
            },
            options: {

                label: {
                    fontColor: 'green',
                }

            }
        })

    }


    //Function to get the data of the API call
    async function getData() {
        //Fetch the API Call
        const response1 = await fetch('https://api.covid19api.com/total/dayone/country/luxembourg/status/confirmed');
        const data1 = await response1.json();

        //Break down the big array and push each element into a premade array used for the chart
        data1.forEach(data => {
            const now = data['Date'];
            date = now.split('T');
            const cases = data['Cases'];
            xlabels.push([date[0], cases]);

        });


    }
</script>


</html>