const xlabels3 = [];
chartIt();

async function chartIt() {
    await getData();
    xlabels3.forEach(data => {
        const clone = document.getElementById('row').cloneNode(true);

    })
}

async function getData() {
    const response3 = await fetch('https://api.covid19api.com/summary');
    const data3 = await response3.json();
    const worlds = data3['Countries'];

    worlds.forEach(data => {
        const country = data['Country'];
        const newCases = data['NewConfirmed'];
        const totalCases = data['TotalConfirmed'];
        const newDeaths = data['NewDeaths'];
        const totalDeaths = data['TotalDeaths'];
        const newRecovered = data['NewRecovered'];
        const totalRecovered = data['TotalRecovered'];
        xlabels3.push([country, newCases, totalCases, newDeaths, totalDeaths, newRecovered, totalRecovered]);
    })
}