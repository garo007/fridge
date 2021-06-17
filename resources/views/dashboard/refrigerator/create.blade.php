@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Холодильник</div>
                <div class="card-body">
                    <a class="btn btn-dark" href="{{route('dashboard.refrigerator.index')}}" ><i class="c-icon c-icon-l cil-arrow-left"></i></a>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <form action="{{route('dashboard.refrigerator.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <lable>название продукта</lable>
                                    <select name="name" class="form-control">
                                        @foreach($products as $product)
                                            <option value="{{$product->name}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <lable>единица измерения</lable>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="value" value="0" min="0" step="any">
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="weight" >
                                                <option value="ш">ш</option>
                                                <option value="л">л</option>
                                                <option value="г">г</option>
                                                <option value="кг">кг</option>
                                                <option value="мл">мл</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark">Добавлять</button>
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

