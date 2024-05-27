<div>
    <div>
        @includeIf($beforeKanbanBoardView)
    </div>

    <div class="{{ $styles['kanbanWrapper'] }}">
        @foreach ($statuses as $status)
            @include($statusView, [
                'status' => $status,
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
