jQuery(document).ready(function($) {
  var code;
  var verify_adult = function () {
    code = $('#responsible').val();
    code = code.replace(/\s/g, "");
    $('#responsible').val(code);

    if ($("input[value*='" + code + "']").length) {
      swal('Aviso', 'El miembro se encuentra en el listado de elementos.', 'warning');
    } else {
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
          $('#first-next').removeClass('disabled');
        }
      })
      .fail(function() {
        swal('Fallo del Sistema', 'Verifique su conexión con el servidor.', 'error');
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
      });
    }
  }

  $('#responsible').keydown(function(event) {
    if (event.which === 13) {
      event.preventDefault();
      verify_adult();
    } else if (event.which === 32) {
      return false;
    } else {
      $('#adult-name').html('');
      $('#first-next').addClass('disabled');
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

  $('#first-next').click(function() {
    if ($('input[name=lead]').is(':checked')) {
      $('#wizard').wizard('next');
    } else {
      $('#wizard').wizard('selectedItem', {
        step: 3
      });
    }
  });

  $('.element-grid').on('click', '.delete-scout', function(e) {
    e.preventDefault();
    $parent = $($(this).parent().parent());

    swal({
      title: "Confirmar Acción",
      text: "Eliminar elemento",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: true
    },
    function (confirm) {
      if (confirm) {
        $parent.remove();
      };
    });
  });
});
