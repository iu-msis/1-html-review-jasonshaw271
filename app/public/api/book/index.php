<?php

// if (($_SERVER['REQUEST_METHOD'] ?? '') != 'POST') {
//     header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed");
//     exit;
// }

try {
    $_POST = json_decode(
                file_get_contents('php://input'), 
                true,
                2,
                JSON_THROW_ON_ERROR
            );
} catch (Exception $e) {
    header($_SERVER["SERVER_PROTOCOL"] . " 400 Bad Request");
    // print_r($_POST);
    // echo file_get_contents('php://input');
    exit;
}

require("class/DbConnection.php");

// Step 0: Validate the incoming data
// This code doesn't do that, but should ...
// For example, if the date is empty or bad, this insert fails.

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
    INSERT INTO students (id, title, author, publicationYear, totalPages, msrp) VALUES 
    (1, 'Harry Potter and the Philosophers Stone', 'J. K. Rowling', 1992, 596, 14.00),
    (2, 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 1993, 696, 15.00),
    (3, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 1994, 896, 24.00),
    (4, 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', 1995, 1296, 34.00),
    (5, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 1996, 1246, 15.00),
    (6, 'Harry Potter and the Half Blood Prince', 'J. K. Rowling', 1997, 1222, 12.00);
);

$stmt->execute([
  $_POST['id'],
  $_POST['title'],
  $_POST['author'],
  $_POST['publicationYear'],
  $_POST['totalPages']
  $_POST['msrp']
]);

// Get auto-generated PK from DB
// https://www.php.net/manual/en/pdo.lastinsertid.php
// $pk = $db->lastInsertId();  

// Step 4: Output
// Here, instead of giving output, I'm redirecting to the SELECT API,
// just in case the data changed by entering it
header('HTTP/1.1 303 See Other');
header('Location: ../offer/?student=' . $_POST['studentId']);