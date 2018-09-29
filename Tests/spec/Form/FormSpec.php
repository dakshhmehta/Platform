<?php

namespace spec\Modules\Rarv\Form;

use Modules\Rarv\Form\Field;
use Modules\Rarv\Form\Form;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class FormSpec extends LaravelObjectBehavior
{
    public function let()
    {
    	$this->beConstructedWith('faq');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Form::class);
    }

    public function it_has_defined_module()
    {
    	$this->getModule()->shouldBeString();
    }

    public function it_can_define_module()
    {
    	$this->setModule('faq')->getModule()->shouldBe('faq');
    }

    public function it_can_set_get_field()
    {
    	$questionField = new Field('question', 'normalInput');
    	$this->setField($questionField)->getField('question')->getName()->shouldBe('question');

    	$this->setField('question', 'normalInput')
    		->getField('question')->getName()->shouldBe('question');
    }

    public function it_can_set_get_fields()
    {
		$questionField = new Field('question', 'normalInput');
		$answerField = new Field('answer', 'normalTextarea');
    	$this->setFields([
    		$questionField,
    		$answerField
    	])->getFields()->shouldHaveCount(2);
    }

    public function it_has_boot_method()
    {
    	$this->boot()->shouldReturn(true);
    }
}
