@php
/**
 * @var $tactics App\Models\Tactic[]
 * @var $techniques App\Models\Technique[]
*/
@endphp
<div>
    <div class="form-floating mb-3">
        <input type="text" wire:model.debounce.500ms="search" class="form-control" id="search">
        <label for="search">Search</label>
    </div>

    @if($search)
        <h5 class="mb-3">Search Results:</h5>

        @if($tactics->isEmpty() && $techniques->isEmpty())
            <p class="not_found_info_block">
                {{__('Not found')}}
            </p>
        @endif

        @if($tactics)
            <div class="list-group">
                @foreach($tactics as $tactic)
                    <a href="{{ route('tactics.show', $tactic) }}" class="list-group-item list-group-item-action">{{ $tactic->name }}</a>
                @endforeach
            </div>
        @endif

        @if($techniques)
            <div class="list-group">
                @foreach($techniques as $technique)
                    <a href="{{ route('techniques.show', $technique) }}" class="list-group-item list-group-item-action">{{ $technique->name }}</a>
                @endforeach
            </div>
        @endif
    @endif
</div>

<script>
    let myModalEl = document.getElementById('searchModal')
    myModalEl.addEventListener('hidden.bs.modal', function (event) {
        let searchField = document.getElementById('search');
        searchField.value = '';
        @this.search = '';
    })
</script>
