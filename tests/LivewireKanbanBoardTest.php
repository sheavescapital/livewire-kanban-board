<?php

namespace SheavesCapital\LivewireKanbanBoard\Tests;

use Livewire\Features\SupportTesting\Testable;
use Livewire\Livewire;
use SheavesCapital\LivewireKanbanBoard\LivewireKanbanBoard;

class LivewireKanbanBoardTest extends TestCase {
    private function createComponent($parameters = []): Testable {
        return Livewire::test(LivewireKanbanBoard::class, $parameters);
    }

    /** @test */
    public function can_build_component() {
        //Arrange

        //Act
        $component = $this->createComponent([]);

        //Assert
        $this->assertNotNull($component);
    }
}
