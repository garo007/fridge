@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    Рецепты
                    <a class="btn btn-dark float-right" href="{{route('dashboard.reception.create')}}">Добавлять рецепт</a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <strong>{{ Session::get('success') }}</strong>
                        </div>
                    @endif
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>имя рецепта</th>
                                <th>рецепт</th>
                                <th>операции</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->name_recept}}</td>
                                    <td>{{$item->reception}}</td>
                                    <td class="float-left">
                                        <div class="btn-group btn-group-toggle float-right">
                                            <a class="btn btn-warning" href="{{ route('dashboard.reception.edit', $item->id) }}">редактировать</a>
                                            <form method="post" action="{{ route('dashboard.reception.destroy', $item->id) }}" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить?')">удалить</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <script>
                                $('.tbody').html(
                                    '<tr>\n' +
                                    '<td><input name="title[]" class="form-control" required></td>\n' +
                                    '<td><input name="latitude[]" class="form-control" required></td>\n' +
                                    '<td><input name="longitude[]" class="form-control" required></td>\n' +
                                    '<td></td>\n' +
                                    '</tr>'
                                )
                                $('.add_tr').click(function (){
                                    $('.tbody').append(
                                        '<tr>\n' +
                                        '<td><input name="title[]" class="form-control" required></td>\n' +
                                        '<td><input name="latitude[]" class="form-control" required></td>\n' +
                                        '<td><input name="longitude[]" class="form-control" required></td>\n' +
                                        '<td><button type="button" class="btn btn-danger del_tr float-right p-2">Ջնջել</button></td>\n' +
                                        '</tr>'
                                    )
                                    $('.del_tr').click(function (){
                                        $(this).parents('tr').remove()
                                    })
                                })
                            </script>
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

