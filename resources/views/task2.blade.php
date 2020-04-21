@extends('layouts.app')

@section('title', 'Task 2')

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
                                1. Написать алгоритм решения задачи
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6 class="mb-3">Исходные данные</h6>
                                <pre class="prettyprint linenums">
В классе 28 учеников. 75% из них занимаются спортом. Сколько учеников в классе занимаются спортом?</pre>
                                <h6 class="mb-3">Свое значение (необязательно)</h6>
                                <form action="{{ route('second.index') }}" method="get">
                                    @csrf
                                    <div class="form-row align-items-center mb-4">
                                        <div class="col-auto">
                                            <label class="sr-only" for="amount">Amount</label>
                                            <input type="number" class="form-control" name="amount" id="amount" placeholder="Свое значение">
                                            @include('layouts.input-error', ['field' => 'amount'])
                                        </div>
                                        <div class="col-auto my-1">
                                            <label class="sr-only" for="percent">Percent</label>
                                            <select class="custom-select mr-sm-2" name="percent" id="percent">
                                                <option value="25">25%</option>
                                                <option value="50">50%</option>
                                                <option value="75">75%</option>
                                            </select>
                                            @include('layouts.input-error', ['field' => 'percent'])
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary">Применить</button>
                                        </div>
                                    </div>
                                </form>
                                <h6 class="mb-3">Пример кода</h6>
                                <pre class="prettyprint linenums">
/**
  * @param  int  $amountPupils
  * @param  int  $percent
  * @return array
*/
public function getAmountSportPupils(int $amountPupils = 28, int $percent = 75): array
{
    $sportPupils = $amountPupils * $percent / 100;
    return [$amountPupils, (int)$sportPupils, $percent];
}</pre>
                            </div>
                            <h6 class="mb-3">Результат выполнения</h6>
                            <p>Всего учеников: <span class="badge badge-secondary">{{ $amountPupils }}</span></p>
                            <p>Ученики, которые занимаются спортом: <span class="badge badge-secondary">{{ $sportPupils }}</span></p>
                            <p>Выбранный процент: <span class="badge badge-secondary">{{ $percent }}</span></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
