<form class="form-horizontal" action="index.php?p=closeIssue&id=<?php echo $id; ?>" method="post">
    <label>URL to the solution</label>
    <input name="url" class="form-control" type="text" required />

    <label>Edit description</label>
    <textarea name="description" class="form-control" rows="3"><?php echo $row["description"]; ?></textarea>

    <button class="btn btn-success" type="submit">Close it</button>
    <button class="btn" type="reset" value="Reset">Reset all</button>
</form>