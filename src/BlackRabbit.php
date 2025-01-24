<?php

class BlackRabbit
{
    public function findMedianLetterInFile($filePath)
    {
        return array("letter"=>$this->findMedianLetter($this->parseFile($filePath),$occurrences),"count"=>$occurrences);
    }

    /**
     * Parse the input file for letters.
     * @param $filePath
     */
    private function parseFile($filePath) {
        $fileContent = file_get_contents($filePath); # Reading the file content via filePath parameter specified in function
        $contentConvertToLowerCase = strtolower($fileContent); # Converting to lowercase for better consistency with letter count
        $letterCount = array_count_values(str_split(preg_replace("/[^a-z]/", "", $contentConvertToLowerCase))); # Replacing all characters that doesn't match my regEx, containing lowercase letters, with an empty string
        
        # Check if any letters are counted from file as error handling
        if (!empty($letterCount)) {
            return $letterCount; # Returns an array containing letters as keys and values as their respective counts   
        }
        else {
            return null; # Returns null if file contains no letters from regEx
        }
    }

    /**
     * Return the letter whose occurrences are the median.
     * @param $parsedFile
     * @param $occurrences
     */
    private function findMedianLetter($parsedFile, &$occurrences) {
        asort($parsedFile); # Arrange letters according to count from low to high
        $values = array_values($parsedFile); # Get values only from sorted list leaving out the keys or letters
        $medianIndex = floor(count($values) / 2); # Get middle index from sorted count values
        $occurrences = $values[$medianIndex]; # Get median value from medianIndex
        $medianLetters = array_keys($parsedFile, $occurrences); # Find letter(s) with this count
        return $medianLetters[0]; # Simply return the first in case there are multiple medians

        # Would be possible to return multiple letters, but method findMedianLetterInFile specifies only one letter is wanted
    }
}
