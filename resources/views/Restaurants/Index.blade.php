@extends('LayoutBase.LayoutBase')

@section('content')
<!-- Content Row -->
<div class="row d-flex flex-row flex-nowrap overflow-auto">
  <div class="col-md-2 mb-4 card-categories" onclick="getRestaurantsByCategory('Brasileira')">
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
  <div class="col-md-2 mb-4 card-categories" onclick="getRestaurantsByCategory('Japonesa')">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/japanese_food.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Japonesa
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories" onclick="getRestaurantsByCategory('Italiana')">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/pizza.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Italiana
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories" onclick="getRestaurantsByCategory('Salgados')">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/snacks.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Salgados
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories" onclick="getRestaurantsByCategory('Bolos e doces')">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/cake.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Bolos e doces
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2 mb-4 card-categories" onclick="getRestaurantsByCategory('Sorvetes')">
    <div class="card shadow h-100 py-2">
      <div class="card-body card-body-categories">
        <div class="row no-gutters align-items-center">
          <div class="mx-auto">
            <img class="img-fluid px-3 px-sm-2 mt-2 mb-3" style="width: 6rem;border-radius: 12px;border-color: black;" src="{{asset('assets/img/card_categories/ice_cream.svg')}}" alt="...">
          </div>
          <div class="text-md font-weight-bold text-dark text-uppercase mb-1 mx-auto">
            Sorvetes
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
  <div class="col row d-none" id="div_restaurants"></div>
  <div class="col-sm-12 text-center text-dark mt-5 d-none" id="div_loading">
    <div class="d-flex justify-content-center pb-3">
      <span class="spinner-border spinner-border-lg align-middle">
    </div>
    <p>Procurando restaurantes...</p>
  </div>
  <div class="col-sm-12 text-center text-dark mt-5 d-none" id="div_restaurants_not_found">
    <i class="fas fa-ban fa-2x text-300"></i>
    <p>Nenhum restaurante encontrado.</p>
  </div>
</div>
@stop

@section('import_scripts')
<script src="{{asset('assets/js/pages/restaurants/index.js')}}"></script>

@stop