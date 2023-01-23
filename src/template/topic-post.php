<div id="slider" class="row m-2 py-2 slider">
    <div class="row wrapper rounded">
        <div id="slides" class="slides">
            <span class="slide">data giorno mese</span>
            <span class="slide">data giorno mese</span>
            <span class="slide">data giorno mese</span>
            <span class="slide">data giorno mese</span>
            <span class="slide">data giorno mese</span>
            <span class="slide">data giorno mese</span>
            <span class="slide">data giorno mese</span>
        </div>
    <a id="prev" class="control prev"></a>
    <a id="next" class="control next"></a>
    </div>
</div>
<div class="d-flex justify-content-center col-12">
    <div class="col-6 px-2 topic">
        <h1><?php echo $templateParams["postOTD"][0]["nome"];?></h1>
    </div>
    <div class="col-6 px-2 d-flex align-items-center">
        <button class=" btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" id="topicCalendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </button>
    </div>
</div>
<?php foreach($templateParams["postOTD"] as $post):
    require $templateParams["post"];
endforeach; ?>