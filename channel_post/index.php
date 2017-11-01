<html>

  <head>
            <meta charset="utf-8">
            <title>Add Channel</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="fa/css/font-awesome.css">
            <link rel="stylesheet" type="text/css" href="upload.css">
        </head>

        <body>
            <nav class="navbar navbar-inverse ">
                <!--Navbar Start-->
                <div class="container-fluid">
                    <div class="navbar-header">
                        <!--Logo&&Button-->
                        <div class="button-group">
                            <!--Button Container-->
                            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!--Button Container End-->
                        <div class="add_container">
                            <div class="add-content">
                                <button onclick="window.location.href='https://spat.liveapp.ca/post/'" class="btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
                            </div>
                            <!--End Dropdown container-->
                        </div>
                        <!--End add_container Container-->
                        <div class="Logo-container">
                            <!--Logo Container-->
                            <p class="navbar-text">Channel Name</p>
                        </div>
                        <!--Logo Container End-->
                    </div>
                    <!--Logo&&Button End-->
                    <div class="collapse navbar-collapse" id="mainNavBar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a href="#">My Profile</a>
                            </li>
                            <li class="active">
                                <a href="#">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <!--Menu Items End-->
                </div>
                <!--Fluid Container End-->
            </nav>
            <!--Navbar End-->

            <div class="container main-feed"><!--Main Feed-->

              <form id = "uploadChann" action = "upload.php" method="post" enctype="multipart/form-data"><!--Form Start-->

              <div class="add-caption row">
                  <div class="caption-row col-xs-12 col-sm-6 col-md-8">

                    <fieldset class="form-group">
                       <label for="channel_name">Channel Name</label>
                       <input type="text" name='channelname' class="form-control" id="channel_name" placeholder="Enter Channel Name">
                    </fieldset>

                  </div><!--Caption-row-->


              </div><!--Add-caption-->

              <div class="add-comment row">
                  <div class="comment-row col-xs-12 col-sm-6 col-md-8">

                    <fieldset class="form-group">
                      <label for="permission_select">Choose Permission</label>
                      <select name ='permission' class="form-control" id="permission_select">
                        <option>public</option>
                        <option>private</option>
                      </select>
                    </fieldset>


                  </div><!--Comment-row-->

              </div><!--add-comment-->


              <div class="Continue row"><!--Continue Row-->

                  <div class="continue-column col-xs-12 col-sm-6 col-md-8"><!--Continue column-->
                    <input type="submit" class="btn btn-md btn-primary" value="Continue">
                  </div><!--Continue column-->

              </div><!--Continue Row-->

            </form><!--Form End-->

            </div><!--Main Feed-->

            <footer class="footer">
                <!--footer -->
                <ul class="nav nav-pills">
                    <li>
                        <a href="#">
                    <img src="images/home.png">
                    <p>Home</p>
                </a>
                    </li>
                    <li>
                        <a href="#">
                    <img src="images/profile.png">
                    <p>Profile</p>
                </a>
                    </li>
                    <li>
                        <a href="#">
                    <img src="images/alert.png">
                    <p>Alerts</p>
                </a>
                    </li>
                    <li>
                        <a href="#">
                    <img src="images/search.png">
                    <p>Search</p>
                </a>
                    </li>
                </ul>
            </footer>
            <!--footer -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </html>
