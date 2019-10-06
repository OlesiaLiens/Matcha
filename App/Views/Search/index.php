<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--		<link rel="stylesheet" href="/styles/bootstrap.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/styles/login.css"/>
    <link rel="stylesheet" href="/styles/beautified.css"/>
    <!--	<script type="text/javascript" charset="UTF-8" src="./Document_files/common.js"></script>-->
    <!--	<script type="text/javascript" charset="UTF-8" src="./Document_files/util.js"></script>-->
    <!--	<script type="text/javascript" charset="UTF-8" src="./Document_files/geocoder.js"></script>-->
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
                <li><a href="/account/index">Account</a></li>
                <li><a href="/info/info">Information</a></li>
                <li><a href="/settings/index">Settings</a></li>
                <li class="active"><a href="/search/index">Search</a></li>
                <li><a href="/chat/index">Chat</a></li>
                <li><a href="/logout/index">Logout</a></li>
            </ul>
        </div>
    </div>
</header>

<main>

    <div id="app">
        <section class="App ant-layout">
            <div class="container-flex top">
                <div class="container-nav"><h3>Sort results</h3>
                    <div class="sort-container"><span class="search-sort-title">Sort by </span>
                        <div class="ant-select ant-select-enabled">
                            <div class="ant-select-selection
            ant-select-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true"
                                 aria-controls="a0870a7e-01c9-47d8-eec4-05a6a6fe77c7" aria-expanded="false"
                                 tabindex="0">
                                <div class="ant-select-selection__rendered">
                                    <div class="ant-select-selection-selected-value" title="Rating"
                                         style="display: block; opacity: 1;">Rating
                                    </div>
                                </div>
                                <span class="ant-select-arrow" unselectable="on" style="user-select: none;"><i
                                            aria-label="icon: down" class="anticon anticon-down ant-select-arrow-icon"><svg
                                                viewBox="64 64 896 896" focusable="false" class="" data-icon="down"
                                                width="1em" height="1em" fill="currentColor" aria-hidden="true"><path
                                                    d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path></svg></i></span>
                            </div>
                        </div>
                        <div class="ant-select ant-select-enabled">
                            <div class="ant-select-selection
            ant-select-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true"
                                 aria-controls="01d4eddb-86b7-4a1b-fb64-7da97c5aad4c" aria-expanded="false"
                                 tabindex="0">
                                <div class="ant-select-selection__rendered">
                                    <div class="ant-select-selection-selected-value" title="↑"
                                         style="display: block; opacity: 1;">↑
                                    </div>
                                </div>
                                <span class="ant-select-arrow" unselectable="on" style="user-select: none;"><i
                                            aria-label="icon: down" class="anticon anticon-down ant-select-arrow-icon"><svg
                                                viewBox="64 64 896 896" focusable="false" class="" data-icon="down"
                                                width="1em" height="1em" fill="currentColor" aria-hidden="true"><path
                                                    d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path></svg></i></span>
                            </div>
                        </div>
                    </div>
                    <h3>Filter results</h3>
                    <div class="filter-block"><span class="filter-title">Gender</span>
                        <div class="ant-radio-group ant-radio-group-outline"><label
                                    class="ant-radio-wrapper ant-radio-wrapper-checked"><span
                                        class="ant-radio ant-radio-checked"><input type="radio" class="ant-radio-input"
                                                                                   value="both" checked=""><span
                                            class="ant-radio-inner"></span></span><span>Men and Women</span></label><label
                                    class="ant-radio-wrapper"><span class="ant-radio"><input type="radio"
                                                                                             class="ant-radio-input"
                                                                                             value="male"><span
                                            class="ant-radio-inner"></span></span><span>Men</span></label><label
                                    class="ant-radio-wrapper"><span class="ant-radio"><input type="radio"
                                                                                             class="ant-radio-input"
                                                                                             value="female"><span
                                            class="ant-radio-inner"></span></span><span>Women</span></label></div>
                    </div>
                    <div class="filter-block"><span class="filter-title">Rating</span>
                        <div class="ant-slider">
                            <div class="ant-slider-rail"></div>
                            <div class="ant-slider-track ant-slider-track-1" style="left: 0%; width: 100%;"></div>
                            <div class="ant-slider-step"></div>
                            <div tabindex="0" class="ant-slider-handle ant-slider-handle-1" role="slider"
                                 aria-valuemin="0"
                                 aria-valuemax="42" aria-valuenow="0" aria-disabled="false" style="left: 0%;"></div>
                            <div tabindex="0" class="ant-slider-handle ant-slider-handle-2" role="slider"
                                 aria-valuemin="0"
                                 aria-valuemax="42" aria-valuenow="42" aria-disabled="false" style="left: 100%;"></div>
                            <div class="ant-slider-mark"></div>
                        </div>
                    </div>
                    <div class="filter-block"><span class="filter-title">Interests</span>
                        <div class="ant-select ant-select-enabled" style="width: 100%;">
                            <div class="ant-select-selection
            ant-select-selection--multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true"
                                 aria-controls="73e84721-a0af-4891-9d35-b9a5e91729e5" aria-expanded="false">
                                <div class="ant-select-selection__rendered">
                                    <div unselectable="on" class="ant-select-selection__placeholder"
                                         style="display: block; user-select: none;">Filter by interests
                                    </div>
                                    <ul>
                                        <li class="ant-select-search ant-select-search--inline">
                                            <div class="ant-select-search__field__wrap"><input autocomplete="off"
                                                                                               class="ant-select-search__field"
                                                                                               value=""><span
                                                        class="ant-select-search__field__mirror">&nbsp;</span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-block"><span class="filter-title">Age</span>
                        <div class="ant-slider">
                            <div class="ant-slider-rail"></div>
                            <div class="ant-slider-track ant-slider-track-1" style="left: 0%; width: 100%;"></div>
                            <div class="ant-slider-step"></div>
                            <div tabindex="0" class="ant-slider-handle ant-slider-handle-1" role="slider"
                                 aria-valuemin="17"
                                 aria-valuemax="80" aria-valuenow="17" aria-disabled="false" style="left: 0%;"></div>
                            <div tabindex="0" class="ant-slider-handle ant-slider-handle-2" role="slider"
                                 aria-valuemin="17"
                                 aria-valuemax="80" aria-valuenow="80" aria-disabled="false" style="left: 100%;"></div>
                            <div class="ant-slider-mark"></div>
                        </div>
                    </div>
                    <div class="filter-block"><span class="filter-title">Location, km (max 800km)</span>
                        <div class="ant-row">
                            <div class="ant-col ant-col-17">
                                <div class="ant-slider ant-slider-disabled">
                                    <div class="ant-slider-rail"></div>
                                    <div class="ant-slider-track" style="left: 0%; width: 0%;"></div>
                                    <div class="ant-slider-step"></div>
                                    <div class="ant-slider-handle" role="slider" aria-valuemin="0" aria-valuemax="800"
                                         aria-disabled="true" style="left: 0%;"></div>
                                    <div class="ant-slider-mark"></div>
                                </div>
                                Disabled:
                                <button type="button" role="switch" aria-checked="true"
                                        class="ant-switch-small ant-switch ant-switch-checked"><span
                                            class="ant-switch-inner"></span></button>
                            </div>
                            <div class="ant-col ant-col-2">
                                <div class="ant-input-number ant-input-number-disabled" style="margin-left: 16px;">
                                    <div class="ant-input-number-handler-wrap"><span unselectable="unselectable"
                                                                                     role="button"
                                                                                     aria-label="Increase Value"
                                                                                     aria-disabled="true"
                                                                                     class="ant-input-number-handler ant-input-number-handler-up "><i
                                                    aria-label="icon: up"
                                                    class="anticon anticon-up ant-input-number-handler-up-inner"><svg
                                                        viewBox="64 64 896 896" focusable="false" class=""
                                                        data-icon="up"
                                                        width="1em" height="1em" fill="currentColor" aria-hidden="true"><path
                                                            d="M890.5 755.3L537.9 269.2c-12.8-17.6-39-17.6-51.7 0L133.5 755.3A8 8 0 0 0 140 768h75c5.1 0 9.9-2.5 12.9-6.6L512 369.8l284.1 391.6c3 4.1 7.8 6.6 12.9 6.6h75c6.5 0 10.3-7.4 6.5-12.7z"></path></svg></i></span><span
                                                unselectable="unselectable" role="button" aria-label="Decrease Value"
                                                aria-disabled="true"
                                                class="ant-input-number-handler ant-input-number-handler-down "><i
                                                    aria-label="icon: down"
                                                    class="anticon anticon-down ant-input-number-handler-down-inner"><svg
                                                        viewBox="64 64 896 896" focusable="false" class=""
                                                        data-icon="down"
                                                        width="1em" height="1em" fill="currentColor" aria-hidden="true"><path
                                                            d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path></svg></i></span>
                                    </div>
                                    <div class="ant-input-number-input-wrap" role="spinbutton" aria-valuemin="1"
                                         aria-valuemax="800"><input class="ant-input-number-input" autocomplete="off"
                                                                    disabled="" max="800" min="1" step="1" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container-right">
                    <div class="container-results">
                        <?php foreach ($params['users'] as $user): ?>


                        <a href="/user/<?= $user['id'] ?>">


                            <figure class="user-snippet"><img src="<?= $user['avatar'] ?>" alt="profile-sample"
                                                              class="background">
                                <img src="<?= $user['avatar'] ?>" alt="profile-sample" class="profile">

                                <figcaption><span class="circle offline">●</span>
                                    <h3><?= $user['first_name'] ?></h3>
                                    <span>Rating: <?= $user['rating'] ?></span>
                                    <span>Age: <?= $user['bday'] ?></span>
                                    <span class="distance">Location: <?= $user['location'] ?></span>
                                    <div class="icons"></div>
                                </figcaption>

                            </figure>
                            <?php endforeach; ?>
                    </div>
                </div>
        </section>
    </div>

    <?php if ($params['users_count'] > 5) : ?>
        <?php

        $pages = ceil($params['users_count'] / 5);
        $nbr_start = 2;
        if ($params['page_number'] < 3) {
            $nbr_start = $params['page_number'] - 1;
        } else if ($params['page_number'] + 2 > $pages) {
            $nbr_start = 4 - ($pages - $params['page_number']);
        }
        $nbr_end = 2;
        if ($params['page_number'] + 2 > $pages) {
            $nbr_end = $pages - $params['page_number'];
        } else if ($params['page_number'] < 3) {
            $nbr_end = 5 - $params['page_number'];
        }

        $start = $params['page_number'] - $nbr_start;
        $end = $params['page_number'] + $nbr_end;

        if ($start < 1)
            $start = 1;
        if ($end > $pages)
            $end = $pages;
        ?>
        <div class="pagination">
            <?php if ($params['page_number'] > 3 && $pages > 5) : ?>
                <a href="/search/page/<?= $params['page_number'] - 3 ?>">&laquo;</a>
            <?php endif; ?>
            <?php foreach (range($start, $end) as $page_nbr): ?>
                <a class="<?= $params['page_number'] == $page_nbr ? "active" : "" ?>"
                   href="/search/page/<?= $page_nbr ?>"><?= $page_nbr ?></a>
            <?php endforeach; ?>
            <?php if ($params['page_number'] < $pages - 2 && $pages > 5) : ?>
                <a href="/search/page/<?= $params['page_number'] + 3 ?>">&raquo;</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</main>
<div class="hiden"></div>

<footer>
    <div class="container">
        <div class="row centered myhover">
        </div>
    </div>
</footer>

</div>

<script type="text/javascript" src="/js/notifications.js"></script>
</body>
</html>
