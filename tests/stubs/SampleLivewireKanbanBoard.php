<?php

namespace Mantix\LivewireKanbanBoard\Tests\Stubs;

use Mantix\LivewireKanbanBoard\LivewireKanbanBoard;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Uuid;

class SampleLivewireKanbanBoard extends LivewireKanbanBoard {
    use WithFaker;

    public $recordClicked = false;
    public $statusSortedCalled = false;
    public $statusChangedCalled = false;

    public function statuses(): Collection {
        return collect([
            [
                'id' => 'todo',
                'title' => 'To Do',
            ],
            [
                'id' => 'completed',
                'title' => 'Completed',
            ],
        ]);
    }

    public function records(): Collection {
        $this->setUpFaker();

        return collect([
            [
                'id' => Uuid::uuid4()->toString(),
                'status' => 'todo',
                'title' => $this->faker->name,
                'clicked' => false,
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'status' => 'completed',
                'title' => $this->faker->name,
                'clicked' => false,
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'status' => 'completed',
                'title' => $this->faker->name,
                'clicked' => false,
            ],
        ]);
    }

    public function onRecordClick($recordId) {
        $this->recordClicked = true;
    }

    public function onStatusSorted($recordId, $statusId, $orderedIds) {
        $this->statusSortedCalled = true;
    }

    public function onStatusChanged($recordId, $statusId, $fromOrderedIds, $toOrderedIds) {
        $this->statusChangedCalled = true;
    }
}
