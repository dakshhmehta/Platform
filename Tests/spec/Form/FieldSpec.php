<?php

namespace spec\Modules\Rarv\Form;

use Modules\Rarv\Form\Field;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class FieldSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Field::class);
    }

    public function let()
    {
    	$this->beConstructedWith('name', 'type');
    }

    public function it_can_have_name()
    {
    	$this->setName('name')->getName()->shouldBe('name');
    }

    public function it_can_have_type()
    {
    	$this->setType('normalInput')->getType()->shouldBe('normalInput');
    }

    public function it_can_only_accepts_the_valid_macro_fields()
    {
    	$this->shouldThrow()->duringSetType('foo');
    }
}
