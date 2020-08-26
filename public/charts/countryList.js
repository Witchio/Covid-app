getData();
async function getData() {
    const response = await fetch('https://api.covid19api.com/countries');
    const data1 = await response.json();


    data1.forEach(data => {
        const select = document.getElementById('select');
        const selectClone = select.cloneNode(true);

        let option = selectClone.querySelector('.option');
        option.innerHTML = data["Country"];
        option.value = data["Slug"]

        select.append(option);

    });

}
document.querySelector('#select option[value=france]').selected = true;
console.log(test);