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
                            <form action="{{route('dashboard.reception.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <lable>название рецепта</lable>
                                    <input class="form-control" name="name_recept" value="" required/>
                                </div>
                                <div class="form-group">
                                    <lable>какая кухня</lable>
                                    <input class="form-control" name="kitchen" required/>
                                </div>

                                <div class="form-group">
                                    <lable>тип блюда</lable>
                                    <input class="form-control" name="type" required/>
                                </div>
                                <div class="form-group">
                                    <lable>рецепт продукта</lable>
                                    <textarea class="form-control" type="text" name="reception" required></textarea>
                                </div>
                                <div class="form-group json_prod">

                                </div>
                                <button type="button" class="btn btn-warning add_tr float-right rounded-circle">+</button>
                                <button type="submit" class="btn btn-dark">Добавлять</button>
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
                        "<lable>название продукта</lable>"+
                        select_prod+
                    '</div>'+
                /*'<div class="col-md-3">' +
                    '<lable>количество продукта</lable>'+
                    '<input class="form-control" type="number" min="0" value="0" name="qty[]" />'+
                '</div>'+*/
                    '<div class="col-md-4">' +
                        '<lable>единица измерения</lable>'+
                        '<div class="row p-0">'+
                            '<div class="col-md-8">' +
                                '<input class="form-control" type="number" min="0" value="0" name="value[]" step="any"/>'+
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
    </script>
    <script src="{{ asset('js/colors.js') }}"></script>

@endsection

