{{-- resources/views/products/index.blade.php --}}
@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Produtos Cadastrados
          <a href="{{url('products/create')}}" class="pull-right">Novo</a>
        </div>
        <div class="panel-body">
          @if(Session::has('success_message'))
            <div class="alert alert-success">
              {{Session::get('success_message')}}
            </div>
          @endif

          <table class='table table-striped table-bordered table-hover table-condensed'>
            <thead>
              <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Descrição</th>
                <th class="col-md-1 col-sm-1">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->description}}</td>
                  <td>
                    <a href="{{ route('products.edit',['id'=>$product->id]) }}"  class="btn-sm btn-info btn-block btn-xs">Editar</a>
                    <a href="{{ route('products.destroy',['id'=>$product->id]) }}" class="btn-sm btn-danger btn-block btn-xs">Remover</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <span class="pull-right"> {{ $products->links() }} </span>

        </div>
      </div>

    </div>
  </div>
@endsection
