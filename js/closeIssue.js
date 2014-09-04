"use strict";

var buttons = document.getElementsByClassName("closeIssue");
var length = buttons.length;
for (var i = 0; i < length; i++)
{
    buttons[i].addEventListener("click", function(event)
    {
        event.preventDefault();
        var result = prompt("Enter URL to the solution of this issue: ");
        window.location.href = event.target.href + "&url=" + result;
    }, false);
}