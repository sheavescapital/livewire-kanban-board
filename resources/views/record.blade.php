{{-- Injected variables $record, $styles --}}
<div
    id="{{ $record['id'] }}"
    @if ($recordClickEnabled) wire:click="onRecordClick('{{ $record['id'] }}')" @endif
    class="{{ $styles['record'] }} {{ isset($record['color']) ? 'b-' . $record['color'] : null }}">

    @include($recordContentView, [
        'record' => $record,
        'styles' => $styles,
    ])

</div>
