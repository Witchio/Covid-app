const xlabels = [];
chartIt();
async function chartIt() {
    await getData();
    let continent = [];
    let cases = [];

    xlabels.forEach(data => {
        continent.push(data[0]);
    });
    xlabels.forEach(data => {
        cases.push(data[1]);
    });

    var ctx = document.getElementById('continent').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: continent,
            datasets: [{
                data: cases,
                label: 'Total Cases Luxemburg',
                //Css
                backgroundColor: [
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
            }]
        },
        options: {

            responsive: true,
            legend: {
                position: 'bottom'
            },

            plugins: {
                datalabels: {
                    color: '#fff',

                    font: {
                        weight: 'bold',
                        size: 30
                    },
                    formatter: (value) => {
                        if (value > 3000000) {
                            //https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/NumberFormat

                            return new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(value);
                        }
                        else {
                            return '';
                        }
                    },
                },
            }

        }
    });



}


async function getData() {
    const response = await fetch('https://corona.lmao.ninja/v2/continents?yesterday=true&sort');
    const data = await response.json();

    data.forEach(continent => {
        const myContinent = continent['continent'];
        const myCase = continent['cases'];

        xlabels.push([myContinent, myCase]);
    });
}