<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>India 2024 T20 World Cup Winning XI</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f4f8;
            font-family: 'Poppins', sans-serif;
        }

        #main {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 550px;
            text-align: center;
            color: #333;
            border: 1px solid #e0e0e0;
        }

        h1 {
            font-weight: 700;
            font-family: 'Verdana', sans-serif;
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fafafa;
            border-radius: 10px;
            overflow: hidden;
            color: #333;
        }

        th {
            background-color: #3498db;
            color: white;
            padding: 15px;
            font-size: 18px;
            text-align: center;
        }

        td {
            padding: 12px;
            font-size: 16px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6f7ff;
            cursor: pointer;
            font-weight: bold;
        }

        button {
            margin-top: 30px;
            padding: 12px 24px;
            border: none;
            background: #3498db;
            color: white;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        button:hover {
            background: #2980b9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div id="main">
        <h1>India 2024 T20 World Cup Winning XI</h1>

        <table>
            <tr>
                <th>#</th>
                <th>Player Name</th>
            </tr>
            <?php
            // India 2024 T20 WC Winning XI (Example Players)
            $players = array(
                "Rohit Sharma (C)", "Shubman Gill", "Virat Kohli", "Suryakumar Yadav",
                "Rishabh Pant (WK)", "Hardik Pandya", "Ravindra Jadeja", "Axar Patel",
                "Jasprit Bumrah", "Mohammed Siraj", "Yuzvendra Chahal"
            );

            // Display players in a table
            $index = 1;
            foreach ($players as $player) {
                echo "<tr>
                        <td>$index</td>
                        <td>$player</td>
                      </tr>";
                $index++;
            }
            ?>
        </table>

        <button onclick="alert('2024 T20 WC Winning XI Loaded Successfully!')">Click Me</button>
    </div>

</body>
</html>