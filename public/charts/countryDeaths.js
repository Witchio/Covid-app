let countryDeaths = [];

async function chartDeaths(request) {
    countryDeaths.length = 0;
    await getData5(request);
    let dates = [];
    let newCases = [];
    countryDeaths.forEach(data => {
        dates.push(data[0]);
    });
    countryDeaths.forEach(data => {
        newCases.push(data[1]);
    });
    var ctx1 = document.getElementById('deaths');
    Chart.defaults.global.responsive = 'true';

    var myChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                data: newCases,
                label: 'Total deaths ' + request,
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
            },

            plugins: {
                datalabels: {

                    formatter: (deaths) => {
                        if (deaths > 3000000) {
                            //https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/NumberFormat

                            return new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(deaths);
                        }
                        else {
                            return '';
                        }
                    },
                },
            }

        }
    })

}

async function getData5(request) {
    let url = 'https://api.covid19api.com/total/dayone/country/' + request + '/status/deaths';
    const response1 = await fetch(url);
    const dataDeaths = await response1.json();

    dataDeaths.forEach(data => {
        const now = data['Date'];
        date = now.split('T');
        const cases = data['Cases'];
        countryDeaths.push([date[0], cases]);

    });
}