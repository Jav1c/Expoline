<?php 
require 'config.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="about.png" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://intramuros.gov.ph/wp-content/uploads/2022/07/0-02-06-6968bc2e52d8bdb29f34018a55e8950ff11d691200d87c3dafc2b49e19dbce57_1c6dac188bb56d.jpg');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .container {
            display: flex;
            flex-direction: row;
            width: 90%;
            max-width: 1200px;
            height: 90%;
            max-height: 700px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            padding: 20px;
        }

        .image-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .image-section img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .content-section {
            flex: 1.5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            box-sizing: border-box;
            overflow: hidden;
        }

        .back-button {
            font-size: 14px;
            text-decoration: none;
            color: #007bff;
            display: block;
            text-align: left;
            margin-bottom: 40px; /* Increased margin for better spacing */
            font-weight: bold;
        }

        .back-button .arrow {
            font-size: 16px;
            margin-right: 5px;
        }

        .content-section h2 {
            margin-top: 0;
            margin-bottom: 30px; /* Increased bottom margin for better spacing */
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            color: #2c3e50;
        }

        .content-section h3 {
            margin-top: 0;
            margin-bottom: 20px; /* Increased bottom margin for better spacing */
            font-size: 28px;
            font-weight: bold;
            text-align: left;
        }

        .content-section p {
            margin: 0 0 30px 0; /* Increased bottom margin for better spacing */
            text-align: justify;
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }

        .more-btn {
            width: fit-content;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            border: none;
            color: #fff;
            text-decoration: none;
            text-align: center;
            margin-top: 20px; /* Added margin to separate from paragraph */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="exln-bg.jpg" alt="Museo ni Rizal">
        </div>
        <div class="content-section">
            <a href="home.php" class="back-button"><span class="arrow">&larr;</span> Back to Home</a>
            <h2>About Us</h2>
            <h3>Museo ni Rizal</h3>
            <p>
                Welcome to the Museo ni Rizal. Administered by the National Historical Commission of the Philippines
                (NHCP), this shrine reaffirms Rizal’s significance in Philippine history – how his death served as
                the inspiration in the struggle for Philippine independence.
            </p>
            <a href="https://intramuros.gov.ph/mnr/" class="more-btn">More About Us</a>
        </div>
    </div>
</body>

</html>
<?php 
    
?>