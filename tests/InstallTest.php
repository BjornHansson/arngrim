<?php
class InstallTest extends PHPUnit_Extensions_Selenium2TestCase
{
    const BASE_URL = "http://localhost/arngrim/install.php";

    protected function setUp()
    {
        $this->setBrowser("firefox");
        $this->setBrowserUrl(self::BASE_URL);
    }

    public function testThatDatabaseTableCanBeInstalled()
    {
        // Given
        $db = new DatabaseHandler();
        $result = $db->query("DROP TABLE issues");
        $this->assertEquals(true, $result);
        // When
        $this->url(self::BASE_URL);
        // Then
        $result = $db->query("SELECT * FROM issues");
        $this->assertEquals("2", $result->num_rows);
    }
}