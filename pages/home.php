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
                <th>Action</th>
            </tr>
            <?php
                $db = new DatabaseHandler();

                $html = "";
                $query = "SELECT * FROM issues WHERE open = 1 ORDER BY id DESC";
                $result = $db->query($query);
                while($row = mysqli_fetch_array($result))
                {
                    $html .= "<tr>";
                    $html .= "<td>" . $row["id"] . "</td>";
                    $html .= "<td>" . $row["date"] . "</td>";
                    $html .= "<td>" . $row["title"] . "</td>";
                    $html .= "<td>" . $row["description"] . "</td>";
                    $html .= "<td>" . $row["category"] . "</td>";
                    $html .= "<td>" . $row["writer"] . "</td>";
                    $html .= "<td><a href=\"index.php?p=closeIssue&id=" . $row["id"] . "\" class=\"btn btn-info closeIssue\">Close</a> ";
                    $html .= "<a href=\"index.php?p=deleteIssue&id=" . $row["id"] . "\" class=\"btn btn-danger\">Delete</a></td>";
                    $html .= "</tr>";
                }
                echo $html;
            ?>
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
            <?php
                $html = "";
                $query = "SELECT * FROM issues WHERE open = 0 ORDER BY id DESC LIMIT 20";
                $result = $db->query($query);
                while($row = mysqli_fetch_array($result))
                {
                    $html .= "<tr>";
                    $html .= "<td>" . $row["id"] . "</td>";
                    $html .= "<td>" . $row["date"] . "</td>";
                    $html .= "<td>" . $row["title"] . "</td>";
                    $html .= "<td>" . $row["description"] . "</td>";
                    $html .= "<td>" . $row["category"] . "</td>";
                    $html .= "<td>" . $row["writer"] . "</td>";
                    $html .= "<td>" . $row["url"] . "</td>";
                    $html .= "<td><a href=\"index.php?p=reopenIssue&id=" . $row["id"] . "\" class=\"btn btn-info\">Reopen</a> ";
                    $html .= "<a href=\"index.php?p=deleteIssue&id=" . $row["id"] . "\" class=\"btn btn-danger\">Delete</a></td>";
                    $html .= "</tr>";
                }
                echo $html;
            ?>
        </table>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/closeIssue.js"></script>