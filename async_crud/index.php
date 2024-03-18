<?php include './includes/header.php' ?>

<div class="container form-container mt-5">

    <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
        <p><strong>Success!</strong> data saved into the database</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="spinner-border spinner d-none" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
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
                <option value="">Select</option>
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


<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="readData">

        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ARE YOU SURE YOU WANT TO DELETE THIS DATA?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger modalDltBtn" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    let insertForm = document.querySelector('#insertForm');

    insertForm.addEventListener('submit', async function(e) {
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
            update.innerText = "update";

            let dlt = document.createElement('button');
            dlt.classList.add('btn');
            dlt.classList.add('btn-danger');
            dlt.classList.add('dlt-data');
            dlt.innerText = "delete";
            dlt.setAttribute('data-bs-toggle', 'modal');
            dlt.setAttribute('data-bs-target', '#deleteModal');
            btnTd.append(update, dlt);

            tr.append(btnTd);

            document.querySelector('#readData').append(tr);

            deleteModal();
        }
    }

    window.addEventListener('load', async function() {
        showData()
    });


    function deleteModal() {
        let dltData = document.querySelectorAll('.dlt-data');

        for (let dltBtn of dltData) {
            dltBtn.addEventListener('click', function() {
                let id = this.parentElement.parentElement.children[0].innerText;

                let dltModalBtn = document.querySelector('.modalDltBtn').id = id;

                document.querySelector('.modalDltBtn').addEventListener('click', async function() {
                    let res = await fetch('./api/delete.php', {
                        method: 'POST',
                        body: id
                    });

                    res = await res.json();

                    if (res.status == 200) {
                        showData();
                    }
                });
            });
        }
    }
</script>

<?php include './includes/footer.php' ?>