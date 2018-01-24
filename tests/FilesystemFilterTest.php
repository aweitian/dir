<?php


use Aw\Filesystem\Condition;
use Aw\Filesystem\Filter;

class FilesystemFilterTest extends PHPUnit_Framework_TestCase
{
	/**
	* A basic test example.
	*
	* @return void
	*/
	public function testx()
	{
		$ret = Filter::filterRecursive(__DIR__.'/aaaa',function ($path){
		    if (substr($path,-4,4) == ".txt")
		        return true;
        });
        $ret = Filter::filterEndswith(__DIR__."/aaaa",'.js', Condition::create()
            ->setReturnBasename());
        $this->assertArraySubset(array("aaa.js"),$ret);
        $ret = Filter::filterEndswith(__DIR__."/aaaa",'.txt',Condition::create()
            ->setExcept(array('ba')) ->setReturnBasename(),true);
        $this->assertArraySubset(array("a.txt"),$ret);
        $ret = Filter::filterEndswith(__DIR__."/aaaa",'.txt',Condition::create()
            ->setOnly(array('ba'))->setReturnFilename(),true);
        $this->assertArraySubset(array("ba"),$ret);

        $ret = Filter::getDirectories(__DIR__."/aaaa",Condition::create()
            ->setReturnFilename(),true);
        $this->assertArraySubset(array("aaa","bbb","ddd","da"),$ret);

        $ret = Filter::getDirectories(__DIR__."/aaaa",Condition::create()
            ->setReturnFilename());
        $this->assertArraySubset(array("aaa","bbb","ddd"),$ret);

	}
}


