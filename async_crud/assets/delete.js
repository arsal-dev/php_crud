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