@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Добавлять товар</div>
                <div class="card-body">
                    <a class="btn btn-dark" href="{{route('dashboard.product.index')}}">предыдущее меню</a>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <form action="{{route('dashboard.product.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <lable>название продукта</lable>
                                    <input class="form-control" type="text" name="name" placeholder="название продукта">
                                </div>
                                <button type="submit" class="btn btn-dark">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/colors.js') }}"></script>
@endsection

