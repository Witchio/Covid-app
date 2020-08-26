const xlabels6 = [];
chartIt();
async function chartIt() {
    await getData6();
    let dates = [];
    let newCases = [];
    xlabels6.forEach(data => {
        dates.push(data[0]);
    });
    xlabels6.forEach(data => {
        newCases.push(data[1]);
    });
    var ctx1 = document.getElementById('luxDeaths');
    Chart.defaults.global.responsive = 'true';
    var myChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                data: newCases,
                label: 'Total Deaths Luxemburg',
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

            label: {
                fontColor: 'green',
            },
            plugins: {
                datalabels: {
                    display: false
                }
            }

        }
    })

}

async function getData6() {
    const response1 = await fetch('https://api.covid19api.com/total/dayone/country/luxembourg/status/deaths');
    const data1 = await response1.json();

    data1.forEach(data => {
        const now = data['Date'];
        date = now.split('T');
        const cases = data['Cases'];
        xlabels6.push([date[0], cases]);

    });
}