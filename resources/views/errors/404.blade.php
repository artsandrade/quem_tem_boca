@extends('LayoutBase.LayoutBase')

@section('content')
<div class="text-center">
  <div class="error mx-auto" data-text="404">404</div>
  <p class="lead text-gray-800 mb-5">Página não encontrada</p>
  <p class="text-gray-500 mb-0">Ops... parece que você está tentando acessar uma página que não existe!</p>
  <a href="{{route('restaurants')}}">&larr; Voltar à página inicial</a>
</div>
@stop