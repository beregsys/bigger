@php
/**
* @var $technique App\Models\Technique
*/
@endphp
<x-main-layout>

    <x-page-header class="index index-tactics">
        {{ $technique->name }}
    </x-page-header>

    <div class="row">
        <div class="col">
            <p class="mb-3">{{ $technique->description }}</p>

            @if($technique->parent)
            <h5>{{__('Parent')}}</h5>
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="{{ route('techniques.show', $technique->parent) }}">{{ $technique->parent->name }}</a>
            </div>
            @endif

            @if($technique->children->isNotEmpty())
                <h5>{{__('Children')}}</h5>
                <div class="list-group">
                    @foreach($technique->children as $child)
                    <a href="{{ route('techniques.show', $child) }}" class="list-group-item list-group-item-action">{{ $child->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-main-layout>
