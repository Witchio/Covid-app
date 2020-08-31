//Function to make numbers more readable by spacing them each 3 digits
//* https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number/toLocaleString
function eArabic(x) {
    return x.toLocaleString('de-DE');
}

//* Event listener for select changes
let select = document.querySelector('#select');
select.addEventListener('change', function () {
    const country = this.value;
    document.querySelector('#luxemburg').style.display = "none";
    document.querySelector('#luxDeaths').style.display = "none";
    chartCountry(country);
    chartDeaths(country);
})