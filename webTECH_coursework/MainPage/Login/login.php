<?php
session_start();
if (isset($_SESSION['loggedin'])) 
    header("Location: submit.php");

/* Initialize $users array */
$users = array();

/* Run through the CSV and pull in the data: */
if (($handle = fopen("users.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Check if the row has at least two elements
        if (isset($data[0]) && isset($data[1])) {
            $users[$data[0]] = array("password" => $data[1]);
        }
    }
    fclose($handle);
}

/* Get the data entered on the form w/ validation */
$u = isset($_POST['username']) ? $_POST['username'] : null;
$p = isset($_POST['password']) ? $_POST['password'] : null;

if (!empty($u) && !empty($p)) {
    /* Check it against our 'database': */
    if (isset($users[$u]) && $users[$u]['password'] === $p) {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = $u;
        
        header("Location: submit.php");
        exit; 
    } 
    else {
        echo "Invalid username or password.";
    }
} 
else {
    echo "Please enter both username and password.";
}
?>


