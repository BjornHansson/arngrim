<?php
$html = <<<EOT
<form class="form-horizontal" action="pages/createIssue.php" method="post">
    <label>Title</label>
    <input name="title" class="form-control" type="text" required />

    <label>Description</label>
    <textarea name="description" class="form-control" rows="3"></textarea>

    <label>Your name</label>
    <input name="writer" class="form-control" type="text" required />

    <label>Category</label>
    <select name="category" class="form-control">
        <option>Bug</option>
        <option>Improvment</option>
        <option>Missing functionality</option>
    </select>

    <button class="btn btn-success" type="submit">Save</button>
    <button class="btn" type="reset" value="Reset">Reset</button>
</form>
EOT;

echo $html;