function login() {
  let error = false;

  if ($('#email').val() == '') {
    toastr.warning('Campo E-mail é obrigatório.', 'Atenção');
    error = true;
  }

  if ($('#password').val() == '') {
    toastr.warning('Campo Senha é obrigatório.', 'Atenção');
    error = true;
  } else {
    if ($('#password').val().length < 6) {
      toastr.warning('O campo Senha deve ter pelo menos 6 caracteres.', 'Atenção');
      error = true;
    }
  }

  if (error) {
    return;
  }

  $.ajax({
    type: 'POST',
    url: `${API_URL}/api/v1/login`,
    data: {
      'email': $('#email').val(),
      'password': $('#password').val(),
    },
    dataType: 'json',
    beforeSend: function () {
      $('#btn_login').prop('disabled', true);
    },
    success: function (json, textStatus, jqXHR) {
      if (jqXHR.status === 200) {
        setCookie('access_token', json.access_token);
        setCookie('user', JSON.stringify(json.user));

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
      $('#btn_login').prop('disabled', false);
    }
  });
}

$(document).ready(function () {
  $('#btn_login').on('click', function () {
    login();
  });
});