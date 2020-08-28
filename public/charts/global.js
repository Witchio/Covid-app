const globalData = [];
chartGlobal();

async function chartGlobal() {
    await getGlobal();
    data = globalData[0];
    document.getElementById('nc').innerHTML = eArabic(data[0]);
    document.querySelector('#tc').innerHTML = eArabic(data[1]);
    document.querySelector('#nd').innerHTML = eArabic(data[2]);
    document.querySelector('#td').innerHTML = eArabic(data[3]);
    document.querySelector('#nr').innerHTML = eArabic(data[4]);
    document.querySelector('#tr').innerHTML = eArabic(data[5]);


};


async function getGlobal() {
    const response2 = await fetch('https://api.covid19api.com/summary');
    const dataGlobal = await response2.json();
    const globals = dataGlobal['Global'];


    const newCases = globals['NewConfirmed'];
    const totalCases = globals['TotalConfirmed'];
    const newDeaths = globals['NewDeaths'];
    const totalDeaths = globals['TotalDeaths'];
    const newRecovered = globals['NewRecovered'];
    const totalRecovered = globals['TotalRecovered'];
    globalData.push([newCases, totalCases, newDeaths, totalDeaths, newRecovered, totalRecovered]);

}