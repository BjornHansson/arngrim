<?php
class PageControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage ID is not numeric
     */
    public function testThatCloseIssueWithNonIntegerThrows ()
    {
        // Given
        $p = new PageController();

        // When, Then
        $p->closeIssue("Hodor");
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage ID is not numeric
     */
    public function testThatDeleteIssueWithNonIntegerThrows ()
    {
        // Given
        $p = new PageController();

        // When, Then
        $p->deleteIssue("Hodor");
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage ID is not numeric
     */
    public function testThatReopenIssueWithNonIntegerThrows ()
    {
        // Given
        $p = new PageController();

        // When, Then
        $p->reopenIssue("Hodor");
    }
}