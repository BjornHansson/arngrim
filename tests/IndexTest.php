<?php
class IndexTest extends PHPUnit_Extensions_Selenium2TestCase
{
    const BASE_URL = "http://localhost/arngrim/index.php";

    protected function setUp()
    {
        $this->setBrowser("firefox");
        $this->setBrowserUrl(self::BASE_URL);
    }

    public function testThatTitleIsCorrect()
    {
        // Given
        $this->url(self::BASE_URL);
        // When, Then
        $this->assertEquals(TITLE, $this->title());
    }

    // TODO: Test the different URL.
    public function testThatUrlWriteIssueWorks()
    {
        // Given
        $this->url(self::BASE_URL . "?p=writeIssue");
        // When, Then should contain a form that creates issue
        $this->assertContains("action=\"index.php?p=createIssue\"", $this->source());
    }
}