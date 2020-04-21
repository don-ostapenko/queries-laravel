@extends('layouts.app')

@section('title', 'Task 3')

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
                                1. Реализовать алгоритм извлечения числовых значений со строки
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6 class="mb-3">Исходные данные</h6>
                                <pre class="prettyprint linenums">
Default string: This server has 386 GB RAM and 500GB storage</pre>
                                <h6 class="mb-3">Свое значение (необязательно)</h6>
                                <form action="{{ route('third.index') }}" method="get">
                                    @csrf
                                    <div class="form-row align-items-center mb-4">
                                        <div class="col-auto">
                                            <label class="sr-only" for="string">String</label>
                                            <input type="text" class="form-control" name="string" id="string"
                                                   placeholder="Свое значение">
                                            @include('layouts.input-error', ['field' => 'string'])
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary">Применить</button>
                                        </div>
                                    </div>
                                </form>
                                <h6 class="mb-3">Пример кода</h6>
                                <pre class="prettyprint linenums">
/**
  * @param  string  $str
  *
  * @return mixed
*/
public function getDigitsFromString($str = 'This server has 386 GB RAM and 500GB storage')
{
    preg_match_all("/\d+/", $str, $matches);
    return [$matches[0], $str];
}</pre>
                            </div>
                            <h6 class="mb-3">Результат выполнения</h6>
                            <p>Переданная строка: <span class="badge badge-secondary">{{ $str }}</span></p>
                            <p>Значения:
                                @foreach($digits as $digit)
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
