//* Event listener for select changes
let select = document.querySelector('#select');
select.addEventListener('change', function () {
    const country = this.value;
    document.querySelector('#luxemburg').style.display = "none";
    document.querySelector('#luxDeaths').style.display = "none";
    chartCountry(country);
    chartDeaths(country);
})