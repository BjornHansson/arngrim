<?php
class HtmlPage
{
    private function getHead($activeLink)
    {
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="src/img/favicon.png">
            <title>' . TITLE . '</title>
            <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="src/css/style.css" rel="stylesheet">
        </head>

        <body>
            <div class="container" id="toTheTop">
                <div class="header" id="header">
                <ul class="nav nav-pills pull-right">
                    <li'; if($activeLink == "home") $html .= ' class="active"'; $html .= '><a href="index.php">Home</a></li>
                    <li'; if($activeLink == "writeIssue") $html .= ' class="active"'; $html .= '><a href="index.php?p=writeIssue">Write issue</a></li>
                    <li'; if($activeLink == "statistics") $html .= ' class="active"'; $html .= '><a href="index.php?p=statistics">Statistics</a></li>
                </ul>
                <h3 class="text-muted">' . TITLE . '</h3>
            </div>
        ';
        return $html;
    }

    private function getFooter()
    {
        $html = '
                <div class="footer">
                <p><a href="#toTheTop">Back to top</a></p>
                </div>
            </div> <!-- /container -->
        </body>
        </html>
        ';
        return $html;
    }

    public function printHomePage()
    {
        $db = new DatabaseHandler();
        $open = "";
        $result = $db->query("SELECT * FROM issues WHERE open = 1 ORDER BY id DESC");
        while($row = mysqli_fetch_array($result))
        {
            $open .= "<tr>";
            $open .= "<td>" . $row["id"] . "</td>";
            $open .= "<td>" . $row["date"] . "</td>";
            $open .= "<td>" . $row["title"] . "</td>";
            $open .= "<td>" . $row["description"] . "</td>";
            $open .= "<td>" . $row["category"] . "</td>";
            $open .= "<td>" . $row["writer"] . "</td>";
            $open .= "<td>" . $row["url"] . "</td>";
            $open .= "<td><a href=\"index.php?p=close&id=" . $row["id"] . "\" class=\"btn btn-info closeIssue\">Close</a> ";
            $open .= "<a href=\"index.php?p=deleteIssue&id=" . $row["id"] . "\" class=\"btn btn-danger\">Delete</a></td>";
            $open .= "</tr>";
        }

        $closed = "";
        $result = $db->query("SELECT * FROM issues WHERE open = 0 ORDER BY id DESC LIMIT 20");
        while($row = mysqli_fetch_array($result))
        {
            $closed .= "<tr>";
            $closed .= "<td>" . $row["id"] . "</td>";
            $closed .= "<td>" . $row["date"] . "</td>";
            $closed .= "<td>" . $row["title"] . "</td>";
            $closed .= "<td>" . $row["description"] . "</td>";
            $closed .= "<td>" . $row["category"] . "</td>";
            $closed .= "<td>" . $row["writer"] . "</td>";
            $closed .= "<td>" . $row["url"] . "</td>";
            $closed .= "<td><a href=\"index.php?p=reopenIssue&id=" . $row["id"] . "\" class=\"btn btn-info\">Reopen</a> ";
            $closed .= "<a href=\"index.php?p=deleteIssue&id=" . $row["id"] . "\" class=\"btn btn-danger\">Delete</a></td>";
            $closed .= "</tr>";
        }

        echo $this->getHead("home");
        require_once "src/pages/home.php";
        echo $this->getFooter();
    }

    public function printWriteIssuePage()
    {
        echo $this->getHead("writeIssue");
        require_once "src/pages/writeIssue.php";
        echo $this->getFooter();
    }

    public function printStatisticsPage()
    {
        $db = new DatabaseHandler();
        // First chart
        $thisMonth = date("F");
        $startDate = date("Y-m-01");
        $endDate = date("Y-m-t");
        $result = $db->query("SELECT open FROM issues WHERE (open = 1) AND (date BETWEEN '{$startDate}' AND '{$endDate}');");
        $openIssues = $result->num_rows;
        $result = $db->query("SELECT open FROM issues WHERE open = 0 AND (date BETWEEN '{$startDate}' AND '{$endDate}');");
        $closedIssues = $result->num_rows;

        // Second chart
        $result = $db->query("SELECT id FROM issues WHERE category = 'Bug';");
        $totalBugs = $result->num_rows;
        $result = $db->query("SELECT id FROM issues WHERE category = 'Improvment';");
        $totalImprovments = $result->num_rows;
        $result = $db->query("SELECT id FROM issues WHERE category = 'Missing functionality';");
        $totalMissingFunctionalities = $result->num_rows;

        echo $this->getHead("statistics");
        require_once "src/pages/statistics.php";
        echo $this->getFooter();
    }

    public function printCloseIssuePage($id)
    {
        $db = new DatabaseHandler();
        $result = $db->query("SELECT * FROM issues WHERE id = {$id} LIMIT 1;");
        $row = mysqli_fetch_array($result);

        echo $this->getHead("");
        require_once "src/pages/closeIssue.php";
        echo $this->getFooter();
    }
}