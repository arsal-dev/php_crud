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
                <button type="button" class="btn btn-danger modalDltBtn" data-bs-dismiss="modal" onclick="dltData(this)">Delete</button>
            </div>
        </div>
    </div>
</div>


<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update_form">
                    <input type="hidden" id="up_id">
                    <div class="form-group">
                        <label for="up_name">Product Name</label>
                        <input type="text" id="up_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="up_qty">Product Qty</label>
                        <input type="text" id="up_qty" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="up_category">Product Category</label>
                        <input type="text" id="up_category" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="up_price">Product Price</label>
                        <input type="text" id="up_price" class="form-control">
                    </div>

                    <input type="submit" data-bs-dismiss="modal" class="btn btn-primary mt-3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/insert.js"></script>
<script src="./assets/read.js"></script>
<script src="./assets/delete.js"></script>
<script src="./assets/update.js"></script>

<?php include './includes/footer.php' ?>