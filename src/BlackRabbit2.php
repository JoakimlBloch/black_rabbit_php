<?php

class BlackRabbit2 {

    /**
     * return a php array, that contains the amount of each type of coin, required to fulfill the amount.
     * The returned array should use as few coins as possible.
     * The coins available for use is: 1, 2, 5, 10, 20, 50, 100
     * You can assume that $amount will be an int
     */
    public function findCashPayment($amount) {
        $coins = [100, 50, 20, 10, 5, 2, 1];
        $result = [
            "1" => 0,
            "2" => 0,
            "5" => 0,
            "10" => 0,
            "20" => 0,
            "50" => 0,
            "100" => 0,
        ];

        foreach ($coins as $coin) {
            if ($amount >= $coin) {
                $count = intdiv($amount, $coin);
                $result[(string)$coin] = $count;
                $amount -= $count * $coin;
            }
        }

        return $result;
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
    public function findCashPaymentBonus($amount) {
        $coins = [20, 10, 8, 5, 1];
        $result = [];
        foreach ($coins as $coin) {
            $result[(string)$coin] = 0;
        }

        $dp = array_fill(0, $amount + 1, PHP_INT_MAX);
        $dp[0] = 0;

        $track = array_fill(0, $amount + 1, -1);

        for ($i = 1; $i <= $amount; $i++) {
            foreach ($coins as $coin) {
                if ($i >= $coin && $dp[$i - $coin] + 1 < $dp[$i]) {
                    $dp[$i] = $dp[$i - $coin] + 1;
                    $track[$i] = $coin;
                }
            }
        }

        if ($dp[$amount] == PHP_INT_MAX) {
            return $result;
        }

        while ($amount > 0) {
            $coin = $track[$amount];
            $result[(string)$coin]++;
            $amount -= $coin;
        }

        return $result;
    }
}

    $blackRabbit2 = new BlackRabbit2();

    // Normal
    $normal = $blackRabbit2->findCashPayment(26);
    print_r($normal);

    // Bonus
    $bonus = $blackRabbit2->findCashPaymentBonus(24);
    print_r($bonus);
