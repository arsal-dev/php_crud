let insertForm = document.querySelector('#insertForm');

insertForm.addEventListener('submit', async function (e) {
    e.preventDefault();

    document.querySelector('.spinner').classList.remove('d-none');

    let obj = {};

    for (let i = 0; i < e.target.length; i++) {
        if (e.target[i].name != 'submit') {
            obj[e.target[i].name] = e.target[i].value;
        }
    }

    let res = await fetch('api/create.php', {
        method: 'POST',
        body: JSON.stringify(obj)
    });

    res = await res.text();

    res = JSON.parse(res);

    document.querySelector('.spinner').classList.add('d-none');

    for (let i = 0; i < e.target.length; i++) {
        if (e.target[i].name != 'submit') {
            e.target[i].value = '';
        }
    }

    if (res.status == 400) {
        alert(res.result);
    } else {
        document.querySelector('.alert').classList.remove('d-none');
        showData();
    }

    // if (res.status == 200) {
    //     alert(res.result);
    // } else {
    //     console.log(res.result)
    // }

    // second method
    // JSON.parse | to decode json text

    // let keys = [];
    // let values = [];

    // for (let input of e.target) {
    //     keys.push(input.name);
    //     values.push(input.value);
    // }

    // let obj = {};
    // for (let i = 0; i < keys.length; i++) {
    //     obj[keys[i]] = values[i];
    // }
});



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


function deleteModal(dltBtn) {
    let id = dltBtn.parentElement.parentElement.children[0].innerText;
    let dltModalBtn = document.querySelector('.modalDltBtn').id = id;
}

async function dltData(dltBtn) {
    let res = await fetch('./api/delete.php', {
        method: 'POST',
        body: dltBtn.id
    });

    res = await res.json();

    if (res.status == 200) {
        showData();
    }
}

// update