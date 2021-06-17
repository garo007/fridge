@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Добавлять товар</div>
                <div class="card-body">
                    <a class="btn btn-dark" href="{{route('dashboard.product.index')}}">prev</a>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <form action="{{route('dashboard.product.update', $item->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <lable>название продукта</lable>
                                    <input class="form-control" type="text" name="name" placeholder="название продукта" value="{{ $item->name }}">
                                </div>
                                <div class="form-group">
                                    <lable>количество продукта</lable>
                                    <input class="form-control" type="text" name="qty" placeholder="название продукта" value="{{ $item->qty }}">
                                </div>
                                <div class="form-group">
                                    <lable>единица измерения</lable>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="value" placeholder="единица продукта" value="{{ $item->value }}">
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="weight" >
                                                <option @if($item->weight=='л') selected @endif value="л">л</option>
                                                <option @if($item->weight=='г') selected @endif value="г">г</option>
                                                <option @if($item->weight=='кг') selected @endif value="кг">кг</option>
                                                <option @if($item->weight=='мл') selected @endif value="мл">мл</option>
                                            </select>
                                        </div>
                                    </div>
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

