<div class="row mb-4">
    <div class="col-md-12 mb-5 mb-md-0">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link @menuactive('first') active @endmenuactive" href="{{ route('first.index') }}">Task 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @menuactive('second') active @endmenuactive" href="{{ route('second.index') }}">Task 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @menuactive('third') active @endmenuactive" href="{{ route('third.index') }}">Task 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @menuactive('fourth') active @endmenuactive" href="{{ route('fourth.index') }}">Task 4</a>
            </li>
        </ul>
    </div>
</div>
