<?php
class PageController extends DatabaseHandler
{
    private $errorIdMessage = "ID is not numeric";

    public function closeIssue($id)
    {
        if(!is_numeric($id))
            throw new RuntimeException($this->errorIdMessage);

        $url = $this->sanitize($_GET["url"]);

        $query = "UPDATE issues SET open = 0, url = '$url' WHERE id = $id LIMIT 1";
        $result = $this->query($query);

        $this->redirect("index.php");
    }

    public function createIssue()
    {
        if(!empty($_POST))
        {
            $date = date("Y-m-d");
            $formData = array();
            $formData[] = $date;
            foreach($_POST as $key => $value)
            {
                $formData[] = $this->sanitize($value);
            }
            $formData[] = "1";
            $sqlValues = implode("', '", $formData);

            $query = "INSERT INTO issues (date, title, description, writer, category, open) VALUES ('{$sqlValues}');";
            $result = $this->query($query);
        }

        $this->redirect("index.php");
    }

    public function deleteIssue($id)
    {
        if(!is_numeric($id))
            throw new RuntimeException($this->errorIdMessage);

        $query = "DELETE FROM issues WHERE id = $id LIMIT 1";
        $result = $this->query($query);

        $this->redirect("index.php");
    }

    public function reopenIssue($id)
    {
        if(!is_numeric($id))
            throw new RuntimeException($this->errorIdMessage);

        $query = "UPDATE issues SET open = 1 WHERE id = $id LIMIT 1";
        $result = $this->query($query);

        $this->redirect("index.php");
    }

    public function redirect($page)
    {
        header("Location: " . $page);
        exit;
    }
}