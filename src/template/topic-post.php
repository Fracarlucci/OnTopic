<!-- Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<!-- Custom Style -->
<link rel="stylesheet" href="./components/login-modal/login-modal.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="./js/scroll.js" defer></script>
<script src="./js/updatePost.js" defer></script>
<div id="slider container" class="m-2 py-2 slider">
    <div class="wrapper rounded col-12 w-100">
        <!-- Left arrow -->
        <div id="prevDay" class="p-2 btn-overlay" role="region" aria-labelledby="rewindDays">
            <button id="rewindDays" class="btn-left btn-sm px-2" onclick="scrollDaysLeft(); updateCurrentTitle(); updateTema();">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 3 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </button>
        </div>
        <!-- Calendar -->
        <div class="slides w-100">
            <ul id="slides" class="h-100 col-sm-12 d-flex justify-content-center">
                <li id="day1" class="linkDay">
                    <div id="slide_1" class="slide w-100">
                        <span id="textCalendar1" class="text">
                            <script src="./js/currentDay.js" defer>
                            </script>
                        </span>
                    </div>
                </li>
                <li id="day2" class="linkDay h-100 col-sm-4">
                    <div id="slide_2" class="slide h-100 w-100 col-sm-4">
                        <span id="textCalendar2">
                            <script src="./js/currentDay.js" defer>
                            </script>
                        </span>
                    </div>
                </li>
                <li id="day3" class="linkDay h-100 col-sm-4">
                    <div id="slide_3" class="currentSlide h-100 w-100 col-sm-4">
                        <span id="textCalendar3">
                            <small>
                                <?php
                                    $date = $dbh->getDays(date('d'), date("m"), date("Y"));
                                    echo $date[0]["day_name"] ;?>
                                    <br/>
                            </small>
                            <strong>
                                <?php echo $date[0]["day"]; ?>
                                <br/>
                                <?php echo $date[0]["month_name"];?>
                            </strong>
                        </span>
                    </div>
                </li>
                <li id="day4" class="linkDay h-100 col-sm-4">
                    <div id="slide_4" class="slide h-100 w-100 col-sm-4">
                        <span id="textCalendar4">
                            <script src="./js/currentDay.js" defer>
                            </script>
                        </span>
                    </div>
                </li>
                <li id="day5" class="linkDay">
                    <div id="slide_5" class="slide w-100">
                        <span id="textCalendar5">
                            <script src="./js/currentDay.js" defer>
                            </script>
                        </span>
                    </div>
                </li>
            </ul>    
        </div>
        <!-- Right arrow -->
        <div id="nextDay" class="p-2 btn-overlay" role="region" aria-labelledby="forwardDays">
            <button id="rewindDays" class="btn-right btn-sm px-2 au-target" onclick="scrollDaysRigth(); updateCurrentTitle(); updateTema();">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 3 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center col-12">
    <div id="topic" class="col-6 px-2 topic">
        <h1><?php 
                if(isset($templateParams["temaDelGiorno"][0])){
                    echo $templateParams["temaDelGiorno"][0]["nome"];
                }else{
                    echo "";
                }
            ?>
        </h1>
    </div>
</div>

<div id="updatePost">
    <?php
        if(isset($templateParams["postOTD"][0])){
            foreach($templateParams["postOTD"] as $post):
                require $templateParams["post"];
            endforeach;
        }else{
    ?>
        <h1 class="noPost">Coming soon...</h1>
    <?php 
        }
    ?>
</div>