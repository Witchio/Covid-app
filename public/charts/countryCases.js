let xlabels4 = [];
let myChart1;
async function chartCountry(request) {

    xlabels4 = [];

    await getData4(request);
    const dates = [];
    const newCases = [];

    xlabels4.forEach(data => {
        dates.push(data[0]);

    });

    xlabels4.forEach(data => {
        newCases.push(data[1]);

    });
    const canvas = document.getElementById('country');
    const ctx1 = canvas.getContext('2d');
    Chart.defaults.global.responsive = 'true';
    //Destroy the previous chart else it will overlap
    if (myChart1) {
        myChart1.destroy();
        document.querySelector('#luxemburg').remove();
    };
    myChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: dates,
            datasets: [{
                data: newCases,
                label: request + ' total Cases',
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
            legend: {
                position: 'top',
                labels: {
                    fontColor: '#fff',
                    fontWeight: 'bold',
                    fontSize: 30
                }
            },

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

async function getData4(request) {

    let url = 'https://api.covid19api.com/total/dayone/country/' + request + '/status/confirmed';
    const response1 = await fetch(url);
    const data4 = await response1.json();

    data4.forEach(data => {
        const now = data['Date'];
        date = now.split('T');
        const cases = data['Cases'];
        xlabels4.push([date[0], cases]);

    });

}