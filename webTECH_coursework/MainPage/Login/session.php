<?php
session_start();
if (isset($_SESSION['loggedin']))
    header("Location: submit.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Log-in page</title>
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

    input[type="text"],
    input[type="password"] {
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
<div id="entry_form">

    <body>
        <p>Please Log In to add publications<br></p>
        <form action="login.php" method="POST">
            Login name: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit">
        </form>
    </body>
</div>


</html>