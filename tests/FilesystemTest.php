<?php
class FilesystemTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		
	}
	public function tearDown()
	{
		\Tian\Filesystem::delDir(__dir__."/examples");
	}
	/**
	* A basic test example.
	*
	* @return void
	*/
	public function test()
	{
		\Tian\Filesystem::createDir(__dir__."/examples");
		$this->assertFileExists(__dir__."/examples","ok");
		\Tian\Filesystem::createDir(__dir__."/examples/aa");
		$this->assertFileExists(__dir__."/examples/aa","ok");
		
		\Tian\Filesystem::touch(__dir__."/examples/aa/qq");
		$this->assertFileExists(__dir__."/examples/aa/qq","ok");
		
		\Tian\Filesystem::copyDir(__dir__."/examples",__dir__."/balabala");
		$this->assertFileExists(__dir__."/balabala/aa/qq","ok");
		
		
		\Tian\Filesystem::delDir(__dir__."/balabala");
		$this->assertFileNotExists(__dir__."/balabala");
	}
}


