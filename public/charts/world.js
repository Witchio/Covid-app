const xlabels3 = [];
chartIt();

async function chartIt() {
    await getData();
    xlabels3.sort();
    xlabels3.forEach(data => {
        //! Can't select class, has to be id for some reason
        const row = document.getElementById("row");
        const clone = row.cloneNode(true);

        let country = clone.querySelector('.country');
        country.innerHTML = data[0];

        let newConf = clone.querySelector('.ncw');
        newConf.innerHTML = data[1];

        let totConf = clone.querySelector('.tcw');
        totConf.innerHTML = data[2];

        let newDeath = clone.querySelector('.ndw');
        newDeath.innerHTML = data[2];

        let totDeath = clone.querySelector('.tdw');
        totDeath.innerHTML = data[2];

        let newRec = clone.querySelector('.nrw');
        newRec.innerHTML = data[2];

        let totRec = clone.querySelector('.trw');
        totRec.innerHTML = data[2];

        const mytable = document.querySelector("#world");
        mytable.append(clone);



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

