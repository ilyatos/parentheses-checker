<?php

namespace Ilyatos\Parentheses;

use Ilyatos\Parentheses\Exceptions\InvalidSentenceException;

class Checker implements CheckerInterface
{
    private const ALLOWED_CHARS = '()\r\n\t\s';
    private const OPENING_PARENTHESIS = '(';
    private const CLOSING_PARENTHESIS = ')';

    /**
     * Check if sentence contains correct number of opening and closing parentheses
     *
     * @param string $sentence
     *
     * @return bool
     *
     * @throws InvalidSentenceException
     */
    public function check(string $sentence): bool
    {
        if (!$this->isValid($sentence)) {
            throw new InvalidSentenceException('Sentence contains not allowed characters');
        }

        return $this->isCorrect($sentence);
    }

    /**
     * @param string $sentence
     *
     * @return bool
     */
    private function isCorrect(string $sentence): bool
    {
        $sentenceAsArray = str_split($sentence);

        $parenthesisCounter = 0;

        foreach ($sentenceAsArray as $char) {
            if ($char === self::OPENING_PARENTHESIS) {
                $parenthesisCounter++;
            } elseif ($char === self::CLOSING_PARENTHESIS) {
                $parenthesisCounter--;
            }

            if ($parenthesisCounter < 0) {
                return false;
            }
        }

        return $parenthesisCounter === 0;
    }

    /**
     * @param string $sentence
     *
     * @return bool
     */
    private function isValid(string $sentence): bool
    {
        return preg_match(sprintf('/^([%s]*)$/', self::ALLOWED_CHARS), $sentence);
    }
}