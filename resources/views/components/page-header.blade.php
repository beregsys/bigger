<section {{ $attributes->merge(['class' => 'action-bar d-flex justify-content-start flex-wrap flex-md-nowrap align-items-end pb-3']) }}>

    @if (isset($icon))
        <div class="icon text-primary me-2 fs-2 text-xl">
            {{ $icon }}
        </div>
    @endif

    <h3 class="font-semibold fs-3 text-xl text-gray-800 leading-tight me-auto mb-1">
        {{ $slot }}
    </h3>

    {{$actions ?? ''}}

</section>

@if (isset($description))
    <p class="mb-3 text-muted">{{ $description }}</p>
@endif

