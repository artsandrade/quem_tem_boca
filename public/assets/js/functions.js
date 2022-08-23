const API_URL = location.origin;

const setCookie = (name, value, days = 7, path = '/') => {
  const expires = new Date(Date.now() + days * 864e5).toUTCString()
  document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=' + path
}

const getCookie = (name) => {
  return document.cookie.split('; ').reduce((r, v) => {
    const parts = v.split('=')
    return parts[0] === name ? decodeURIComponent(parts[1]) : r
  }, '')
}

const deleteCookie = (name, path) => {
  setCookie(name, '', -1, path)
}

toastr.options.closeButton = true;
toastr.options.progressBar = true;

function notifyPermissionError() {
  toastr.error('Você não possui permissão para realizar esta ação! Peça ao administrador para liberar o acesso.', 'Atenção');
}

function notifyGenericError() {
  toastr.error('Esta ação resultou num erro, consulte o administrador do sistema!', 'Atenção');
}

function notifyErrors(msg) {
  if (typeof (msg) === 'string') {
    toastr.error(msg, 'Atenção');
  } else {
    for (var key in msg) {
      if (!msg.hasOwnProperty(key)) continue;

      var obj = msg[key];
      for (var prop in obj) {
        if (!obj.hasOwnProperty(prop)) continue;

        toastr.error(obj[prop], 'Atenção');
      }
    }
  }
}

function logout() {
  $.ajax({
    type: 'POST',
    url: `${API_URL}/api/v1/logout`,
    dataType: 'json',
    headers: {
      'Authorization': `Bearer ${getCookie('access_token')}`
    },
    beforeSend: function () {
      $('#btn_logout').prop('disabled', true);
    },
    success: function (json, textStatus, jqXHR) {
      if (jqXHR.status === 200) {
        deleteCookie('access_token');
        deleteCookie('user');

        location.href = API_URL;
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
    },
    complete: function () {
      $('#btn_logout').prop('disabled', false);
    }
  });
}

function validateOriginSearch(value) {
  if (location.pathname != '/restaurantes') {
    location.href = API_URL + '/restaurantes?busca=' + value;
  } else {
    searchByRestaurantOrItem(value);
  }
}

function searchByRestaurantOrItem(value) {
  searchByRestaurant(value);
}

function searchByRestaurant(value) {
  $.ajax({
    type: 'GET',
    url: `${API_URL}/api/v1/restaurants-by-name?name=${value}`,
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

        var searchedByRestaurant = false;
        if (json.data.length > 0) {
          searchedByRestaurant = true;
          let parent = document.querySelector('#div_restaurants');
          $.each(json.data, function (key, value) {
            let div = document.createElement('div');
            div.id = `restaurant_${value.id}`;
            div.className = 'col-sm-12 col-md-4 mb-4 card-restaurants';
            div.onclick = function () { location.href = `${API_URL}/restaurante/${value.id}` };
            parent.appendChild(div);

            let delivery_fee = 'Grátis';

            if (value.delivery_fee > '0') {
              delivery_fee = value.delivery_fee;
            }

            let html = `<div class="card shadow h-100 py-2">
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
            </div>`;

            $(`#restaurant_${value.id}`).append(html);
          });
          setTimeout(searchByItem(value, searchedByRestaurant), 500);
          $('#div_restaurants').removeClass('d-none');
        } else {
          setTimeout(searchByItem(value, searchedByRestaurant), 500);
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

function searchByItem(value, searchedByRestaurant) {
  $.ajax({
    type: 'GET',
    url: `${API_URL}/api/v1/items-by-name?name=${value}`,
    dataType: 'json',
    headers: {
      'Authorization': `Bearer ${getCookie('access_token')}`
    },
    beforeSend: function () {
      if (!searchedByRestaurant) {
        $('#div_restaurants').addClass('d-none').html('');
      }
    },
    success: function (json, textStatus, jqXHR) {
      if (jqXHR.status === 200) {

        if (json.data.length > 0) {
          let parent = document.querySelector('#div_restaurants');
          $.each(json.data, function (key, value) {
            if ($(`#restaurant_${value.restaurant.id}`).length == 0 || !searchedByRestaurant) {

              let div = document.createElement('div');
              div.id = `restaurant_${value.id}`;
              div.className = 'col-sm-12 col-md-4 mb-4 card-restaurants';
              div.onclick = function () { location.href = `${API_URL}/restaurante/${value.restaurant.id}` };
              parent.appendChild(div);

              let delivery_fee = 'Grátis';

              if (value.restaurant.delivery_fee > '0') {
                delivery_fee = value.restaurant.delivery_fee;
              }

              let html = `<div class="card shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <img class="img-fluid px-3 px-sm-2" style="width: 10rem; height: 10rem;border-radius: 12px;border-color: black;" src="${value.restaurant.file.url}" alt="...">
                    </div>
                    <div class="col ml-4">
                      <div class="h5 mb-1 font-weight-bold text-dark">${value.restaurant.name}</div>
                      <div class="h6 mb-5 font-weight-light text-dark">${value.restaurant.category.name}</div>
                      <div class="h6 mb-0 text-dark">${value.restaurant.delivery_time}min - R$${delivery_fee}</div>
                    </div>
                  </div>
                </div>
            </div>`;

              $(`#restaurant_${value.id}`).append(html);
            }
          });
          $('#div_restaurants').removeClass('d-none');
        } else {
          if (!searchedByRestaurant) {
            $('#div_restaurants_not_found').removeClass('d-none');
          }
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
      if (!searchedByRestaurant) {
        $('#div_restaurants').addClass('d-none');
        $('#div_restaurants_not_found').removeClass('d-none');
      }
    },
    complete: function () {
    }
  });
}