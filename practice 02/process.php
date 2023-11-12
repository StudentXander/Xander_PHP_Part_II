<?php
// Function to tokenize the input text into words
function tokenizeText($inputText) {
    // Use regular expression to extract words
    preg_match_all('/\b\w+\b/', $inputText, $matches);
    return $matches[0];
}



// Function to calculate word frequencies, ignoring common stop words
function calculateWordFrequencies($words, $stopWords) {
    // Ensure $words is an array
    if (!is_array($words)) {
        return [];
    }

    // Ensure $stopWords is an array
    if (!is_array($stopWords)) {
        return [];
    }

    // Filter out stop words
    $filteredWords = array_diff($words, $stopWords);

    // Ensure $filteredWords is an array
    if (!is_array($filteredWords)) {
        return [];
    }

    // Calculate word frequencies
    $wordFrequencies = array_count_values($filteredWords);
    arsort($wordFrequencies);

    return $wordFrequencies;
}

// Function to display the word frequencies
function displayWordFrequencies($wordFrequencies, $limit) {
    // Check if $wordFrequencies is an array
    if (!is_array($wordFrequencies)) {
        echo "No word frequencies to display.";
        return;
    }

    $counter = 0;
    foreach ($wordFrequencies as $word => $frequency) {
        echo "$word: $frequency<br>";
        $counter++;
        if ($counter >= $limit) {
            break;
        }
    }
}


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input text from the textarea
    $inputText = $_POST['inputText'];

    // Define common stop words
    $stopWords = ["the", "and", "in", /* add more stop words */];

    // Tokenize the text
    $words = tokenizeText($inputText);

    // Calculate word frequencies
    $wordFrequencies = calculateWordFrequencies($words, $stopWords);

    // Get sorting order from the form
    $sortOrder = ($_POST['sortOrder'] === 'asc') ? SORT_ASC : SORT_DESC;

    // Sort the word frequencies
    $wordFrequencies = arsort($wordFrequencies, $sortOrder);

    // Get the limit from the form
    $limit = (int)$_POST['limit'];

    // Display the word frequencies
    displayWordFrequencies($wordFrequencies, $limit);
}
?>
