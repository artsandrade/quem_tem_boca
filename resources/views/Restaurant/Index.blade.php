@extends('LayoutBase.LayoutBase')

@section('content')
<!-- Content Row -->

<div class="row" id="restaurant_header">
</div>
<hr>
<div class="row">
  <div class="col row" id="div_items"></div>
  <div class="col-sm-12 text-center text-dark mt-5 d-none" id="div_loading">
    <div class="d-flex justify-content-center pb-3">
      <span class="spinner-border spinner-border-lg align-middle">
    </div>
    <p>Procurando itens...</p>
  </div>
  <div class="col-sm-12 text-center text-dark mt-5 d-none" id="div_categories_not_found">
    <i class="fas fa-ban fa-2x text-300"></i>
    <p>Nenhuma categoria encontrada.</p>
  </div>
</div>

@stop

@section('import_scripts')
<script>
  const ID = '{{request("id")}}';
</script>

<script src="{{asset('assets/js/pages/restaurant/index.js')}}"></script>
@stop