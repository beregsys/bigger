@php
/**
 * @var $tactics App\Models\Tactic[]
*/
@endphp
<nav id="sidebarMenu" class="bg-dark text-light sidebar d-print-none">


    <button class="btn btn-link sidebar__toggler close" type="button">
        <span class="hamburger"></span>
    </button>

    <div class="wrapper h-100 d-flex flex-column">

        <header class="head d-flex pt-2 pb-2 px-3 flex-column bg-gray-800 justify-content-center" style="height: 60px">
            <div class="d-flex pe-5">
                <a href="{{ route('tactics.index') }}" class="d-block p-0 w-100">
                    <img class="w-auto" src="{{ asset('images/mitre_attack_logo.png') }}" alt="{{ config('app.name', 'AppName') }}">
                </a>
            </div>

        </header>


        <section class="items">
            <ul class="nav flex-column">
                @foreach($tactics as $tactic)
                <li class="nav-item">
                    <a href="{{ route('tactics.show', $tactic)}}" class="nav-link @if(request()->routeIs('tactics.show') && request()->tactic->id === $tactic->id) active @endif">
                        {{__($tactic->name)}}
                    </a>
                </li>
                @endforeach

            </ul>
        </section>

        <footer class="foot mt-auto">
        </footer>


    </div>

</nav>
