<div class="row">
    <div class="col-lg-12">
        <h3>All open</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Reported</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Writer</th>
                <th>URL</th>
                <th>Action</th>
            </tr>
            <?php echo $open; ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3>Closed <small>20 latest</small></h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Reported</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Writer</th>
                <th>URL</th>
                <th>Action</th>
            </tr>
            <?php echo $closed; ?>
        </table>
    </div>
</div>