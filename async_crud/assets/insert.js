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
