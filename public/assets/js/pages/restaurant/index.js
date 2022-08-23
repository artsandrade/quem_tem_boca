function getRestaurant() {
  $.ajax({
    type: 'GET',
    url: `${API_URL}/api/v1/restaurant/${ID}`,
    dataType: 'json',
    headers: {
      'Authorization': `Bearer ${getCookie('access_token')}`
    },
    beforeSend: function () {
    },
    success: function (json, textStatus, jqXHR) {

      let phone = 'Nenhum telefone cadastrado';
      if (json.data.phone.length == 1) {
        phone = json.data.phone[0].number;
      } else if (json.data.phone.length > 1) {
        let phones = [];
        $.each(json.data.phone, function (key, value) {
          phones.push(value.number);
        });
        phone = phones.join(', ');
      }

      let business_hour = '<p class="text-dark mb-0">Nenhum horário definido</p>';
      if (json.data.business_hour.length > 0) {
        business_hour = '';
        $.each(json.data.business_hour, function (key, value) {
          business_hour += `<p class="text-dark mb-0">${value.weekday_pt}, ${value.from} - ${value.to}</p>`;
        });
      }


      let html = `<div class="col-sm-12 col-md-2 text-center" style="display: flex;justify-content: center;align-content: center;flex-direction: column;">
                    <img class="img-fluid px-3 px-sm-2" id="restaurant_logo" style="width: 8rem; height: 8rem; border-radius: 100%;" src="${json.data.file.url}" alt="...">
                  </div>
                  <div class="col-sm-12 col-md-5 pt-3" style="display: flex;justify-content: center;align-content: center;flex-direction: column;">
                    <h2 class="mb-2 text-dark">${json.data.name}</h2>
                    <h6 class="mb-2 text-dark"><i class="fas fa-map-marker"></i> ${json.data.street}, ${json.data.neighborhood}, ${json.data.city}/${json.data.state}</h6>
                    <h6 class="mb-2 text-dark"><i class="fas fa-phone"></i> ${phone}</h6>
                  </div>
                  <div class="col-sm-12 col-md-5 pt-3" style="display: flex;justify-content: center;align-content: center;flex-direction: column;">
                    <h6 class="mb-2 text-dark"><i class="fas fa-clock"></i> Horários de funcionamento:</h6>
                    ${business_hour}
                  </div>`;
      $('#restaurant_header').append(html);

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
    }
  });

}

function getCategories() {
  $.ajax({
    type: 'GET',
    url: `${API_URL}/api/v1/restaurant/${ID}/categories`,
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
          let parent = document.querySelector('#div_items');
          $.each(json.data, function (key, value) {
            let div = document.createElement('div');
            div.id = `category_${value.id}`;
            div.className = 'col row';
            parent.appendChild(div);

            let html = `<div class="col-sm-12">
                            <h4 class="mb-4 text-dark">${value.name}</h4>
                        </div>`;

            $(`#category_${value.id}`).append(html);
          });

          $('#div_categories_not_found').addClass('d-none');

          setTimeout(getItems(), 500);
        } else {
          $('#div_categories_not_found').removeClass('d-none');
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
      $('#div_categories_not_found').removeClass('d-none');
    },
    complete: function () {
      $('#div_loading').addClass('d-none');
    }
  });

}

function getItems() {
  $.ajax({
    type: 'GET',
    url: `${API_URL}/api/v1/restaurant/${ID}/items`,
    dataType: 'json',
    headers: {
      'Authorization': `Bearer ${getCookie('access_token')}`
    },
    beforeSend: function () {
    },
    success: function (json, textStatus, jqXHR) {
      if (jqXHR.status === 200) {

        if (json.data.length > 0) {
          $.each(json.data, function (key, value) {
            let html = `<div class="col-sm-12 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col ml-4">
                    <div class="h5 mb-1 font-weight-bold text-dark">${value.name}</div>
                    <div class="h6 mb-5 font-weight-light text-dark">${value.description}</div>
                    <div class="h6 mb-0 font-weight-bold text-dark">R$${value.price}</div>
                  </div>
                  <div class="col-auto">
                    <img class="img-fluid px-3 px-sm-2" style="width: 10rem; height: 10rem;border-radius: 12px;border-color: black;" src="${value.file.url}" alt="...">
                  </div>
                </div>
              </div>
            </div>
          </div>`;

            $(`#category_${value.menu_category.id}`).append(html);
          });
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
    },
    complete: function () {
    }
  });

}

$(document).ready(function () {
  getRestaurant();
  getCategories();
})
