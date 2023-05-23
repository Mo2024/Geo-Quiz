<?php

function getBg($choice, $answer){
    if($answer == $choice ){return "bg-success";}
    else{return "bg-danger";}
}

function getSvg($userAnswer, $answer){
    if($answer == $userAnswer ){return '<img style="height:30px; width:30px;" src="/ITCS333-Project/public/333 Icons-Fonts-Colors/check-svgrepo-com.svg" alt="Check SVG">';}
    else{return '<img style="height:30px; width:30px;" src="/ITCS333-Project/public/333 Icons-Fonts-Colors/wrong-svgrepo-com.svg" alt="Check SVG">';}
}


?>