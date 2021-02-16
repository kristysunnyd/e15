<?php

function isPalindrome($inputString)
{
}

function isBigWord($inputString)
{
    return strlen($inputString) > 7;
    // if(strlen($inputString) > 7) {
    //     return true;
    // } else {
    //     return false;
    // }
}

$inputString = 'cat';

$isBigWord = isBigWord($inputString);

require 'index-view.php';
