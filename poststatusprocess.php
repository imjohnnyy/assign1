<html>

<head>
    <title>Process Post Status</title>
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
            <h1>Status Posting System</h1>
        </div>

        <div class="content">
            <?php
            //Accessing the connection details within settings.php file which are used to connect to the database confidentially.
            require_once("/home/fmp4670/conf/settings.php");
            $connection = mysqli_connect($host, $username, $password, $databaseName);

            if (!$connection) {
                die("Error: Unable to connect to the ', $databaseName, ' database.<br>" . mysqli_connect_error());
            } else {
                echo "Successfully connected to the '", $databaseName, "' database!<br>";
            }


            //When the user clicks on the post button on the Post Status Form the following happens: 
            if (isset($_POST['post'])) {
                //Error Checking to see if any data is missing from the Post Status Form (the form will not be posted if any data is missing).
                if (empty($_POST['statuscode'])) {
                    echo '<br> <b>ERROR:</b> The Status Code is missing. Please enter a Status Code.';
                } else {
                    $status_code = $_POST['statuscode'];
                    if (!preg_match('/^S\d{4}$/', $status_code))     //Checking if the user inputted Status Code matches the correct format.
                    {
                        echo '<br> <b>ERROR:</b> The Status Code must be in the format of "S0001" - Starts with S then followed by 4 digits';
                    }
                }

                if (empty($_POST['status'])) {
                    echo '<br> <b>ERROR:</b> The Status is missing. Please enter a Status.';
                } else {
                    $status = $_POST['status'];
                    if (!preg_match('/^[a-zA-Z0-9\s\,!?.]*$/', $status))   //Checking if the user inputted Status matches the correct format.
                    {
                        echo '<br> <b>ERROR:</b> The Status must only contain alphabets, numbers, 
                                commas, exclamation marks, question marks, and full stops!';
                    }
                }

                if (empty($_POST['share'])) {
                    echo '<br> <b>ERROR:</b> The Share option missing. Please select a Share option.';
                } else {
                    $share = $_POST['share'];
                }

                if (empty($_POST['statusdate'])) {
                    echo '<br> <b>ERROR:</b> The Date is missing. Please enter or select a Date.';
                } else {
                    $date = date('Y-m-d', strtotime($_POST['statusdate']));
                }

                if (empty($_POST['permission'])) {
                    echo '<br> <b>ERROR:</b> The Permission option is missing. Please select a Permission option.';
                } else {
                    $permission = $_POST['permission'];
                }


                //Submits the form only if all data are not empty and are in the correct format.
                if (isset($status_code, $status, $share, $date, $permission) && preg_match('/^S\d{4}$/', $_POST['statuscode'])) {
                    //Checking if a Status Code already exists in the 'post_status' table. 
                    //If it exists, an error message will be displayed, else the status will successfully be posted and saved into the 'post_status' table.
                    $submit_status_code_search = $connection->query("SELECT * FROM post_status WHERE status_code='$status_code'");

                    if ($submit_status_code_search->num_rows > 0) {
                        echo '<br> <b>ERROR:</b> This Status Code ', $status_code, ' already exists! Please enter a new one!';
                    } else {
                        echo '<br> <b>SUCCESS:</b> The status has been successfully posted!';
                        $submit_insert_query = $connection->query("INSERT INTO post_status VALUES('null', '$status','$status_code','$share', '$date','$permission')");
                    }
                }
                echo '<br><br> <a id="homepage-btn" href="/assign1/index.html">Return to Homepage</a>';
            } else {
                die("Failed to insert data!");
            }

            ?>
        </div>
    </div>

    <!----Footer of the webpage-->
    <div class="footer">
        <div class="footer-content">
            <p>Contact: statuspostingsystem@tempmail123.com</p>
        </div>
    </div>
</body>

</html>