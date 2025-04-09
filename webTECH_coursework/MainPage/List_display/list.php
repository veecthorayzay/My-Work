<!DOCTYPE html>
<html>

<head>
    <title>Publication List</title>
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

        /* Nav bar styles */
        #nav ul {
            list-style-type: none;
            padding: 0;
            margin: 10px;
            overflow: hidden;
            background-color: #333333;
            background-image: linear-gradient(to right, #00ccc2b2 0%, rgba(137, 4, 245, 0.25) 100%);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        #nav li {
            margin: 0;
            float: left;
        }

        #nav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 16px 18px;
            text-decoration: none;
        }

        #nav li a:hover {
            background-color: #00000070;
            border-radius: 10px;
        }

        /* Publication styles */
        #pub_list {
            margin: 20px auto;
            width: 90%;
            max-width: 1000px;
            background-image: linear-gradient(to right, rgb(186, 186, 186) 30%, #dbdbdb 100%);
            /*border: 1px solid #ddd;*/
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        #pub_list p {
            margin: 10px 0;
            padding: 10px;
            background-color: #ffffff;
            /*border: 1px solid #eee;*/
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        #pub_list p:nth-child(odd) {
            background-color: rgb(238, 238, 238);
        }

        #pub_list p:hover {
            background-color: rgb(209, 209, 209);
            transition: background-color 0.3s ease-in-out;
        }

        #pub_list li {
            list-style-type: none;
            padding: 0;
            max-width: 60%;
            max-height: 40px;
            overflow: hidden;
            background-image: linear-gradient(to left, rgb(186, 186, 186) 30%, #dbdbdb 100%);
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        #pub_list li a {
            display: block;
            color: white;
            text-align: center;
            margin: 5px;
            padding: 5px;
            text-decoration: none;
        }

        #pub_list li:nth-child(odd) {
            background-image: linear-gradient(to left, rgb(194, 194, 194) 30%, rgb(165, 165, 165) 100%);
        }
    </style>
</head>

<body>
    <div id="nav">
        <ul>
            <li><a href="../index.html">Main Page</a></li>
            <li><a href="../CV/cv.html">CV</a></li>
            <li><a href="../Weather/weather.html">Weather Forecast</a></li>
            <li><a href="../Login/session.php">Login</a></li>
            <li><a href="../List_display/list.php">Publication List</a></li>
        </ul>
    </div>
    <div id="pub_list">
        <?php
        $row = 1;
        if (($handle = fopen("../Login/entries.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p><strong>Publication $row:</strong><br/>";

                echo "<span><em>Title:</em> " . $data[0] . "</span><br/>";
                echo "<span><em>Journal:</em> " . $data[3] . "</span><br/>";
                echo "<span><em>School:</em> " . $data[5] . "</span><br/>";

                // Passes the row number as a query parameter
                echo '<li><a href="display.php?row=' . $row . '">Display Details</a></li>';

                echo "</p>";
                $row++;
            }
            fclose($handle);
        }
        ?>

    </div>
</body>

</html>
