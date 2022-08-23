function getRestaurants(typeFilter = null, valueFilter = null) {
  let filter = {};

  if (typeFilter != null && valueFilter != null) {
    filter[typeFilter] = valueFilter;
  }

  $.ajax({
    type: 'GET',
    url: `${API_URL}/api/v1/restaurants`,
    dataType: 'json',
    data: filter,
    headers: {
      'Authorization': `Bearer ${getCookie('access_token')}`
    },
    beforeSend: function () {
      $('#div_restaurants').addClass('d-none').html('');
      $('#div_restaurants_not_found').addClass('d-none');
      $('#div_loading').removeClass('d-none');
    },
    success: function (json, textStatus, jqXHR) {
      if (jqXHR.status === 200) {

        if (json.data.length > 0) {
          $.each(json.data, function (key, value) {
            let delivery_fee = 'Grátis';

            if (value.delivery_fee > '0') {
              delivery_fee = value.delivery_fee;
            }

            let html = `<div class="col-sm-12 col-md-4 mb-4 card-restaurants" onclick="location.href='${API_URL}/restaurante/${value.id}'">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <img class="img-fluid px-3 px-sm-2" style="width: 10rem; height: 10rem;border-radius: 12px;border-color: black;" src="${value.file.url}" alt="...">
                  </div>
                  <div class="col ml-4">
                    <div class="h5 mb-1 font-weight-bold text-dark">${value.name}</div>
                    <div class="h6 mb-5 font-weight-light text-dark">${value.category.name}</div>
                    <div class="h6 mb-0 text-dark">${value.delivery_time}min - R$${delivery_fee}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>`;

            $('#div_restaurants').append(html);
          });
          $('#div_restaurants').removeClass('d-none');
        } else {
          $('#div_restaurants_not_found').removeClass('d-none');
        }
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 401) {
        toastr.warning(jqXHR.responseJSON.message, 'Atenção');
      } else if (jqXHR.status === 400) {

        let msg = jqXHR.responseJSON.message;

        notifyErrors(msg);
      } else {
        notifyGenericError();
      }
      $('#div_restaurants').addClass('d-none');
      $('#div_restaurants_not_found').removeClass('d-none');
    },
    complete: function () {
      $('#div_loading').addClass('d-none');
    }
  });

}

function getRestaurantsByCategory(category) {

  $.ajax({
    type: 'GET',
    url: `${API_URL}/api/v1/restaurants-by-category?category=${category}`,
    dataType: 'json',
    headers: {
      'Authorization': `Bearer ${getCookie('access_token')}`
    },
    beforeSend: function () {
      $('#div_restaurants').addClass('d-none').html('');
      $('#div_restaurants_not_found').addClass('d-none');
      $('#div_loading').removeClass('d-none');
    },
    success: function (json, textStatus, jqXHR) {
      if (jqXHR.status === 200) {

        if (json.data.length > 0) {
          $.each(json.data, function (key, value) {
            let delivery_fee = 'Grátis';

            if (value.delivery_fee > '0') {
              delivery_fee = value.delivery_fee;
            }

            let html = `<div class="col-sm-12 col-md-4 mb-4 card-restaurants" onclick="location.href='${API_URL}/restaurante/${value.id}'">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <img class="img-fluid px-3 px-sm-2" style="width: 10rem; height: 10rem;border-radius: 12px;border-color: black;" src="${value.file.url}" alt="...">
                  </div>
                  <div class="col ml-4">
                    <div class="h5 mb-1 font-weight-bold text-dark">${value.name}</div>
                    <div class="h6 mb-5 font-weight-light text-dark">${value.category.name}</div>
                    <div class="h6 mb-0 text-dark">${value.delivery_time}min - R$${delivery_fee}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>`;

            $('#div_restaurants').append(html);
          });
          $('#div_restaurants').removeClass('d-none');
        } else {
          $('#div_restaurants_not_found').removeClass('d-none');
        }
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 401) {
        toastr.warning(jqXHR.responseJSON.message, 'Atenção');
      } else if (jqXHR.status === 400) {

        let msg = jqXHR.responseJSON.message;

        notifyErrors(msg);
      } else {
        notifyGenericError();
      }
      $('#div_restaurants').addClass('d-none');
      $('#div_restaurants_not_found').removeClass('d-none');
    },
    complete: function () {
      $('#div_loading').addClass('d-none');
    }
  });

}

$(document).ready(function () {

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const value = urlParams.get('busca');
  if (value != null) {
    searchByRestaurantOrItem(value);
  } else {
    getRestaurants();
  }
})