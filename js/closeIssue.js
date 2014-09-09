$(function()
{
    "use strict";

    $(".closeIssue").click(function(event)
    {
        event.preventDefault();
        var result = prompt("Enter URL to the solution of this issue: ");
        window.location.href = event.target.href + "&url=" + result;
    });
});