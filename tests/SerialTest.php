<?php

namespace duncan3dc\Serial;

class SerialTest extends \PHPUnit_Framework_TestCase
{

    public function testToArray()
    {
        $data = ["one" => 1, "two" => 2];
        $this->assertSame($data, (new Serial($data))->toJson()->fromJson()->toArray());
    }


    public function testToArrayConverting()
    {
        $data = ["one" => 1, "two" => 2];
        $this->assertSame($data, (new Serial($data))->toJson()->toArray());
    }


    public function testMultipleFormats()
    {
        $data = ["one" => 1, "two" => 2];
        $this->assertSame($data, (new Serial($data))->toJson()->toYaml()->toArray());
    }


    public function testExtraMethods()
    {
        $data = ["one" => 1, "two" => 2];
        $this->assertSame($data, (new Serial($data))->toJson()->toYaml()->fromYaml()->toArray());
    }


    public function testJsonInit()
    {
        $data = '{"one":1}';
        $this->assertSame($data, (new Serial($data))->fromJson()->toYaml()->toJson()->__toString());
    }


    public function testYamlInit()
    {
        $data = "one: 1\n";
        $this->assertSame($data, (new Serial($data))->fromYaml()->toJson()->toYaml()->__toString());
    }
}
