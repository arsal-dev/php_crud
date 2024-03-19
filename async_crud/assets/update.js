async function updateData(updateBtn) {
    let id = updateBtn.parentElement.parentElement.children[0].innerText;

    let res = await fetch('./api/get.php', {
        method: 'POST',
        body: id
    });

    res = await res.json();

    const up_id = document.querySelector('#up_id');
    const up_name = document.querySelector('#up_name');
    const up_qty = document.querySelector('#up_qty');
    const up_category = document.querySelector('#up_category');
    const up_price = document.querySelector('#up_price');

    let updateData = JSON.parse(res.result);

    up_id.value = updateData.id;
    up_name.value = updateData.name;
    up_qty.value = updateData.qty;
    up_category.value = updateData.category;
    up_price.value = updateData.price;
}


let updateForm = document.querySelector('#update_form');
updateForm.addEventListener('submit', async function (e) {
    e.preventDefault();

    const up_id = document.querySelector('#up_id').value;
    const up_name = document.querySelector('#up_name').value;
    const up_qty = document.querySelector('#up_qty').value;
    const up_category = document.querySelector('#up_category').value;
    const up_price = document.querySelector('#up_price').value;

    let obj = {
        up_id,
        up_name,
        up_qty,
        up_category,
        up_price
    }

    let res = await fetch('./api/update.php', {
        method: "POST",
        body: JSON.stringify(obj)
    });

    res = await res.json();

    if (res.status == 200) {
        alert(res.result);
        showData();
    }

});