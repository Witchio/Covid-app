
let select = document.querySelector('#select');
select.addEventListener('change', function () {
    const country = this.value;
    document.querySelector('#luxemburg').style.display = "none";
    chartCountry(country);
})

let xlabels4 = [];

async function chartCountry(request) {
    xlabels4.length = 0;
    await getData1(request);
    let dates = [];
    let newCases = [];
    xlabels4.forEach(data => {
        dates.push(data[0]);
    });
    xlabels4.forEach(data => {
        newCases.push(data[1]);
    });
    var ctx1 = document.getElementById('country');
    Chart.defaults.global.responsive = 'true';

    var myChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                data: newCases,
                label: 'Total requests ' + request,
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

async function getData1(request) {
    let url = 'https://api.covid19api.com/total/dayone/country/' + request + '/status/confirmed';
    const response1 = await fetch(url);
    const data2 = await response1.json();

    data2.forEach(data => {
        const now = data['Date'];
        date = now.split('T');
        const cases = data['Cases'];
        xlabels4.push([date[0], cases]);

    });
}