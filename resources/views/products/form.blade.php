{{-- resources/views/products/index.blade.php --}}
@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          @if(Request::is('*/edit'))
            Editando produto
          @else
            Novo produto
          @endif

          <a href="{{url('products')}}" class="pull-right">Listar</a>
        </div>
        <div class="panel-body">
          @if(Session::has('success_message'))
            <div class="alert alert-success">
              {{Session::get('success_message')}}
            </div>
          @endif

          @if ($errors->any())
            <ul class="alert alert-warning">
              @foreach($errors->all() as $error) <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif


          @if(Request::is('*/edit'))
            {{-- editando PUT --}}
            {!! Form::model($product, ['route' => ['products.update',$product->id],'class' => 'form', 'method' => 'PUT']) !!}

          @else
            {{-- incluindo POST --}}
            {!! Form::open(['route' => 'products.store', 'class' => 'form']) !!}
          @endif

          <!-- Nome Form Input -->          <div class="form-group">            {!! Form::label('nome', 'Nome:') !!}            {!! Form::text('name', null, ['class'=>'form-control','autofocus']) !!}          </div>          <!-- Descricao Form Input -->          <div class="form-group">            {!! Form::label('descricao', 'Descrição:') !!}            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}          </div>          <div class="form-group">            {!! Form::submit('Salvar', ['class'=>'btn btn-success']) !!}            @if(!Request::is('*/edit'))              {!! Form::reset('Limpar', ['class' => 'btn btn-warning']) !!}            @endif          </div>

          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>

@endsection
