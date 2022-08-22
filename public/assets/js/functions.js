const API_URL = location.origin;

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