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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php?p=writeIssue">Write issue</a></li>
                <li><a href="index.php?p=statistics">Statistics</a></li>
            </ul>
            <h3 class="text-muted">Project name</h3>
        </div>

        <?php
        if(isset($_GET["p"]))
        {
            $page = $_GET["p"];
        }
        else
        {
            $page = "home";
        }

        switch($page)
        {
            case "writeIssue":
                $page = "";
                break;
            case "statistics":
                $page = "";
                break;
            default:
                $page = "pages/home.php";
                break;
        }
        
        require $page;
        ?>

        <div class="footer">
            <p><a href="#header">Back to top</a></p>
        </div>
    </div> <!-- /container -->
</body>
</html>