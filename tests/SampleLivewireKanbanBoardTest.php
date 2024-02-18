<?php

namespace Mantix\LivewireKanbanBoard\Tests;

use Livewire\Features\SupportTesting\Testable;
use Mantix\LivewireKanbanBoard\Tests\Stubs\SampleLivewireKanbanBoard;
use Livewire\Livewire;

class SampleLivewireKanbanBoardTest extends TestCase {
    private function createComponent($parameters = []): Testable {
        return Livewire::test(SampleLivewireKanbanBoard::class, $parameters);
    }

    /** @test */
    public function can_build_component() {
        //Arrange

        //Act
        $component = $this->createComponent();

        //Assert
        $this->assertNotNull($component);

        //$this->assertTrue($component->statuses()->pluck('id')->contains('todo'));
        /*$this->assertCount(
            1,
            $component->statuses()->where('id', 'todo')->first()['records']
        );*/

        //$this->assertTrue($component->statuses()->pluck('id')->contains('completed'));
        /*$this->assertCount(
            2,
            $component->entangled('statuses')->where('id', 'completed')->first()['records']
        );*/
    }

    /** @test */
    public function should_call_record_click() {
        //Arrange
        $component = $this->createComponent([
            'recordClickEnabled' => true,
        ]);

        $this->assertFalse($component->entangled('recordClicked'));

        //Act
        $component->runAction('onRecordClick', $component->entangled('statuses')->get(0)['records'][0]['id']);

        //Assert
        $this->assertTrue($component->entangled('recordClicked'));
    }

    /** @test */
    public function should_trigger_onStatusSorted() {
        //Arrange
        $component = $this->createComponent();

        $this->assertFalse($component->entangled('statusSortedCalled'));

        //Act
        $component->runAction('onStatusSorted', null, null, null);

        //Assert
        $this->assertTrue($component->entangled('statusSortedCalled'));
    }

    /** @test */
    public function should_trigger_onStatusChanged() {
        //Arrange
        $component = $this->createComponent();

        $this->assertFalse($component->entangled('statusChangedCalled'));

        //Act
        $component->runAction('onStatusChanged', null, null, null, null);

        //Assert
        $this->assertTrue($component->entangled('statusChangedCalled'));
    }
}
