<?php

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    public function add($numbers)
    {
        $numbers = $this->parseNumbers($numbers);

        return array_sum(array_map(function ($number){

            $this->guardAgainstInvalidNumber($number);

            if ($number >= self::MAX_NUMBER_ALLOWED) {
                return 0;
            }

            return $number;
        }, $numbers));
    }

    /**
     * @param $number
     */
    public function guardAgainstInvalidNumber($number)
    {
        if ($number < 0) {
            throw new InvalidArgumentException('Invalid number provided: ' . $number);
        }
    }

    /**
     * @param $numbers
     * @return array[]
     */
    public function parseNumbers($numbers)
    {
        $numbers =  preg_split('/\s*(,|\\\n)\s*/', $numbers);
        return array_map('intval', $numbers);
    }
}
