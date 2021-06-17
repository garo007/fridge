@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    продукты в холодильнике
                    <a class="btn btn-dark float-right" href="{{route('dashboard.refrigerator.create')}}">Добавлять продук</a>
                </div>
            @if(Session::has('success'))
                    <div class="alert alert-success">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>продук</th>
                                <th>единица измерения</th>
                                <th>операции</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->value}} {{$item->weight}}</td>
                                        <td class="float-left">
                                            <div class="btn-group btn-group-toggle float-right">
                                                <a class="btn btn-warning" href="{{ route('dashboard.refrigerator.edit', $item->id) }}">редактировать</a>
                                                <form method="post" action="{{ route('dashboard.refrigerator.destroy', $item->id) }}" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить?')">удалить </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/colors.js') }}"></script>
@endsection

