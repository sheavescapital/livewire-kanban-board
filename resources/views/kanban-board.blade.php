<div>
    <div>
        @includeIf($beforeKanbanBoardView)
    </div>

    <div class="{{ $styles['kanbanWrapper'] }}">
        @foreach ($swimlanes as $swimlane)
            @include($swimlaneView, [
                'swimlane' => $swimlane,
            ])
        @endforeach
    </div>

    <div>
        @includeIf($afterKanbanBoardView)
    </div>

    <div wire:ignore>
        @includeWhen($sortable, 'livewire-kanban-board::sortable', [
            'sortable' => $sortable,
            'sortableBetweenStatuses' => $sortableBetweenStatuses,
        ])
    </div>
</div>
