<?php

/* Nous récupérons une image sur internet
que nous découpons en 52 cartes à jouer */

// Nom du fichier image source

$source = 'classic-playing-cards.jpg';

$imgSource = imagecreatefromjpeg($source);

$largeurSource = imagesx($imgSource);
$hauteurSource = imagesy($imgSource);

$largeurCarte = round($largeurSource/13);
$hauteurCarte = round($hauteurSource/4);


for($i=0; $i<13; $i++) {
    for($j=0; $j<4; $j++) {
        $imgCible = imagecreate($largeurCarte,$hauteurCarte);
        imagecopy($imgCible,$imgSource,0,0,$i*$largeurCarte,$j*$hauteurCarte,$largeurCarte,$hauteurCarte);
        
        switch($j) {
            case 0:
                $color = 'clubs';
                break;
            case 1:
                $color = 'spade';
                break;
            case 2:
                $color = 'heart';
                break;
            case 3:
                $color = 'diamond';
                break;
        }
        switch($i) {
            case 0:
                $number = 'Ace';
                break;
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
                $number = $i+1;
                break;
            case 10:
                $number = 'Jack';
                break;
            case 11:
                $number = 'Queen';
                break;
            case 12:
                $number = 'King';
                break;
        }
        $nomCarte = $color.$number;
        
        imagejpeg($imgCible,'cards/'.$nomCarte.'.jpg',100);        
    }
}


for($j=0; $j<4; $j++) {
    for($i=0; $i<13; $i++) {
        switch($j) {
            case 0:
                $color = 'clubs';
                break;
            case 1:
                $color = 'spade';
                break;
            case 2:
                $color = 'heart';
                break;
            case 3:
                $color = 'diamond';
                break;
        }
        switch($i) {
            case 0:
                $number = 'Ace';
                break;
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
                $number = $i+1;
                break;
            case 10:
                $number = 'Jack';
                break;
            case 11:
                $number = 'Queen';
                break;
            case 12:
                $number = 'King';
                break;
        }
        $nomCarte = $color.$number;
        
        echo '<img src="cards/'.$nomCarte.'.jpg">';
    }
    echo '<br>';
}