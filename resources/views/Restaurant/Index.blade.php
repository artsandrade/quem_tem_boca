@extends('LayoutBase.LayoutBase')

@section('content')
<!-- Content Row -->

<div class="row">
  <div class="col-sm-12">
    <img class="img-fluid px-3 px-sm-2" style="width: 6rem; height: 6rem;border-radius: 100%;border:1px solid rgba(0,0,0,.1);border-color: black;" src="{{asset('assets/img/register-layout.svg')}}" alt="...">

  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-12">
    <h4 class="mb-4 text-dark">Nome da categoria</h4>
  </div>
  <div class="col-sm-12 col-md-6 mb-4">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col ml-4">
            <div class="h5 mb-1 font-weight-bold text-dark">Nome do item</div>
            <div class="h6 mb-5 font-weight-light text-dark">Descrição do item</div>
            <div class="h6 mb-0 font-weight-bold text-dark">80min - R$10,00</div>
          </div>
          <div class="col-auto">
            <img class="img-fluid px-3 px-sm-2" style="width: 10rem; height: 10rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/register-layout.svg')}}" alt="...">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 mb-4">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col ml-4">
            <div class="h5 mb-1 font-weight-bold text-dark">Nome do item</div>
            <div class="h6 mb-5 font-weight-light text-dark">Descrição do item</div>
            <div class="h6 mb-0 font-weight-bold text-dark">80min - R$10,00</div>
          </div>
          <div class="col-auto">
            <img class="img-fluid px-3 px-sm-2" style="width: 10rem; height: 10rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/register-layout.svg')}}" alt="...">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 text-center text-dark mt-5 d-none" id="card-not-found">
    <i class="fas fa-ban fa-2x text-300"></i>
    <p>Nenhum restaurante encontrado.</p>
  </div>
</div>
@stop