<?php

class BlackRabbit2
{
    /**
     * return a php array, that contains the amount of each type of coin, required to fulfill the amount.
     * The returned array should use as few coins as possible.
     * The coins available for use is: 1, 2, 5, 10, 20, 50, 100
     * You can assume that $amount will be an int
     */
    public function findCashPayment($amount) {
        $coins = [100, 50, 20, 10, 5, 2, 1]; # Init array of available coins in descending order to make loop check them from big to small values respectively
        $result = []; # Init empty array to store results
        
        foreach ($coins as $coin) {
            if ($amount >= $coin) {
                $count = intdiv($amount, $coin); # Get how many coins of each is needed
                $amount -= $count * $coin; # Subtract the total value of said coin from the amount before moving on to the next if needed
                
                if ($count >= 0) {
                    $result[$coin] = $count; # Append count of how many times each coin was used in result array
                }
            }
        }

        return result; # Return array of coin results
    }

	/** * * * * * * 
	 * BONUS TASK *
	 ** * * * * * *
	 *
	 * Now assume that the available coins are: 1, 5, 8, 10. 20. 
	 * Does your solution still work?
	 * What if $amount is 24?
	 *
	 */
	
    # Here's the bonus method where i've copied the same code with the array coins changed to the new values
    # The problem being that, as the example mentions, if the amount was 24 it would take 20*1 and 1*4 instead of 8*3 with this method
    # This happens because the method is set up to handle the coins values from highest to lowest 
    # It's checking if it's subtractable from highest number down rather than if it's the most efficient method to find least coins as possible
     public function findCashPaymentBonus($amount) {
        $coins = [20, 10, 8, 5, 1]; # Init array of available coins in descending order to make loop check them from big to small values respectively
        $result = []; # Init empty array to store results
        
        foreach ($coins as $coin) {
            if ($amount >= $coin) {
                $count = intdiv($amount, $coin); # Get how many coins of each is needed
                $amount -= $count * $coin; # Subtract the total value of said coin from the amount before moving on to the next if needed
                
                if ($count >= 0) {
                    $result[$coin] = $count; # Append count of how many times each coin was used in result array
                }
            }
        }

        return result; # Return array of coin results
    }
}
