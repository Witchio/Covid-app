getProfileCountries();
async function getProfileCountries() {
    const response = await fetch('https://restcountries.eu/rest/v2/all');
    const dataCountries = await response.json();


    dataCountries.forEach(data => {
        const select = document.getElementById('select');
        const selectClone = select.cloneNode(true);

        let option = selectClone.querySelector('.option');
        option.innerHTML = data["name"];
        option.value = data["name"]

        select.append(option);

    });
    document.querySelector("#select .option").remove();

}

countries = {

}
