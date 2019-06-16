<?php

namespace Ilyatos\Parentheses;

interface CheckerInterface
{
    /**
     * @param string $sentence
     *
     * @return bool
     */
    public function check(string $sentence): bool;
}