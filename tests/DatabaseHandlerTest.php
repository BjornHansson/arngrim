<?php
require "../config.php";

class DatabaseHandlerTest extends PHPUnit_Framework_TestCase
{
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