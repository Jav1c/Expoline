<?php
include ('Log out.php');
require 'config.php';
// Manage user sessions
$session_id = session_id();
$stmt = $conn->prepare("INSERT INTO user_sessions (session_id) VALUES (?) ON DUPLICATE KEY UPDATE last_activity = NOW()");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$stmt->close();
// Count active users
$active_time = 1 * 60; // 1 minute in seconds
$time_limit = date('Y-m-d H:i:s', time() - $active_time);
$result = $conn->query("SELECT COUNT(*) as active_users FROM user_sessions WHERE last_activity > '$time_limit'");
$row = $result->fetch_assoc();
$active_users = $row['active_users'];

// Clean up old sessions
$cleanup_time = date('Y-m-d H:i:s', time() - $active_time);
$conn->query("DELETE FROM user_sessions WHERE last_activity < '$cleanup_time'");

// Close connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo ni Rizal</title>
    <link rel="icon" href="wlogo.png" type="image/png">
    <link rel="stylesheet" href="css/homestyle.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <img src="logo.png" alt="Logo" class="logo-image">
            <nav class="navbar">
                <a href="About.php">About</a>
                <a href="Contact.php">Contact</a>
                <!--<a href="Log In.php">Log In</a>
                <a href="Sign Up.php" class="signup">Sign Up</a>-->
                <a href="https://app.cloudpano.com/tours/M6RolrHzU" class = "signup">View Tour</a>

            </nav>
        </header>
        <div class="active-users" style="margin-top: 5%; margin-right: 3%; color: white;">
            <img src="viewers.png" alt="Active Users" style="width: 40px; height: 40px; margin-right: 5px;">
            <span style="color: white;"><?php echo $active_users; ?></span>
        </div>
        <div class="text-overlay">
            <div class="text-content">
                <h1>Explore Museo<br>Ni Rizal<br>While At Home</h1>
                <p>Explore the rich history of Museo ni Rizal from home with ExpoLine's web-based virtual tour and
                    immersive VR integration.</p>

                    <a href="#" class="explore-link" id="explore-button">
                        <button class="explore-button">Explore</button>
                    </a>
            </div>
            <div class="side-photos-container">
                <div class="side-photos">
                    <img src="https://intramuros.gov.ph/wp-content/uploads/2022/07/0-02-06-af154e61d7b8aa3cfabf87c9e289b8d40951c6c3f1aeefc268d88ab48c05f06f_1c6dac188d3e18.jpg"
                        alt="Side Photo 1">
                    <img src="https://intramuros.gov.ph/wp-content/uploads/2022/07/0-02-06-1554c2c15cc46b0b551e26cc9f04075ab0b9ea934d1b1e0781a9101cfb7c28bb_1c6dac188d2b69.jpg"
                        alt="Side Photo 2">
                </div>
            </div>
        </div>
        <!-- Popup for 360 new info layout -->
        <div class="popup" id="popup">
            <button class="close-button" id="closePopup">Close</button>
            <div class="popup-content">
                <button class="prev-button" id="prevImage">Previous Image</button>
                <img id="popupImage" src="360 new info layout.png" alt="Current Image">
                <button class="next-button" id="nextImage">Next Image</button>
            </div>
        </div>       
        <div class="image-carousel">
            <div class="vertical-line"></div>
            <div class="carousel-indicators">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
            </div>
        </div>

        <div class="carousel-arrow">
            <img src="arrow.png" alt="Next" class="arrow-image">
        </div>


        <!--<footer class="footer">
            <div class="footer-icons">
                <a href="#" class="view-in-360">
                    <img src="360-degrees.png" alt="360 View Icon">
                    <span class="view-in-360-text">View in 360</span>
                </a>
                <div class="separator"></div>
                <span><img src="museum.png" alt="Museum Icon"> Museo ni Rizal</span>
                <a href="#" class="vr-icon-container">
                    <img src="vr.png" alt="VR Icon">
                </a>
            </div>
        </footer>-->

    </div>

    <script>
        const container = document.querySelector('.container');
        const arrow = document.querySelector('.carousel-arrow img');
        const dots = document.querySelectorAll('.dot');
        let currentIndex = 0;

        const images = [
            'https://intramuros.gov.ph/wp-content/uploads/2022/07/0-02-06-6968bc2e52d8bdb29f34018a55e8950ff11d691200d87c3dafc2b49e19dbce57_1c6dac188bb56d.jpg',
            'https://intramuros.gov.ph/wp-content/uploads/2022/07/0-02-06-903e78448f23585184ddf06efc3ba590b3badd8382e471df5d8ea4b5bccc4a10_1c6dac188de42f.jpg',
            'https://intramuros.gov.ph/wp-content/uploads/2022/07/0-02-06-d109f8602f4b139655082ac996623dfe361c99ea8b555474fd1512647591b38d_1c6dad7803803c-1.jpg'
        ];

        const popimages = [
            "360 infos new layout.png",
            "360 infos new layout_20241024_203038_0000.png"
            
        ];

        function updateBackground(index) {
            container.style.backgroundImage = `url('${images[index]}')`;
        }

        function updateDotIndicators(index) {
            dots.forEach((dot) => {
                dot.classList.remove('active');
            });
            dots[index].classList.add('active');
        }

        arrow.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % images.length;
            updateBackground(currentIndex);
            updateDotIndicators(currentIndex);
        });

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.getAttribute('data-index'));
                currentIndex = index;
                updateBackground(currentIndex);
                updateDotIndicators(currentIndex);
            });
        });

        // Initialize the first background image and dot indicator
        updateBackground(currentIndex);
        updateDotIndicators(currentIndex);

        // Show popup on page load
        window.onload = function() {
            const popup = document.getElementById('popup');
            popup.classList.add('show'); // Add class to show popup
            document.getElementById('popupImage').src = popimages[0]; // Set initial image from popimages
        };

        // Add event listener for the Explore button
        document.getElementById('explore-button').onclick = function(event) {
            event.preventDefault(); // Prevent the default anchor behavior
            const popup = document.getElementById('popup');
            popup.classList.add('show'); // Show the popup
            document.getElementById('popupImage').src = popimages[0]; // Set initial image from popimages
        };

        // Close popup functionality
        document.getElementById('closePopup').onclick = function() {
            document.getElementById('popup').style.display = 'none';
        };

        // Show next image functionality
        document.getElementById('nextImage').onclick = function() {
            currentIndex = (currentIndex + 1) % popimages.length; // Cycle through popimages
            document.getElementById('popupImage').src = popimages[currentIndex]; // Update the image
        };

        // Show previous image functionality
        document.getElementById('prevImage').onclick = function() {
            currentIndex = (currentIndex - 1 + popimages.length) % popimages.length; // Cycle through popimages
            document.getElementById('popupImage').src = popimages[currentIndex]; // Update the image
        };

        // Close popup on 'Esc' key press
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.getElementById('popup').style.display = 'none';
            }
        });

        let popIndex = 0;

        window.onload = function() {
            const popup = document.getElementById('popup');
            popup.classList.add('show'); // Show popup
            document.getElementById('popupImage').src = popimages[popIndex]; // Set initial image
        };

        // Event listener for the Explore button
        document.getElementById('explore-button').onclick = function(event) {
            event.preventDefault(); // Prevent default anchor behavior
            const popup = document.getElementById('popup');
            popup.classList.add('show'); // Show the popup
            popIndex = 0; // Reset index to show the first image
            document.getElementById('popupImage').src = popimages[popIndex]; // Set initial image
        };

        // Close popup functionality
        document.getElementById('closePopup').onclick = function() {
            document.getElementById('popup').classList.remove('show'); // Hide popup
        };

        // Show next image functionality
        document.getElementById('nextImage').onclick = function() {
            popIndex = (popIndex + 1) % popimages.length; // Cycle through images
            document.getElementById('popupImage').src = popimages[popIndex]; // Update image
        };

        // Show previous image functionality
        document.getElementById('prevImage').onclick = function() {
            popIndex = (popIndex - 1 + popimages.length) % popimages.length; // Cycle through images
            document.getElementById('popupImage').src = popimages[popIndex]; // Update image
        };

        // Close popup on 'Esc' key press
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.getElementById('popup').classList.remove('show'); // Hide popup
            }
        });

        // Function to handle VR icon click
        function viewInVR() {
            // Implement VR view action here
            alert('VR view triggered!');
        }

        // Function to call when the user is about to leave the page
        function logoutUser () {
            navigator.sendBeacon('logout.php'); // Use sendBeacon to ensure the request is sent even if the user leaves quickly
        }

        // Add event listeners for page unload and beforeunload events
        window.addEventListener('beforeunload', logoutUser );
        window.addEventListener('unload', logoutUser );

    </script>
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6719de994304e3196ad7450f/1iaugr21s';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>   
</body>

</html>