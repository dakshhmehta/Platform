<?php

namespace spec\Modules\Rarv\Table;

use Illuminate\View\View;
use Modules\Page\Repositories\PageRepository;
use Modules\Rarv\Table\Table;
use Modules\Rarv\Table\TableBuilder;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class TableBuilderSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TableBuilder::class);
    }

    public function table()
    {
    	return (new Table('faq'))
    		->setRepository(PageRepository::class) // Fake repository to passes test
    		->addColumn('question');
    }

    public function it_can_set_get_table()
    {
    	$this->setTable($this->table())->getTable()->shouldBeAnInstanceOf(Table::class);
    }

    public function it_cant_be_viewed_without_setting_a_table()
    {
    	$this->shouldThrow()->duringView();
    }

    public function it_can_be_viewed()
    {
    	$this->setTable($this->table())->view()->shouldBeAnInstanceOf(View::class);
    }

    public function it_can_return_valid_header()
    {
    	$this->setTable($this->table())->getHeaders()
    		->shouldBe(['faq::faqs.table.columns.question']);
    }
}
