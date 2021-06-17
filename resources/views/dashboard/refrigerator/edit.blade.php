@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Добавлять товар</div>
                <div class="card-body">
                    <a class="btn btn-dark" href="{{route('dashboard.refrigerator.index')}}"><i class="c-icon c-icon-l cil-arrow-left"></i></a>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <form action="{{route('dashboard.refrigerator.update', $item->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <lable>название продукта</lable>
                                    <select name="name" class="form-control">
                                        @foreach($products as $product)
                                            <option @if($product->name==$item->name) selected @endif value="{{$product->name}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <lable>единица измерения</lable>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="value" min="0" value="{{ $item->value }}"  step="any">
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="weight" >
                                                <option @if($item->weight=='л') selected @endif value="ш">ш</option>
                                                <option @if($item->weight=='л') selected @endif value="л">л</option>
                                                <option @if($item->weight=='г') selected @endif value="г">г</option>
                                                <option @if($item->weight=='кг') selected @endif value="кг">кг</option>
                                                <option @if($item->weight=='мл') selected @endif value="мл">мл</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark">Обновить</button>
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

