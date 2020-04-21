@extends('layouts.app')

@section('title', 'Task 4')

@section('content')
    <div class="site-section">
        <div class="container">
            @include('layouts.tabs')

            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                1. Поменять 2 переменные местами без использования третьей
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6 class="mb-3">Исходные данные</h6>
                                <pre class="prettyprint linenums">
$а = [1,2,3,4,5];
$b = ‘Hello world’;</pre>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                                <h6 class="mb-3">Пример кода</h6>
                                <pre class="prettyprint linenums">
# Перывй вариант
/**
  * @return array
*/
public function changeVariables(): array
{
    $a = [1, 2, 3, 4, 5];
    $b = 'Hello world';

    array_push($a, $b);
    $b = $a;
    $a = array_pop($b);

    return [$a, $b];
}

# Второй вариант
/**
  * @return array
*/
public function changeVariables(): array
{
    $a = [1, 2, 3, 4, 5];
    $b = 'Hello world';

    list($b, $a) = [$a, $b];

    return [$a, $b];
}</pre>
                            </div>
                            <h6 class="mb-3">Результат выполнения</h6>
                            <p>Результат $a: <span class="badge badge-secondary mr-1">{{ $a }}</span></p>
                            <p>Результат $b:
                                @foreach($b as $digit)
                                    <span class="badge badge-secondary mr-1">{{ $digit }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
