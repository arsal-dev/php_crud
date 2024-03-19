async function showData() {
    document.querySelector('#readData').innerHTML = "";
    let res = await fetch('./api/read.php');
    res = await res.json();

    for (let data of res) {
        let tr = document.createElement('tr');
        for (let key in data) {
            let td = document.createElement('td');
            td.innerText = data[key];
            tr.append(td);
        }

        let btnTd = document.createElement('td');
        let update = document.createElement('button');
        update.classList.add('btn');
        update.classList.add('btn-primary');
        update.setAttribute('data-bs-toggle', 'modal');
        update.setAttribute('data-bs-target', '#updateModal');
        update.setAttribute('onclick', 'updateData(this)');
        update.innerText = "update";

        let dlt = document.createElement('button');
        dlt.classList.add('btn');
        dlt.classList.add('btn-danger');
        dlt.classList.add('dlt-data');
        dlt.setAttribute('onclick', 'deleteModal(this)');
        dlt.innerText = "delete";
        dlt.setAttribute('data-bs-toggle', 'modal');
        dlt.setAttribute('data-bs-target', '#deleteModal');
        btnTd.append(update, dlt);

        tr.append(btnTd);

        document.querySelector('#readData').append(tr);

        // deleteModal();
    }
}

window.addEventListener('load', async function () {
    showData()
});