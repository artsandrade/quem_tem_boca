@extends('LayoutBase.LayoutBase')

@section('content')
<!-- Content Row -->
<div class="row d-flex flex-row flex-nowrap overflow-auto">
  <div class="col-md-2 mb-4 card-categories">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/brasilian_food.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Brasileira
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/japanese_food.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Brasileira
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/pizza.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Brasileira
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/snacks.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Brasileira
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/cake.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Brasileira
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/ice_cream.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Brasileira
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-12">
    <h4 class="mb-4 text-dark">Restaurantes</h4>
  </div>
  <div class="col-sm-12 col-md-4 mb-4 card-restaurants">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col-auto">
            <img class="img-fluid px-3 px-sm-2" style="width: 10rem; height: 10rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/register-layout.svg')}}" alt="...">
          </div>
          <div class="col ml-4">
            <div class="h5 mb-1 font-weight-bold text-dark">Nome do restaurante</div>
            <div class="h6 mb-5 font-weight-light text-dark">Categoria</div>
            <div class="h6 mb-0 text-dark">80min - R$10,00</div>
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