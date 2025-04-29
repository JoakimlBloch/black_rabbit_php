<?php

class BlackRabbit {

    public function findMedianLetterInFile($filePath) {
        $letters = $this->parseFile($filePath);
        $result = $this->findMedianLetter($letters);
        return array("letter" => $result['letter'], "count" => $result['count']);
    }

    /**
     * Parse the input file for letters.
     * @param $filePath
     */
    public function parseFile($filePath) {
        $content = file_get_contents($filePath);

        $content = preg_replace('/[^a-zA-Z]/', '', $content);

        $letters = str_split(strtolower($content));

        return $letters;
    }

    /**
     * Return the letter whose occurrences are the median.
     * @param array $parsedFile
     * @return array
     */
    public function findMedianLetter($parsedFile) {
        $counts = array_count_values($parsedFile);
    
        // Debug output
        echo "Counts før sortering:\n";
        print_r($counts);
    
        uksort($counts, function($a, $b) use ($counts) {
            if ($counts[$a] === $counts[$b]) {
                return strcmp($a, $b);
            }
            return $counts[$a] <=> $counts[$b];
        });
    
        // Debug output
        echo "Counts efter sortering:\n";
        print_r($counts);
    
        $values = array_values($counts);
        $keys = array_keys($counts);
    
        $count = count($values);
        $middleIndex = floor(($count - 1) / 2);
    
        $medianLetter = $keys[$middleIndex];
        $occurrences = $values[$middleIndex];
    
        // Debug output
        echo "Median letter: $medianLetter with count: $occurrences\n";
    
        return array('letter' => $medianLetter, 'count' => $occurrences);
    }
}

$blackRabbit = new BlackRabbit();
$median = $blackRabbit->findMedianLetterInFile('../txt/text1.txt');
$median2 = $blackRabbit->findMedianLetterInFile('../txt/text2.txt');
$median3 = $blackRabbit->findMedianLetterInFile('../txt/text3.txt');
$median4 = $blackRabbit->findMedianLetterInFile('../txt/text4.txt');
$median5 = $blackRabbit->findMedianLetterInFile('../txt/text5.txt');
echo "Median for text 1: \n";
print_r($median);
echo "Median for text 2: \n";
print_r($median2);
echo "Median for text 3: \n";
print_r($median3);
echo "Median for text 4: \n";
print_r($median4);
echo "Median for text 5: \n";
print_r($median5);

$blackRabbit = new BlackRabbit();
$letters = $blackRabbit->parseFile('../txt/text5.txt');
$blackRabbit->findMedianLetter($letters);
