<?php
require "config.php";
class DatabaseHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testThatDatabaseHandlerWorks()
    {
        // Given
        $db = new DatabaseHandler();

        // When
        $result = $db->query("SELECT * FROM issues");

        // Then
        $this->assertInternalType("int", $result->num_rows);
    }

    public function testThatSanitizeHandlesDangerousCharacters()
    {
        // Given
        $db = new DatabaseHandler();

        // When
        $result = $db->sanitize("<strong>'Hodor'</strong>");

        // Then
        $this->assertEquals("&lt;strong&gt;\'Hodor\'&lt;/strong&gt;", $result);
    }
}