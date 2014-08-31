<?php
    require "config.php";
    $db = new DatabaseHandler();

    if(isset($_GET["p"]))
    {
        $page = $_GET["p"];

        switch($page)
        {
            case "writeIssue":
                $page = "writeIssue";
                break;
            case "statistics":
                $page = "statistics";
                break;
            default:
                $page = "home";
                break;
        }
    }
    else
    {
        $page = "home";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.png">
    <title><?php echo TITLE; ?></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container" id="toTheTop">
        <div class="header" id="header">
            <ul class="nav nav-pills pull-right">
                <li<?php if($page == "home") echo " class=\"active\""; ?>><a href="index.php">Home</a></li>
                <li<?php if($page == "writeIssue") echo " class=\"active\""; ?>><a href="index.php?p=writeIssue">Write issue</a></li>
                <li<?php if($page == "statistics") echo " class=\"active\""; ?>><a href="index.php?p=statistics">Statistics</a></li>
            </ul>
            <h3 class="text-muted"><?php echo TITLE; ?></h3>
        </div>

        <?php
        require "pages/" . $page . ".php";
        ?>

        <div class="footer">
            <p><a href="#toTheTop">Back to top</a></p>
        </div>
    </div> <!-- /container -->
</body>
</html>