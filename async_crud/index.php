<?php include './includes/header.php' ?>

<div class="container mt-5">
    <form id="insertForm">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="qty">Product Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty">
        </div>
        <div class="form-group">
            <label for="category">Select Category</label>
            <select name="category" class="form-control" id="category">
                <option value="phone">phone</option>
                <option value="laptop">laptop</option>
                <option value="keyboard">keyboard</option>
                <option value="mouse">mouse</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Product Price</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>

        <input type="submit" name="submit" class="btn btn-primary mt-3">
    </form>
</div>

<script>
    let insertForm = document.querySelector('#insertForm');

    insertForm.addEventListener('submit', async function(e) {
        e.preventDefault();


        let obj = {};

        for (let i = 0; i < e.target.length; i++) {
            if (e.target[i].name != 'submit') {
                obj[e.target[i].name] = e.target[i].value;
            }
        }

        let res = await fetch('create.php', {
            method: 'POST',
            body: JSON.stringify(obj)
        });

        res = await res.text();

        res = JSON.parse(res);

        console.log(res);

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
</script>

<?php include './includes/footer.php' ?>