<?php
// Function to sort translations alphabetically
function sortTranslations($translations) {
    $sortedTranslations = $translations;
    ksort($sortedTranslations);
    return $sortedTranslations;
}

// Function to read translation file and return translations as an array
function readTranslations($filename) {
    $translations = array();

    $lines = file($filename);
    foreach ($lines as $line) {
        // Ignore empty lines and comments
        if (trim($line) !== '' && strpos(trim($line), '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $translations[trim($key)] = trim($value);
        }
    }

    return $translations;
}

// Function to write sorted translations to a new file
function writeSortedTranslations($filename, $sortedTranslations) {
    $file = fopen($filename, 'w');
    foreach ($sortedTranslations as $key => $value) {
        fwrite($file, "$key=$value\n");
    }
    fclose($file);
}

// Define the translation file path
$translationFile = 'path/to/translation.properties';

// Read translations from the file
$translations = readTranslations($translationFile);

// Sort translations
$sortedTranslations = sortTranslations($translations);

// Define the new file path for sorted translations
$newTranslationFile = 'path/to/sorted_translation.properties';

// Write sorted translations to a new file
writeSortedTranslations($newTranslationFile, $sortedTranslations);

// Output success message
echo 'Translations sorted successfully!';
?>