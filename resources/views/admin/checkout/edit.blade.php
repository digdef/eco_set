@extends('admin.index')
@section('meta')
    <title>Инфо заказа</title>
@endsection

@section('content')
    <div class="main">

        <form method="post" action="{{ route('update_modification') }}">

            @csrf
            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                </tr>
                </thead>
                <tbody>
                @foreach($checkouts as $checkout)
                    @if($checkout->id_checkout == $id)
                    <tr>

                        <td>{{ $checkout->title }}</td>
                        <td>{{ $checkout->price }}</td>
                        <td>{{ $checkout->number }}</td>

                    </tr>
                    @endif
                @endforeach

                </tbody>
            </table>

            {{--<button class="btn btn-success">Сохранить</button>--}}
        </form>
    </div>
@endsection
