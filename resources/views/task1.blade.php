@extends('layouts.app')

@section('title', 'Task 1')

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
                                1. Сделать миграции
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6 class="mb-3">Пример кода</h6>
                                <pre class="prettyprint linenums">
# Таблица Events
Schema::create('events', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('caption');
    $table->timestamps();
});

# Таблица Bids
Schema::create('bids', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->integer('event_id');
    $table->string('name');
    $table->string('email');
    $table->float('price');
    $table->timestamps();
});</pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                2. Запрос, который выберет имя пользователя (bids.name) с самой высокой ценой заявки
                                (bids.price)
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6 class="mb-3">Пример кода</h6>
                                <pre class="prettyprint linenums">
# Первый вариант
select name, price from bids order by price desc limit 1;

# Второй вариант
select name, price from bids where price in (select max(price) from bids);</pre>
                                <h6 class="mb-3">Результат выполнения</h6>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">User name</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dumps1 as $dump1)
                                        @if($dump1)
                                            <tr>
                                                <td>{{ $dump1->name }}</td>
                                                <td>{{ number_format($dump1->price, 0, '.', ' ') }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                3. Запрос, который выберет название мероприятия (events.caption), по которому нет заявок
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6 class="mb-3">Пример кода</h6>
                                <pre class="prettyprint linenums">
# Первый вариант
select b.event_id as id, e.caption from events e
left join bids b on e.id = b.event_id
where b.event_id is null;

# Второй вариант
select e.caption from events e
join bids b on e.id not in (select event_id from bids)
group by e.caption;
</pre>
                                <h6 class="mb-3">Результат выполнения</h6>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Event caption</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dumps2 as $dump2)
                                        @if($dump2)
                                            <tr>
                                                <td>{{ $dump2->caption }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">
                                4. Запрос, который выберет название мероприятия (events.caption), по которому больше
                                трех заявок
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6 class="mb-3">Пример кода</h6>
                                <pre class="prettyprint linenums">
select e.caption, count(b.event_id) as count from events e
join bids b on e.id = b.event_id
group by b.event_id
having count > 3
order by count desc;
</pre>
                                <h6 class="mb-3">Результат выполнения</h6>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Event caption</th>
                                        <th scope="col">Bids count</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dumps3 as $dump3)
                                        @if($dump3)
                                            <tr>
                                                <td>{{ $dump3->caption }}</td>
                                                <td>{{ $dump3->count }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                                    aria-expanded="false" aria-controls="collapseFive">
                                5. Запрос, который выберет название мероприятия (events.caption), по которому больше
                                всего заявок
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h6 class="mb-3">Пример кода</h6>
                                <pre class="prettyprint linenums">
select e.caption, count(b.event_id) as count from events e
join bids b on e.id = b.event_id
group by b.event_id
having count > 3
limit 1;
</pre>
                                <h6 class="mb-3">Результат выполнения</h6>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Event caption</th>
                                        <th scope="col">Bids count</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dumps4 as $dump4)
                                        @if($dump4)
                                            <tr>
                                                <td>{{ $dump4->caption }}</td>
                                                <td>{{ $dump4->count }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
