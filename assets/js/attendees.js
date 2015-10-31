jQuery(document).ready(function($) {
  var code;
  var verify_adult = function () {
    code = $('#responsible').val();
    code = code.replace(/\s/g, "");
    $('#responsible').val(code);

    if ($("input[value*='" + code + "']").length) {
      swal('Aviso', 'El miembro se encuentra en el listado de elementos.', 'warning');
    } else {
      $('#verify_adult').html('<i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
        url: '/attendees/validate_adult',
        type: 'POST',
        dataType: 'json',
        data: {
          cum: code
        }
      })
      .done(function(data) {
        if (data.status == 'error') {
          swal('Error', data.message, data.status);
        } else {
          $('#adult-name').html(data.member.nombre + ' <i class="fa fa-check text-success"></i>');
        }
      })
      .fail(function() {
        swal('Fallo del Sistema', 'Verifique su conexión con el servidor.', 'error');
      })
      .always(function() {
        $('#verify_adult').html('Verificar');
      });
    }
  };

  var verify_element = function () {
    code = $('#element').val();
    code = code.replace(/\s/g, "");

    if ($("input[value*='" + code + "']").length) {
      swal('Aviso', 'El miembro ya se encuentra en el listado.', 'warning');
    } else if ($('#responsible').val() == code) {
      swal('Aviso', 'El miembro esta como adulto responsable.', 'warning');
    } else {
      $('#verify_element').html('<i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
        url: '/attendees/validate_element',
        type: 'POST',
        dataType: 'json',
        data: {
          cum: code
        }
      })
      .done(function(data) {
        if (data.status == 'error') {
          swal('Error', data.message, data.status);
        } else {
          $('.element-grid tbody').loadTemplate($('#row-tpl'), data.member, { append: true });
          $('#element').val('').focus();
        }
      })
      .fail(function() {
        swal('Fallo del Sistema', 'Verifique su conexión con el servidor.', 'error');
      })
      .always(function() {
        $('#verify_element').html('Verificar');
      });
    }
  }

  var load_campings = function () {
    $.get('/campings/get', function(data) {
      if (data.status == 'error') {
        swal('Error', data.message, data.status);
      } else {
        $('.camping-grid tbody').loadTemplate($('#camp-tpl'), data.data);
      }
    })
    .fail(function() {
      swal('Fallo del Sistema', 'Verifique su conexión con el servidor.', 'error');
    });
  }

  $('#responsible').keydown(function(event) {
    if (event.which === 13) {
      event.preventDefault();
      verify_adult();
    } else if (event.which === 32) {
      return false;
    } else {
      $('#adult-name').html('');
    }
  }).change(function() {
    this.value = this.value.replace(/\s/g, "");
  });

  $('#verify_adult').click(function() {
    verify_adult();
  });

  $('#element').keydown(function(event) {
    if (event.which === 13) {
      event.preventDefault();
      verify_element();
    } else if (event.which === 32) {
      return false;
    }
  }).change(function() {
    this.value = this.value.replace(/\s/g, "");
  });

  $('#verify_element').click(function() {
    verify_element();
  });

  $('.element-grid').on('click', '.delete-scout', function(e) {
    e.preventDefault();
    $parent = $($(this).parent().parent());

    swal({
      title: "Confirmar Acción",
      text: "Eliminar elemento",
      type: "warning",
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      closeOnConfirm: true,
      confirmButtonText: 'Eliminar'
    },
    function (confirm) {
      if (confirm) {
        $parent.remove();
      };
    });
  });

  $('.camping-grid tbody').on('click', 'tr', function() {
    $(this).find('input[type="radio"]').prop("checked", true);
  });

  $('#wizard').on('finished.fu.wizard', function() {
    swal({
      title: "Finalizar Registro",
      text: "Confirme la acción para terminar el proceso y registrar los miembros al evento.",
      type: "info",
      showCancelButton: true,
      closeOnConfirm: false,
      showLoaderOnConfirm: true,
    }, function(){
      setTimeout(function(){ swal("Ajax request finished!"); }, 2000);
    });
  });

  $('#wizard').on('actionclicked.fu.wizard', function (evt, data) {
    if (data.step == 2 && data.direction == 'next') {
      load_campings();
    };
  });

  load_campings();
});
