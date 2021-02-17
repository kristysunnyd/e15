<!doctype html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <title>e15 Project 1</title>
    <link href="styles/site.css" rel="stylesheet">
</head>

<body>
    <h1>e15 Project 1</h1>
    <h3>By: Kristy Sun</h3>

    <p class="description"> Type your desired text below to see if it is a Palindrome and how many vowels and
        consonants
        are in the text you provided.
    </p>

    <div class="formsubmit">
        <form method='GET' action='process.php'>

            <input type='text' name='inputString' placeholder='Enter text here!' required>

            <button type='submit' id='submitbutton'>Process</button>
        </form>
    </div>


    <?php if (isset($inputString)): ?>
    <div class="results">
        <h2>Results</h2>

        <h3>Text:</h3>
        <p id='text'>
            <?php echo $inputString ?>
        </p>

        <h3>Is the word a Palindrome?:</h3>
        <p>
            <?php if ($isPalindrome) { ?>
            Yes
            <?php } else { ?>
            No
            <?php } ?>
        </p>

        <h3>Vowel Count:</h3>
        <p>
            <?php echo $vowelCount ?>
        </p>

        <h3>Consonant Count:</h3>
        <p>
            <?php echo $consonantsCount ?>
        </p>
    </div>
    <?php endif ?>


</body>

</html>