<?php

namespace Ilyatos\Parentheses\Tests;

use Ilyatos\Parentheses\Exceptions\InvalidSentenceException;
use PHPUnit\Framework\TestCase;
use Ilyatos\Parentheses\Checker;

class CheckerTest extends TestCase
{
    /**
     * @var Checker
     */
    private $checker;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->checker = new Checker();
    }

    /**
     * @dataProvider checkProvider
     *
     * @param string $sentence
     * @param bool $expected
     *
     * @return void
     */
    public function testCheck(string $sentence, bool $expected): void
    {
        $this->assertEquals($expected, $this->checker->check($sentence));
    }

    /**
     * @return array
     */
    public function checkProvider(): array
    {
        return [
            ['()', true],
            ['() ((()))', true],
            ['))((', false],
            ['  ()((    ))', true],
            ['()((((()))))', true],
            ['(()))(( )))))', false]
        ];
    }

    /**
     * @dataProvider checkExceptionProvider
     *
     * @param string $sentence
     *
     * @return void
     */
    public function testCheckException(string $sentence): void
    {
        $this->expectException(InvalidSentenceException::class);
        $this->checker->check($sentence);
    }

    /**
     * @return array
     */
    public function checkExceptionProvider()
    {
        return [
            ['123'],
            ['()()a'],
            ['[]']
        ];
    }
}
