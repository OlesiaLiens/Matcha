<!DOCTYPE html>
<html>

<head>
    <title>Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/styles/account.css">
    <link rel="stylesheet" href="../styles/bootstrap.css">
    <!--	<link rel="stylesheet" href="../styles/font-awesome.css">-->
    <link rel="stylesheet" href="/styles/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"-->
    <!--		  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <!--	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.m,in.css">-->
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .btn-default {
            background-color: #f2f2f2;;;

        }

        .photos img {
            flex-direction: row;
        }

        .navbar-inverse .navbar-nav > .active > a {
            background-color: #ff7878;
        }


        img {
            margin-left: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        input {
            padding-top: 0;
            width: 400px;
        }


        ul {
            margin: 10px auto;
            padding-left: 0;
            text-align: center;
        }

        @-moz-keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(-360deg);
            }
        }

        @-webkit-keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(-360deg);
            }
        }

        @-o-keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(-360deg);
            }
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(-360deg);
            }
        }

        .round {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            padding-top: 30px;
            text-decoration: none;
            text-align: center;
            font-size: 25px;
            text-shadow: 0 1px 0 rgba(255, 255, 255, .7);
            letter-spacing: -.065em;
            font-family: "Hammersmith One", sans-serif;
            -webkit-transition: all .25s ease-in-out;
            -o-transition: all .25s ease-in-out;
            -moz-transition: all .25s ease-in-out;
            transition: all .25s ease-in-out;
            box-shadow: 2px 2px 7px rgba(0, 0, 0, .2);
            border-radius: 300px;
            z-index: 1;
            border-width: 4px;
            border-style: solid;
        }

        .round:hover {
            width: 130%;
            height: 130%;
            left: -15%;
            top: -15%;
            font-size: 33px;
            padding-top: 38px;
            -webkit-box-shadow: 5px 5px 10px rgba(0, 0, 0, .3);
            -o-box-shadow: 5px 5px 10px rgba(0, 0, 0, .3);
            -moz-box-shadow: 5px 5px 10px rgba(0, 0, 0, .3);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, .3);
            z-index: 2;
            border-size: 10px;
            -webkit-transform: rotate(-360deg);
            -moz-transform: rotate(-360deg);
            -o-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }

        li.like {
            list-style: none;
            position: relative;
            display: inline-block;
            width: 100px;
            height: 100px;
        }


        div.red {
            background-color: whitesmoke;
            color: black;
            font-size: 26px;
            border-color: rgba(1, 151, 171, 0.5);
            text-decoration: none;
        }

        div.red:hover {
            background-color: whitesmoke;
            color: black;
            border-color: rgba(1, 151, 171, 0.5);
        }

        .matched {
            background-color: yellow;
            color: whitesmoke;;
            border-color: #2d2d2d;
        }

        .matched:focus {
            background-color: yellow;
        }

        .matched:hover {
            background-color: yellow;
            border-color: #2d2d2d;
        }

        div.ban {
            background-color: whitesmoke;
            color: black;
            font-size: 26px;
            border-color: red;
            text-decoration: none;
        }

        div.ban:hover {
            background-color: whitesmoke;
            color: black;
            border-color: red;
        }

        div.fake {
            background-color: whitesmoke;
            color: black;
            font-size: 26px;
            border-color: red;
            text-decoration: none;
        }

        div.fake:hover {
            background-color: whitesmoke;
            color: black;
            border-color: red;
        }

        .faked {
            background-color: cadetblue;
            color: whitesmoke;;
            border-color: #2d2d2d;
        }

        .faked:focus {
            background-color: cadetblue;
        }

        .faked:hover {
            background-color: cadetblue;
            border-color: #2d2d2d;
        }


        .baned {
            background-color: #2d2d2d;;
            color: red;;
            border-color: #cc4b37;
        }

        .baned:focus {
            background-color: #2d2d2d;
        }

        .baned:hover {
            background-color: #2d2d2d;
            border-color: #cc4b37;
        }


        .button-like:focus {
            background-color: transparent;
        }

        .button-like:hover {
            border-color: #cc4b37;
            background-color: transparent;
        }

        .liked {
            background-color: #ff7878;
            color: whitesmoke;
            border-color: #cc4b37;
        }

        .liked:focus {
            background-color: #ff7878;
        }

        .liked:hover {
            background-color: #ff7878;
            border-color: #cc4b37;
        }

        [hidden] {
            display: none !important;
        }

        .hiden {
            height: 100px;

        }

        #computer {
            text-align: center;
            margin-bottom: 10px;
            height: 40px;
            width: 400px;
        }

        #photos-container img {
            height: 300px;
            width: 400px;
        }

        @media (max-width: 901px) {
            footer {
                width: 901px;
            }

        }

        .error {
            color: red;
        }

    </style>
</head>

<body>
<header class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/account/index">Account</a></li>
                <li class=""><a href="/info/index">Information</a></li>
                <li class=""><a href="/notification/index">Notification</a></li>
                <li><a href="/settings/index">Settings</a></li>
                <li><a href="/search/index">Search</a></li>
                <li><a href="/chat/index">Chat</a></li>
                <li><a href="/logout/index">Logout</a></li>
            </ul>
        </div>
    </div>
</header>


<main>
    <div id="headerwrap">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2">
                <h1>Matcha</h1>
                <h2>Because, love too can be industrialized</h2>
            </div>
        </div>
    </div>


    <section class="container w">
        <div class="row centered">
            <?php if ($args['ban'] === 'none' && $args['first_user'] === $args['id']) :?>

                <div class="col-lg-3 delete">
                    <img src="/images/idea.png">
                    <h4>Information</h4>
                    <p>
                        <?php if ($args['online'] === '1') : ?>
                            <!--						--><?= 'Status : Online' ?>
                        <?php endif; ?>

                        <?php if ($args['online'] === '0') : ?>
                            <!--						--><?= 'Last seen: ' . $args['last_see'] ?>
                        <?php endif; ?> <br>

                        <?= 'Full Name : ' . $args['first_name'] . ' ' . $args['last_name'] ?> <br>
                        <?= 'Preference:' . ' ' . $args['preference'] ?> <br>
                        <?= 'Location:' . ' ' . $args['location'] ?> <br>
                        <?= 'Gender:' . ' ' . $args['gender'] ?> <br>
                        <?= 'Age:' . ' ' . $args['bday'] ?> <br>

                    </p>
                </div>


                <div class="col-lg-3 delete">
                    <img src="/images/plane.png">
                    <h4>Interests</h4>
                    <p><?= $args[0] ?? null ?> <br></p>
                    <p><?= $args[1] ?? null ?> <br></p>
                    <p><?= $args[2] ?? null ?> <br></p>
                    <p><?= $args[3] ?? null ?> <br></p>
                    <p><?= $args[4] ?? null ?> <br></p>
                    <p><?= $args[5] ?? null ?> <br></p>
                </div>

                <div class="col-lg-3 delete">
                    <img src="/images/planet.png">
                    <h4>Fame Rating</h4>
                    <p> <?= $args['rating'] ?> </p>
                </div>


                <?php if ($args['id'] != $_SESSION['user_id']) : ?>

                    <div class="col-lg-10 delete">
                        <ul>
                            <li class="like ">
                                <div id="like_user"

                                    <?php if ($args['ban'] === 'none') : ?>
                                    <?php if ($args['liked'] === 'liked') : ?> class="round liked"   <?php endif; ?>
                                    <?php if ($args['liked'] === 'none') : ?> class="round red"  <?php endif; ?>>
                                    <?php endif; ?>

                                    Like
                                </div>
                            </li>
                        </ul>
                        <p class="user_email" id="<?= $args['email'] ?? null ?>" style="display: none"></p>
                    </div>


                    <div class="col-lg-10 delete">
                        <ul>
                            <li class="like ">
                                <div id="fake_user"
                                    <?php if ($args['fake'] === 'fake') : ?> class="round faked" <?php endif; ?>
                                    <?php if ($args['fake'] === 'none') : ?> class="round fake" <?php endif; ?>>

                                    Fake
                                </div>
                            </li>
                        </ul>
                        <p class="user_email" id="<?= $args['email'] ?? null ?>" style="display: none"></p>
                    </div>
                <?php endif; ?>

            <?php endif; ?>




            <?php if ($args['id'] != $_SESSION['user_id']) : ?>

                <div class="col-lg-10 ">
                    <ul>
                        <li class="like ">
                            <div id="ban_user"
                                <?php if ($args['ban'] === 'ban') : ?> class="round baned" <?php endif; ?>
                                <?php if ($args['ban'] === 'none') : ?> class="round ban" <?php endif; ?>>

                                Block
                            </div>
                        </li>
                    </ul>
                    <p class="user_email" id="<?= $args['email'] ?? null ?>" style="display: none"></p>
                </div>

            <?php endif; ?>
        </div>
    </section>


    <section id="dg">
        <div class="container">
            <div class="row centered">
                <h4></h4>
                <br/>
                <div class="col-lg-4">
                    <div class="tilt">
                        <?php if ($args['id'] === $_SESSION['user_id']) : ?>
                            <label for="computer" class="btn btn-default" style="display: inline-table">
                                <div id="image"></div>
                                Upload avatar<input type="file" id="computer" hidden style="display:none">
                            </label>
                        <?php endif; ?>
                        <p class="error" id="show_errors"></p>
                        <img id="avatar" src="<?= $args['avatar'] ?>" alt="img1">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php if ($args['ban'] === 'none') : ?>
        <section id="mycolor ">
            <div class="container w delete">
                <div class="row centered mycolor">
                    <div class="col-lg-12 ">
                        <h4><?= $args['username'] . ' ' ?></h4>
                        <p> <?= $args['bio'] ?> </p>
                    </div>
                </div>
        </section>
    <?php endif; ?>



    <?php if ($args['ban'] === 'none') : ?>
        <section class="container wb delete">
            <div class="row centered">

                <div class="col-lg-10 col-lg-offset-1">
                    <h4>More photos</h4>
                    <p></p>
                </div>

                <div class="col-lg-2"></div>
                <div class="col-lg-10 col-lg-offset-1">
                    <?php if (count($args['photos']) < 4): ?>
                        <?php if ($args['id'] === $_SESSION['user_id']) : ?>
                            <label for="photos" class="btn btn-default">
                                <div id="image_2"></div>
                                Upload photos<input type="file" id="photos" hidden style="display:none">
                            </label>
                        <?php endif; ?>
                        <p class="error" id="show_photos_errors"></p>
                        <img id="empty_photo" src="" alt="img" class="img-responsive" style="display: none">
                    <?php endif; ?>
                    <?php foreach ($args['photos'] as $photo): ?>
                        <img id="" src="<?= $photo['path'] ?>" alt="img" class="img-responsive">
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <section id="lg">
        <div class="row centered">

            <div class="col-lg-2 col-lg-offset-1">
                <img src="../images/logo1a.gif" alt="img" width="200px" height="200px">
            </div>

            <div class="col-lg-2">
                <img src="../images/logo2a.gif" alt="img" width="200px" height="200px">
            </div>

            <div class="col-lg-2">
                <img src="../images/logo3a.gif" alt="img" width="200px" height="200px">
            </div>

            <div class="col-lg-2">
                <img src="../images/logo4a.gif" alt="img" width="200px" height="200px">
            </div>

            <div class="col-lg-2">
                <img src="../images/logo5a.gif" alt="img" width="200px" height="200px">
            </div>
        </div>
    </section>


</main>

<div class="hiden"></div>

<footer>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/styles/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous"></script>


<script type="text/javascript" src="/js/actions.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="/js/position.js"></script>
<script type="text/javascript" src="/js/notifications.js"></script>
<script type="text/javascript" src="/js/photo.js"></script>

</body>
</html>
