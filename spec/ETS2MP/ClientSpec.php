<?php namespace spec\ETS2MP;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{
    protected $testData = "
        [
            {
                id: \"1\",
                name: \"Europe #1\",
                shortname: \"EU #1\",
                online: \"1\",
                players: \"2183\"
            },
            {
                id: \"3\",
                name: \"United states #1\",
                shortname: \"US #1\",
                online: \"1\",
                players: \"46\"
            },
            {
                id: \"4\",
                name: \"Europe #2 - Freeroam\",
                shortname: \"EU #2 FR\",
                online: \"1\",
                players: \"189\"
            }
        ]
    ";

    function let()
    {
        $mock = \Mockery::mock('\GuzzleHttp\Client');
        $mock->shouldReceive('get')->once()->andReturn($this->testData);
        $this->beConstructedWith($mock);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ETS2MP\Client');
    }

    function it_can_contact_api()
    {
        $this->getServers()->shouldReturn($this->testData);
    }

}
