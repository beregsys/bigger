@php
/**
 * @var $tactics App\Models\Tactic[]
*/
@endphp
<x-main-layout>

    <x-page-header class="index index-tactics">
        {{__('Tactics')}}
    </x-page-header>

    <div class="row">
        <div class="col">
            <div class="table-responsive">

                @if ($tactics->isNotEmpty())

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{__('Id')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Description')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tactics as $tactic)
                            <tr>
                                <td>
                                    {{ $tactic->id }}
                                </td>
                                <td>
                                    <a href="{{ route('tactics.show', $tactic) }}">{{ $tactic->name }}</a>
                                </td>
                                <td>
                                    {{ $tactic->description }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @else

                    <p class="not_found_info_block">
                        {{__('Not found')}}
                    </p>

                @endif

            </div>
        </div>
    </div>

</x-main-layout>
