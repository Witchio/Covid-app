getCountries();
async function getCountries() {
    const response = await fetch('https://api.covid19api.com/countries');
    const dataCountries = await response.json();


    dataCountries.forEach(data => {
        const select = document.getElementById('select');
        const selectClone = select.cloneNode(true);

        let option = selectClone.querySelector('.option');
        option.innerHTML = data["Country"];
        option.value = data["Slug"]

        select.append(option);

    });
    document.querySelector("#select .option").remove();

}
