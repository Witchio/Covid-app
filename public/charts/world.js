const xlabels3 = [];
chartWorld();

async function chartWorld() {
    await getWorld();
    xlabels3.sort();
    xlabels3.forEach(data => {
        //! Can't select class, has to be id for some reason
        const row = document.getElementById("row");
        const clone = row.cloneNode(true);

        let country = clone.querySelector('.country');
        country.innerHTML = data[0];

        let newConf = clone.querySelector('.ncw');
        newConf.innerHTML = eArabic(data[1]);

        let totConf = clone.querySelector('.tcw');
        totConf.innerHTML = eArabic(data[2]);

        let newDeath = clone.querySelector('.ndw');
        newDeath.innerHTML = eArabic(data[2]);

        let totDeath = clone.querySelector('.tdw');
        totDeath.innerHTML = eArabic(data[2]);

        let newRec = clone.querySelector('.nrw');
        newRec.innerHTML = eArabic(data[2]);

        let totRec = clone.querySelector('.trw');
        totRec.innerHTML = eArabic(data[2]);

        const mytable = document.querySelector("#world");
        mytable.append(clone);
    })
}

async function getWorld() {
    const response3 = await fetch('https://api.covid19api.com/summary');
    const dataWorld = await response3.json();
    const worlds = dataWorld['Countries'];

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

