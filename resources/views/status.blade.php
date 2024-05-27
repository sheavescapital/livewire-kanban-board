{{-- Injected variables $status, $styles --}}
<div class="{{ $styles['statusWrapper'] }}">
    <div class="{{ $styles['status'] }}" id="{{ $status['id'] }}">

        @include($statusHeaderView, [
            'status' => $status,
        ])

        <div id="{{ $status['swimlaneStatusID'] }}"
            data-status-group="{{ $status['group'] }}"
            data-status-id="{{ $status['id'] }}"
            class="status-container {{ $styles['statusRecords'] }}" data-scroll="minimal-dark">

            @foreach ($status['records'] as $record)
                @include($recordView, [
                    'record' => $record,
                ])
            @endforeach

        </div>

        @include($statusFooterView, [
            'status' => $status,
        ])

    </div>
</div>
