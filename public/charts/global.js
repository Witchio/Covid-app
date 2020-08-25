const xlabels2 = [];
chartIt();

async function chartIt() {
    await getData();
    let stats = [];
    xlabels2.forEach(value => {
        stats.push(value);
    });
    //stats = [12, 33, 45, 77, 89, 55];
    var ctx2 = document.getElementById('global');
    var myChart2 = new Chart(ctx2, {
        type: 'radar',
        data: {
            labels: ['Newly Confirmed Cases', 'Total active Cases', 'New Deaths', 'Total Deaths', 'New Recovered', 'Total recovered'],
            datasets: [{
                data: xlabels2[0],
                label: 'World Data',
                backgroundColor: "rgba(255, 206, 86, 0.5)",
                fill: true,
                borderColor: 'rgba(255, 99, 132, 0.7)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                //Border of the line
                borderWidth: 1,
                //Border of the data point
                pointRadius: 0.5,
                //Css
            }],

            plugins: {
                datalabels: {
                    formatter: (value2) => {
                        if (value > 1000000000) {
                            //https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/NumberFormat

                            return new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(value2);
                        }
                        else {
                            return '';
                        }
                    },
                }
            }

        },


    });



}


async function getData() {
    const response2 = await fetch('https://api.covid19api.com/summary');
    const data2 = await response2.json();
    const globals = data2['Global'];


    const newCases = globals['NewConfirmed'];
    const totalCases = globals['TotalConfirmed'];
    const newDeaths = globals['NewDeaths'];
    const totalDeaths = globals['TotalDeaths'];
    const newRecovered = globals['NewRecovered'];
    const totalRecovered = globals['TotalRecovered'];
    xlabels2.push([newCases, totalCases, newDeaths, totalDeaths, newRecovered, totalRecovered]);

}