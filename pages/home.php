<div class="row">
    <div class="col-lg-12">
        <h3>Open</h3>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Writer</th>
                <th>Close</th>
            </tr>
            <?php
                $html = "";
                $query = "SELECT * FROM issues WHERE open = 1";
                $result = $db->query($query);
                while($row = mysqli_fetch_array($result))
                {
                    $html .= "<tr>";
                    $html .= "<td>" . $row["id"] . "</td>";
                    $html .= "<td>" . $row["title"] . "</td>";
                    $html .= "<td>" . $row["description"] . "</td>";
                    $html .= "<td>" . $row["category"] . "</td>";
                    $html .= "<td>" . $row["writer"] . "</td>";
                    $html .= "<td><a href=\"pages/closeIssue.php?id=" . $row["id"] . "\" class=\"btn btn-danger\">Close</a></td>";
                    $html .= "</tr>";
                }
                echo $html;
            ?>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3>Closed</h3>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Writer</th>
            </tr>
            <?php
                $html = "";
                $query = "SELECT * FROM issues WHERE open = 0";
                $result = $db->query($query);
                while($row = mysqli_fetch_array($result))
                {
                    $html .= "<tr>";
                    $html .= "<td>" . $row["id"] . "</td>";
                    $html .= "<td>" . $row["title"] . "</td>";
                    $html .= "<td>" . $row["description"] . "</td>";
                    $html .= "<td>" . $row["category"] . "</td>";
                    $html .= "<td>" . $row["writer"] . "</td>";
                    $html .= "</tr>";
                }
                echo $html;
            ?>
        </table>
    </div>
</div>