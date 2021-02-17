<?php
session_start();

function lowercaseString($inputString) //function to convert the string to lowercase and ignores all non-alphabetic symboles and numbers
{
    $inputStringLower = strtolower($inputString); // converts the string to all lowercase so that the comparison can be made

    $inputStringLower = preg_replace('/[^a-z0-9]/i', '', $inputStringLower); //to replace all non-alphabetic symbols and ignore them

    return $inputStringLower;
}

function isPalindrome($inputStringLower) // the function to test whether the string is a palindrome or not
{
    return $inputStringLower == strrev($inputStringLower); // comparing the word with the word spelt backwards to see if it is a palindrome
}

function vowelCount($inputStringLower) //the function to count the number of vowels in the string
{
    $count = 0;

    // the for loop that will go through the string to search for any vowels and count them
    for ($i = 0; $i < strlen($inputStringLower); $i++) {
        if ($inputStringLower[$i] == 'a' || $inputStringLower[$i] == 'e' || $inputStringLower[$i] == 'i' || $inputStringLower[$i] == 'o' || $inputStringLower[$i] == 'u') {
            $count = $count + 1;
        }
    }

    return $count;
}

function consonantsCount($inputStringLower) // the function to count the number of consonants in the string
{
    $consonants = strlen($inputStringLower) - vowelCount($inputStringLower);

    return $consonants;
}


$inputString = $_GET['inputString']; //Form Input

$inputStringLower = lowercaseString($inputString);


// String Processing Functions

$isPalindrome = isPalindrome($inputStringLower);

$vowelCount = vowelCount($inputStringLower);

$consonantsCount = consonantsCount($inputStringLower);


// Results
$_SESSION['results'] = [
    'inputString' => $inputString,
    'isPalindrome' => $isPalindrome,
    'vowelCount' => $vowelCount,
    'consonantsCount' => $consonantsCount,
];

header('Location: index.php'); //redirect back to index.php
