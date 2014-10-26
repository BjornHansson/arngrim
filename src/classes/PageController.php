<?php
class PageController
{
    private $errorIdMessage = "ID is not numeric";
    private $db;
    public $htmlPage;

    public function __construct()
    {
        $this->htmlPage = new HtmlPage();
        $this->db = new DatabaseHandler();
    }

    public function closeIssue($id)
    {
        if(!is_numeric($id))
            throw new RuntimeException($this->errorIdMessage);

        $url = $this->db->sanitize($_POST["url"]);
        $desc = $this->db->sanitize($_POST["description"]);

        $query = "UPDATE issues SET open = 0, url = '$url', description = '$desc' WHERE id = $id LIMIT 1";
        $result = $this->db->query($query);

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
                $formData[] = $this->db->sanitize($value);
            }
            $formData[] = "1";
            $sqlValues = implode("', '", $formData);

            $query = "INSERT INTO issues (date, title, description, writer, category, open) VALUES ('{$sqlValues}');";
            $result = $this->db->query($query);
        }

        $this->redirect("index.php");
    }

    public function deleteIssue($id)
    {
        if(!is_numeric($id))
            throw new RuntimeException($this->errorIdMessage);

        $query = "DELETE FROM issues WHERE id = $id LIMIT 1";
        $result = $this->db->query($query);

        $this->redirect("index.php");
    }

    public function reopenIssue($id)
    {
        if(!is_numeric($id))
            throw new RuntimeException($this->errorIdMessage);

        $query = "UPDATE issues SET open = 1 WHERE id = $id LIMIT 1";
        $result = $this->db->query($query);

        $this->redirect("index.php");
    }

    private function redirect($page)
    {
        header("Location: " . $page);
        exit;
    }
}