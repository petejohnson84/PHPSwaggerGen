<?php

class UtilTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @covers SwaggerGen\Util::words_shift
	 */
	public function testWords_shift()
	{
		$text = 'quite a few words';

		$this->assertSame('quite', SwaggerGen\Util::words_shift($text));
		$this->assertSame('a few words', $text);

		$this->assertSame('a', SwaggerGen\Util::words_shift($text));
		$this->assertSame('few words', $text);

		$this->assertSame('few', SwaggerGen\Util::words_shift($text));
		$this->assertSame('words', $text);

		$this->assertSame('words', SwaggerGen\Util::words_shift($text));
		$this->assertSame('', $text);

		$this->assertSame(false, SwaggerGen\Util::words_shift($text));
		$this->assertSame('', $text);
	}

	/**
	 * @covers SwaggerGen\Util::words_shift
	 */
	public function testWords_shift_whitespace()
	{
		$text = "    quite  a\nfew   \r  \n\r words \t";

		$this->assertSame('quite', SwaggerGen\Util::words_shift($text));
		$this->assertSame('a', SwaggerGen\Util::words_shift($text));
		$this->assertSame('few', SwaggerGen\Util::words_shift($text));
		$this->assertSame('words', SwaggerGen\Util::words_shift($text));
		$this->assertSame(false, SwaggerGen\Util::words_shift($text));
		$this->assertSame('', $text);
	}

}