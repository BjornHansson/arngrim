<?php
    require "config.php";
    $db = new DatabaseHandler();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <title>Title</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <ul class="nav nav-pills pull-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <h3 class="text-muted">Project name</h3>
        </div>

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

        <div class="footer">
            <p><a href="#header">Back to top</a></p>
        </div>
    </div> <!-- /container -->
</body>
</html>