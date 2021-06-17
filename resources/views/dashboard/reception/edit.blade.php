@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Добавлять товар</div>
                <div class="card-body">
                    <a class="btn btn-dark" href="{{route('dashboard.reception.index')}}"><i class="c-icon c-icon-l cil-arrow-left"></i></a>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <form action="{{route('dashboard.reception.update', $item->id)}}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <lable>название продукта</lable>
                                    <input class="form-control" name="name_recept" value="{{$item->name_recept}}" />
                                </div>
                                <div class="form-group">
                                    <lable>какая кухня</lable>
                                    <input class="form-control" name="kitchen" placeholder="какая кухня" value="{{$item->kitchen}}" />
                                </div>

                                <div class="form-group">
                                    <lable>тип блюда</lable>
                                    <input class="form-control" name="type" placeholder="тип блюда" value="{{$item->type}}" />
                                </div>
                                <div class="form-group">
                                    <lable>название продукта</lable>
                                    <textarea class="form-control" type="text" name="reception" placeholder="название продукта">{{ $item->reception }}</textarea>
                                </div>
                                <div class="form-group json_prod">
                                    @foreach($datajson as $product)
                                        <div class="row v1">
                                            <div class="col-md-3">
                                                <lable>название продукта</lable>
                                                <select class="form-control" name="name[]">
                                                    @foreach($products as $product1)
                                                        <option @if($product['name']==$product1->name) selected @endif value="{{$product1->name}}">{{$product1->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <lable>единица измерения</lable>
                                                <div class="row p-0">
                                                    <div class="col-md-8">
                                                        <input class="form-control" name="value[]" type="number" min="0" value="{{$product['value']}}" step="any"/>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="weight[]">
                                                            <option @if($product['weight']=='ш') selected @endif value="ш">ш</option>
                                                            <option @if($product['weight']=='л') selected @endif value="л">л</option>
                                                            <option @if($product['weight']=='г') selected @endif value="г">г</option>
                                                            <option @if($product['weight']=='кг') selected @endif value="кг">кг</option>
                                                            <option @if($product['weight']=='мл') selected @endif value="мл">мл</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <lable>удалить</lable>
                                                <button type="button" class=" btn btn-dark form-control del_tr btn-danger">
                                                    <i class="c-icon c-icon-1xl cil-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <button type="button" class="btn btn-warning add_tr float-right rounded-circle">+</button>
                                <button type="submit" class="btn btn-dark">Обновить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="prod_name" style="display: none">
        <select class="form-control" name="name[]">
            @foreach($products as $product)
                <option value="{{$product->name}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>
@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        let select_prod = $('.prod_name').html()

        $('.add_tr').click(function (){
            $('.json_prod').append(
                '<div class="row v1">'+
                    '<div class="col-md-3">' +
                        '<lable>название продукта</lable>'+
                        select_prod+
                    '</div>'+
                    '<div class="col-md-4">' +
                        '<lable>единица измерения</lable>'+
                        '<div class="row p-0">'+
                            '<div class="col-md-8">' +
                                '<input class="form-control" type="number" min="0" name="value[]" step="any" />'+
                            '</div>'+
                            '<div class="col-md-4">' +
                            '<select class="form-control" name="weight[]">'+
                            '<option value="ш">ш</option>'+
                            '<option value="л">л</option>'+
                            '<option value="г">г</option>'+
                            '<option value="кг">кг</option>'+
                            '<option value="мл">мл</option>'+
                            '</select>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div>'+
                        '<lable>удалить</lable>'+
                        '<button type="button" class="form-control del_tr btn-danger">' +
                            '<i class="c-icon c-icon-1xl cil-x"></i>' +
                        '</button>'+
                    '</div>'+
                '</div>'
            )
            $('.del_tr').click(function (){
                $(this).parents('.v1').remove()
            })
        })
        $('.del_tr').click(function (){
            $(this).parents('.v1').remove()
        })
    </script>
    <script src="{{ asset('js/colors.js') }}"></script>

@endsection

