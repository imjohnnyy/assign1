<html>

<head>
    <title>Search Post Status</title>
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
            <h1>Search Post Status</h1>
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


            //When the user clicks on the 'Seach Results' button on the Search Status Form the following happens: 
            if (isset($_GET['searchstatus'])) {
                //Error Checking to see if the Search Status is empty or not (the form will begin searching if the Search Status is empty).

                if (empty($_GET['status'])) {
                    echo '<br> <b>ERROR:</b> The Search Status is empty. Please enter a Search Status.';
                    echo '<br><br> <a id="homepage-btn" href="/assign1/index.html">Return to Homepage</a>  <a id="searchpage-btn" href="/assign1/searchstatusform.html">Return to Search Status Page</a>';
                } else {
                    $status = $_GET['status'];
                    if (!preg_match('/^[a-zA-Z0-9\s\,!?.]*$/', $status))   //Checking if the user inputted Status matches the correct format.
                    {
                        echo '<br> <b>ERROR:</b> The Search Status must only contain alphabets, numbers, 
                                commas, exclamation marks, question marks, and full stops!';
                        echo '<br><br> <a id="homepage-btn" href="/assign1/index.html">Return to Homepage</a>  <a id="searchpage-btn" href="/assign1/searchstatusform.html">Return to Search Status Page</a>';
                    }
                }


                //Submits the form only if the Search Status input is not empty
                if (isset($status)) {
                    $search_status_results = $_GET['searchstatus'];

                    $submit_search_status_query = $connection->query("SELECT * FROM post_status WHERE status LIKE '%$status%'");

                    //Checking if the Search Status already exists in the 'post_status' table or not.
                    if ($submit_search_status_query->num_rows > 0) {
                        echo '<br><h3 id="status-header">Status Information</h3>';

                        //Iterates through the post_status table, 
                        //and returns data based on the Search Status inputted by the user styled as Boostrap 'cards'.
                        foreach ($submit_search_status_query as $results) {
                        ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Post ID: <?= $results["post_id"]; ?>
                                        &nbsp&nbsp Status Code: <?= $results["status_code"]; ?>
                                    </h5>
                                    <p class="card-text">
                                        Status: <?= $results["status"]; ?><br>
                                        Date: <?= $results["date"]; ?><br>
                                        Permission: <?= $results["permission"]; ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                        echo '<br><br> <a id="homepage-btn" href="/assign1/index.html">Return to Homepage</a>  <a id="searchpage-btn" href="/assign1/searchstatusform.html">Return to Search Status Page</a>';
                    } else {
                        echo "There are no status that are relevant! Please enter a new status.";
                        echo '<br><br> <a id="homepage-btn" href="/assign1/index.html">Return to Homepage</a>  <a id="searchpage-btn" href="/assign1/searchstatusform.html">Return to Search Status Page</a>';
                    }
                }
            } else {
                die("Failed to search data!");
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