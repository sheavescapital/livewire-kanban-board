{{-- Injected variables $swimlane, $styles --}}
<div class="{{ $styles['swimlaneWrapper'] }}">
    <div class="{{ $styles['swimlane'] }}" id="{{ $swimlane['id'] }}">

        @include($swimlaneHeaderView, [
            'swimlane' => $swimlane,
        ])

        <div id="swimlane-{{ $swimlane['id'] }}"
            data-swimlane-id="{{ $swimlane['id'] }}"
            class="swimlane-container {{ $styles['swimlaneRecords'] }}">

            @foreach ($swimlane['statuses'] as $status)
                @include($statusView, [
                    'status' => $status,
                ])
            @endforeach

        </div>

        @include($swimlaneFooterView, [
            'swimlane' => $swimlane,
        ])

    </div>
</div>
