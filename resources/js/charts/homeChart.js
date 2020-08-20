const xlabels = [];
chartIt();
async function chartIt() {
    await getData();
    console.log(xlabels);
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

async function getData() {
    const response1 = await fetch('https://api.covid19api.com/total/dayone/country/luxembourg/status/confirmed');
    const data1 = await response1.json();

    data1.forEach(data => {
        const now = data['Date'];
        date = now.split('T');
        const cases = data['Cases'];
        xlabels.push([date[0], cases]);

    });
}