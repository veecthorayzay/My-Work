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
            margin: 20px 0;
            padding: 10px;
            background-color: #ffffff;
            /*border: 1px solid #eee;*/
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        #pub_list p:hover {
            background-color: rgb(209, 209, 209);
            transition: background-color 0.3s ease-in-out;
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
        // gets the selected row from the querys parameter
        $selectedRow = isset($_GET['row']) ? (int) $_GET['row'] : 0;

        if ($selectedRow > 0 && ($handle = fopen("../Login/entries.csv", "r")) !== FALSE) {
            $row = 1;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row == $selectedRow) {
                    echo "<p><strong>Details of Publication $row:</strong></p>";
                    echo "<p><strong><em>Title:</em></strong> " . $data[0] . "</p>";
                    echo "<p><strong><em>Author(s):</em></strong> " . $data[1] . "</p>";
                    echo "<p><strong><em>Year:</em></strong> " . $data[2] . "</p>";
                    echo "<p><strong><em>Journal:</em></strong> " . $data[3] . "</p>";
                    echo "<p><strong><em>Digital Object Identifier (DOI):</em></strong> " . $data[4] . "</p>";
                    echo "<p><strong><em>School:</em></strong> " . $data[5] . "</p>";
                    break; 
                }
                $row++;
            }
            fclose($handle);
        } else {
            echo "<p>Wrong Selection or No data</p>";
        }
        ?>

    </div>
</body>

</html>