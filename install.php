<?php
require "config.php";
$db = new DatabaseHandler();

if(!$db->query("SELECT id FROM issues"))
{
    $query = "
    CREATE TABLE issues (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(255) NOT NULL,
        description text NOT NULL,
        category varchar(255) NOT NULL,
        writer varchar(255) NOT NULL,
        open tinyint(1) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
    ";
    $db->query($query);

    $query = "
    INSERT INTO issues (id, title, description, category, writer, open) VALUES
    (1, 'Title', 'Description', 'Category', 'Writer', 1),
    (2, 'Title', 'Description', 'Category', 'Writer', 0);
    ";
    $db->query($query);

    echo "Installation successful!";
}
else
{
    echo "No installation performed, the table already exist";
}