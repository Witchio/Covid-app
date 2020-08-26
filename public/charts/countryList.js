async function getData() {
    const response1 = await fetch('https://api.covid19api.com/total/dayone/country/luxembourg/status/confirmed');
    const data1 = await response1.json();

    data1.forEach(data => {
        const now = data['Date'];
        date = now.split('T');
        const cases = data['Cases'];
        xlabels1.push([date[0], cases]);

    });
}