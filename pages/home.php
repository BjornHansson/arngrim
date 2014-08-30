<div class="row">
    <div class="col-lg-12">
        <h3>All open</h3>
        <table class="table table-striped table-bordered">
            <?php
                $tableHeader = "
                <tr>
                    <th>ID</th>
                    <th>Reported</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Writer</th>
                    <th>Action</th>
                </tr>
                ";
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
                    $html .= "<td><a href=\"pages/closeIssue.php?id=" . $row["id"] . "\" class=\"btn btn-info\">Close</a> ";
                    $html .= "<a href=\"pages/deleteIssue.php?id=" . $row["id"] . "\" class=\"btn btn-danger\">Delete</a></td>";
                    $html .= "</tr>";
                }
                echo $tableHeader;
                echo $html;
            ?>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3>Closed <small>20 latest</small></h3>
        <table class="table table-striped table-bordered">
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
                    $html .= "<td><a href=\"pages/reopenIssue.php?id=" . $row["id"] . "\" class=\"btn btn-info\">Reopen</a> ";
                    $html .= "<a href=\"pages/deleteIssue.php?id=" . $row["id"] . "\" class=\"btn btn-danger\">Delete</a></td>";
                    $html .= "</tr>";
                }
                echo $tableHeader;
                echo $html;
            ?>
        </table>
    </div>
</div>