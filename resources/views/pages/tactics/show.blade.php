@php
/**
* @var $tactic App\Models\Tactic
*/
@endphp
<x-main-layout>

    <x-page-header class="index index-tactics">
        {{ $tactic->name }}
    </x-page-header>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{__('Id')}}</th>
                        <th>{{__('Name')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tactic->techniques as $technique)
                        <tr>
                            <td>
                                <a href="{{ route('techniques.show', $technique) }}">{{ $technique->id }}</a>
                            </td>
                            <td>
                                <a href="{{ route('techniques.show', $technique) }}">{{ $technique->name }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-main-layout>
