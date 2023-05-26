<?php

function getBg($choice, $answer){
    $results = strcasecmp($choice, $answer); 

    if($results == 0 ){return "bg-success";}
    else{return "bg-danger";}
}

function getSvg($userAnswer, $answer){
    $results = strcasecmp($userAnswer, $answer); 
    if($results == 0 ){return '<img style="height:30px; width:30px;" src="/ITCS333-Project/public/333 Icons-Fonts-Colors/check-svgrepo-com.svg" alt="Check SVG">';}
    else{return '<img style="height:30px; width:30px;" src="/ITCS333-Project/public/333 Icons-Fonts-Colors/wrong-svgrepo-com.svg" alt="Check SVG">';}
}

function formatSecondsToMinutes($durationInSeconds) {
    $minutes = floor($durationInSeconds / 60);
    $seconds = $durationInSeconds % 60;
    $timeFormatted = sprintf("%d:%02d", $minutes, $seconds);
    return $timeFormatted;
}

?>