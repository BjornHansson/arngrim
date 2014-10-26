<?php
    require_once "config.php";
    $pageController = new PageController();

    if(isset($_GET["p"]))
    {
        $page = $_GET["p"];

        switch($page)
        {
            case "writeIssue":
                $pageController->htmlPage->printWriteIssuePage();
                break;
            case "statistics":
                $pageController->htmlPage->printStatisticsPage();
                break;
            case "close":
                $id = $_GET["id"];
                $pageController->htmlPage->printCloseIssuePage($id);
                break;
            case "closeIssue":
                $id = $_GET["id"];
                $pageController->closeIssue($id);
                break;
            case "deleteIssue":
                $id = $_GET["id"];
                $pageController->deleteIssue($id);
                break;
            case "reopenIssue":
                $id = $_GET["id"];
                $pageController->reopenIssue($id);
                break;
            case "createIssue":
                $pageController->createIssue();
                break;
            default:
                $pageController->htmlPage->printHomePage();
                break;
        }
    }
    else
    {
        $pageController->htmlPage->printHomePage();
    }