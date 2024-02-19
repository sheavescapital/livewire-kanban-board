<?php

namespace Mantix\LivewireKanbanBoard;

use Illuminate\Support\Collection;
use Livewire\Component;

/**
 * Class LivewireKanbanBoard
 * @package Mantix\LivewireKanbanBoard
 * @property boolean $sortable
 * @property boolean $sortableBetweenStatuses
 * @property string $statusBoardView
 * @property string $statusView
 * @property string $statusHeaderView
 * @property string $statusFooterView
 * @property string $recordView
 * @property string $recordContentView
 * @property string $sortableView
 * @property string $beforeStatusBoardView
 * @property string $afterStatusBoardView
 * @property string $ghostClass
 * @property boolean $recordClickEnabled
 */
class LivewireKanbanBoard extends Component {
    public $sortable;
    public $sortableBetweenStatuses;

    public $statusBoardView;
    public $statusView;
    public $statusHeaderView;
    public $statusFooterView;
    public $recordView;
    public $recordContentView;
    public $sortableView;
    public $beforeStatusBoardView;
    public $afterStatusBoardView;

    public $ghostClass;

    public $recordClickEnabled;

    public function mount(
        $sortable = false,
        $sortableBetweenStatuses = false,
        $statusBoardView = null,
        $statusView = null,
        $statusHeaderView = null,
        $statusFooterView = null,
        $recordView = null,
        $recordContentView = null,
        $sortableView = null,
        $beforeStatusBoardView = null,
        $afterStatusBoardView = null,
        $ghostClass = null,
        $recordClickEnabled = false,
        $extras = []
    ) {
        $this->sortable = $sortable ?? false;
        $this->sortableBetweenStatuses = $sortableBetweenStatuses ?? false;

        $this->statusBoardView = $statusBoardView ?? 'livewire-kanban-board::kanban-board';
        $this->statusView = $statusView ?? 'livewire-kanban-board::status';
        $this->statusHeaderView = $statusHeaderView ?? 'livewire-kanban-board::status-header';
        $this->statusFooterView = $statusFooterView ?? 'livewire-kanban-board::status-footer';
        $this->recordView = $recordView ?? 'livewire-kanban-board::record';
        $this->recordContentView = $recordContentView ?? 'livewire-kanban-board::record-content';
        $this->sortableView = $sortableView ?? 'livewire-kanban-board::sortable';
        $this->beforeStatusBoardView = $beforeStatusBoardView ?? null;
        $this->afterStatusBoardView = $afterStatusBoardView ?? null;

        $this->ghostClass = $ghostClass ?? 'bg-primary-subtle';

        $this->recordClickEnabled = $recordClickEnabled ?? false;

        $this->afterMount($extras);
    }

    public function afterMount($extras = []) {
        //
    }

    public function statuses(): Collection {
        return collect();
    }

    public function records(): Collection {
        return collect();
    }

    public function isRecordInStatus($record, $status) {
        return $record['status'] == $status['id'];
    }

    public function onStatusSorted($recordId, $statusId, $orderedIds) {
        //
    }

    public function onStatusChanged($recordId, $statusId, $fromOrderedIds, $toOrderedIds) {
        //
    }

    public function onRecordClick($recordId) {
        //
    }

    public function styles() {
        return [
            'wrapper' => 'd-flex flex-nowrap overflow-x-auto rounded', // component wrapper
            'statusWrapper' => 'flex-shrink-0', // statuses wrapper
            'statusWidth' => 272, // statuses column width
            'status' => 'flex-column rounded bg-primary fw-bold mx-1 px-2', // status column wrapper 
            'statusHeader' => 'py-2 fs-5', // status header
            'statusFooter' => '', // status footer
            'statusRecords' => '', // status records wrapper 
            'record' => 'bg-white shadow rounded border fw-normal p-2 my-2', // record wrapper
            'recordContent' => '', // record content
        ];
    }

    public function render() {
        $statuses = $this->statuses();

        $records = $this->records();

        $styles = $this->styles();

        $statuses = $statuses
            ->map(function ($status) use ($records) {
                $id = $this->id ?? 0;
                $status['group'] = $id;
                $status['statusRecordsId'] = "{$id}-{$status['id']}";
                $status['records'] = $records
                    ->filter(function ($record) use ($status) {
                        return $this->isRecordInStatus($record, $status);
                    });

                return $status;
            });

        return view($this->statusBoardView)
            ->with([
                'records' => $records,
                'statuses' => $statuses,
                'styles' => $styles,
            ]);
    }
}
