const xlabels1 = [];
chartIt();
async function chartIt() {
    await getData1();
    let dates = [];
    let newCases = [];
    xlabels1.forEach(data => {
        dates.push(data[0]);
    });
    xlabels1.forEach(data => {
        newCases.push(data[1]);
    });
    var ctx1 = document.getElementById('chart').getContext('2d');
    var myChart1 = new Chart(ctx1, {
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
            },
            plugins: {
                datalabels: {
                    display: false
                }
            }

        }
    })

}

async function getData1() {
    const response1 = await fetch('https://api.covid19api.com/total/dayone/country/luxembourg/status/confirmed');
    const data1 = await response1.json();

    data1.forEach(data => {
        const now = data['Date'];
        date = now.split('T');
        const cases = data['Cases'];
        xlabels1.push([date[0], cases]);

    });
}