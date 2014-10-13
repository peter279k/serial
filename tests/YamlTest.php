<?php

namespace duncan3dc\Serial;

class YamlTest extends \PHPUnit_Framework_TestCase
{

    public function testEncodeEmpty1()
    {
        $this->assertSame("", Yaml::encode(null));
    }
    public function testEncodeEmpty2()
    {
        $this->assertSame("", Yaml::encode([]));
    }
    public function testEncodeEmpty3()
    {
        $this->assertSame("0", Yaml::encode(0));
    }
    public function testEncodeEmpty4()
    {
        $this->assertSame("''", Yaml::encode(""));
    }


    public function testEncodeString1()
    {
        $this->assertSame("test", Yaml::encode("test"));
    }


    public function testEncodeArray1()
    {
        $this->assertSame("one: 1\n", Yaml::encode(["one" => 1]));
    }
    public function testEncodeArray2()
    {
        $this->assertSame("one: '1'\n", Yaml::encode(["one" => "1"]));
    }


    public function testDecodeEmpty1()
    {
        $this->assertSame([], Yaml::decode(null));
    }
    public function testDecodeEmpty2()
    {
        $this->assertSame([], Yaml::decode(""));
    }
    public function testDecodeEmpty3()
    {
        $this->assertSame([], Yaml::decode(0));
    }
    public function testDecodeEmpty4()
    {
        $this->assertSame([], Yaml::decode("0"));
    }


    public function testDecodeString1()
    {
        $this->assertSame("test", Yaml::decode('"test"'));
    }


    public function testDecodeArray1()
    {
        $this->assertSame(["one" => 1], Yaml::decode("one: 1"));
    }
    public function testDecodeArray2()
    {
        $this->assertSame(["one" => "1"], Yaml::decode("one: '1'"));
    }
}
