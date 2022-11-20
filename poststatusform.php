<html>

<head>
    <title>Post Status Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Importing the BootStrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Importing the styles.css file -->
    <style>
        <?php include 'styles.css'; ?>
    </style>
</head>

<body>
    <!----Header of the webpage-->
    <div class="header">
        <p class="header-title">Status Posting System</p>
        <div class="header-content">
            <a class="home-page" href="/assign1/index.html">Home</a>
            <a class="post-page" href="/assign1/poststatusform.php">Post Form</a>
            <a class="search-page" href="/assign1/searchstatusform.html">Search Status</a>
            <a class="about-page" href="/assign1/about.html">About</a>
        </div>
    </div>

    <div class="container">
        <div class="form-header">
            <h1>Post Status Form</h1>
        </div>
        
        <!----Sending the value entered by user on form to poststatusprocess.php with HTTP post transaction (POST method)-->
        <form class="form-container" action="/assign1/poststatusprocess.php" method="post">

            <div class="form-group">
                <b><label for="statuscode">Status Code (required): </label></b>
                <input type="text" id="statuscode" name="statuscode" maxlength="5" placeholder="e.g. S0712"><br>
            </div>

            <div class="form-group">
                <b><label for="status">Status (required):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></b>
                <!---- The usage of &nbsp are for spacing purposes ---->
                <input type="text" id="status" name="status" size="60"><br><br>
            </div>

            <div class="form-group">
                <!---- Status and Status Code (Radio Button type) ---->
                <b><label for="share">Share:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></b>

                <input type="radio" id="public" name="share" value="Public">
                <label for="public">Public</label>

                <input type="radio" id="friends" name="share" value="Friends">
                <label for="friends">Friends</label>

                <input type="radio" id="onlyme" name="share" value="Only Me">
                <label for="onlyme">Only Me</label></br>
            </div>

            <div class="form-group">
                <!---- Date (Date type)---->
                <b><label for="date">Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></b>
                <input type="date" id="date" name="statusdate" value="date"><br>
            </div>

            <div class="form-group">
                <!---- Permission (Checkbox type)---->
                <b><label for="date">Permission:&nbsp&nbsp&nbsp</label></b>
                <input type="checkbox" id="allow-like" name="permission" value="Allow Like">
                <label for="allow-like">Allow Like</label>

                <input type="checkbox" id="allow-comment" name="permission" value="Allow Comment">
                <label for="allow-comment">Allow Comment</label>

                <input type="checkbox" id="allow-share" name="permission" value="Allow Share">
                <label for="allow-share">Allow Share</label><br><br>
            </div>


            <input type="submit" name="post" class="btn btn-primary" value="Post form">
            <input type="reset" name="reset" class="btn btn-secondary" value="Reset form"><br><br>
            <!----Absolute URL link directed to index.html-->
            <a id="homepage-btn" href="/assign1/index.html">Return to Homepage</a>

        </form>
    </div>

    <!----Footer of the webpage-->
    <div class="footer">
        <div class="footer-content">
            <p>Contact: statuspostingsystem@tempmail123.com</p>
        </div>
    </div>

</body>

</html>