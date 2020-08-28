const luxCases = [];
chartLuxCases();
async function chartLuxCases() {
    await getData1();
    let dates = [];
    let newCases = [];
    luxCases.forEach(data => {
        dates.push(data[0]);
    });
    luxCases.forEach(data => {
        newCases.push(data[1]);
    });
    var ctx1 = document.getElementById('luxemburg');
    Chart.defaults.global.responsive = 'true';
    var myChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: dates,
            datasets: [{
                data: newCases,
                label: 'Total Cases Luxemburg',
                //Css
                //Fill the graph or not
                fill: true,
                //Color of the line
                borderColor: 'rgba(255, 99, 132, 0.7)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                //Border of the line
                borderWidth: 1,
                //Border of the data point
                pointRadius: 0.5,
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    display: false
                }
            },
            legend: {
                position: 'top',
                labels: {
                    fontColor: '#fff',
                    fontWeight: 'bold',
                    fontSize: 30
                }
            },

        }
    })

}

async function getData1() {
    const response1 = await fetch('https://api.covid19api.com/total/dayone/country/luxembourg/status/confirmed');
    const dataLuxCases = await response1.json();

    dataLuxCases.forEach(data => {
        const now = data['Date'];
        date = now.split('T');
        const cases = data['Cases'];
        luxCases.push([date[0], cases]);

    });
}