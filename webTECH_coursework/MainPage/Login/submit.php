<?php
session_start();
if (!isset($_SESSION['loggedin']))
    header("Location: session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Secret Area</title>
</head>

<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    #entry_form {
        max-width: 100vw;
        max-height: 100vh;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        margin: 10px;
        font-family: 'Segoe UI';
        background-image: linear-gradient(to top, rgb(186, 186, 186) 30%, #dbdbdb 100%);
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    input[type="text"] {
        width: 80%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
    }

    input[type="submit"] {
        background-image: linear-gradient(to right, #00fff2b2 0%, rgba(137, 4, 245, 0.438) 100%);
        color: white;
        cursor: pointer;
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    #nav ul {
        list-style-type: none;
        padding: 0;
        margin: 10px;
        overflow: hidden;
        background-color: #333333;
        background-image: linear-gradient(to right, #00fff2b2 0%, rgba(137, 4, 245, 0.438) 100%);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    #nav li {
        margin: 0;
        float: left;

        a {
            display: block;
            color: white;
            text-align: center;
            padding: 16px 18px;
            text-decoration: none;
        }

        a:hover {
            background-color: #00000070;
            border-radius: 10px;
        }
    }
</style>


<div id="nav">
    <ul>
        <li><a href="../index.html">Main Page</a></li>
        <li><a href="../CV/cv.html"> CV </a></li>
        <li><a href="../Weather/weather.html"> Weather Forecast </a></li>
        <li><a href="session.php">Login</a></li>
        <li><a href="../List_display/list.php" >Publication List</a></li>
        
    </ul>
</div>

<body>
    <div id="entry_form">
        <?php echo "--You are an admin--" ?><br>

        <p> Please enter publication details.</p>

        <form id="entries" method="POST" action="">
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" maxlength="200" placeholder="Enter the publication title"
                pattern="[A-Za-z0-9\s,\.:-]+" title="Only alphanumeric characters" required><br>

            <label for="author">Author</label><br>
            <input type="text" id="author" name="author" maxlength="200" placeholder="Enter the author's name"
                pattern="[A-Za-z\s,\.]+" title="Only letters and spaces" required><br>

            <label for="year">Year</label><br>
            <input type="text" id="year" name="year" pattern="\d{4}" maxlength="4" placeholder="e.g. 2023"
                title="Enter a valid year - format YYYY" required><br>

            <label for="journal">Journal</label><br>
            <input type="text" id="journal" name="journal" maxlength="100" placeholder="Journal name"
                title="No more than 100 characters" required><br>

            <label for="DOI">Digital Object Identifier (DOI)</label><br>
            <input type="text" id="DOI" name="DOI" pattern="10\.\d{4,9}/[-._;()/:a-zA-Z0-9]+"
                placeholder="E.g. 10.3442/ryf321" title="Enter a valid DOI such as 10.1000/xyz123"><br>

            <label for="school">School Name</label><br>
            <input type="text" id="school" name="school" maxlength="50" placeholder="Enter the school/organization name"
                title="No more than 50 characters" required><br>

            <input type="submit" id="entry" value="Submit"><br>
        </form>
    </div>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['year'];
        $journal = $_POST['journal'];
        $DOI = $_POST['DOI'];
        $school = $_POST['school'];

        $file = 'entries.csv';

        
        $handle = fopen($file, 'a');

        if ($handle) {
            // writing data to the csv file
            fputcsv($handle, [$title, $author, $year, $journal, $DOI, $school]);

            fclose($handle);

            echo "<p>Entry successfully saved to CSV file!</p>";
        } else {
            echo "<p>Error: Unable to save the entry.</p>";
        }
    }
    ?>

    <form action="logout.php" method="POST">
        <input type="submit" id="logout" name="logout" value="Log out">
    </form>
    <p>&copy; Publication System Limited</p>
</body>

</html>