(function($, ts) {

  var choice1SpaceFlight = [30,31,32];
  var choice1Jbis = [33,34,35];
  var choice1SpaceChronicle = [36,37,38];
  var choice2SpaceFlight = [39,42,43];
  var choice2Jbis = [44,45,46];
  var choice2SpaceChronicle = [47,48,49];
  var choice3SpaceFlight = [40,41,50];
  var choice3Jbis = [51,52,53];
  var choice3SpaceChronicle = [54,55,56];

  CRM.$('#s2id_price_17').select2('destroy');
  CRM.$('#s2id_price_18').select2('destroy');
  CRM.$('#s2id_price_19').select2('destroy');
  // Initially disable the publication choice 2,3
  CRM.$('#price_17').attr('disabled', false);
  CRM.$('#price_18').attr('disabled', true);
  CRM.$('#price_19').attr('disabled', true);

  document.addEventListener('DOMContentLoaded', function() {
    // Remove the select2 elements, we don't need them and harder to customise
    $('#s2id_price_17').select2('destroy');
    $('#s2id_price_18').select2('destroy');
    $('#s2id_price_19').select2('destroy');
    // Initially disable the publication choice 2,3
    $('#price_17').attr('disabled', false);
    $('#price_18').attr('disabled', true);
    $('#price_19').attr('disabled', true);

    // Make sure that postage outside UK is not checked
    $('input#price_20_57').prop('checked', false);
  });

  $('#price_17').on('change', function() {
    var selectedChoice1 = $(this).val();
    if (!$('#price_17').children('option:selected').val().trim()) {
      // no selection - disabled choices 2,3
      $('#price_18').val('');
      $('#price_19').val('');
      $('#price_18').attr('disabled', true);
      $('#price_19').attr('disabled', true);
    }
    else {
      updateOptionsChoice2(selectedChoice1);
      $('#price_18').val('');
      $('#price_19').val('');
      $('#price_18').attr('disabled', false);
      $('#price_19').attr('disabled', true);
    }
  });

  $('#price_18').on('change', function() {
    var selectedChoice2 = $(this).val();
    var selectedChoice1 = CRM.$('#price_17').children('option:selected').val();
    if (!$('#price_18').children('option:selected').val().trim()) {
      // no selection - disabled choices 2,3
      $('#price_19').val('');
      $('#price_19').attr('disabled', true);
    }
    else {
      updateOptionsChoice2(selectedChoice1);
      updateOptionsChoice3(selectedChoice1, selectedChoice2);
      $('#price_19').val('');
      $('#price_19').attr('disabled', false);
    }
  });

  $('select#country-1').on('change', function() {
    if ($('#country-1').val() === "") {
      return;
    }
    if (parseInt($('#country-1').val()) !== 1226) {
      // Make sure that postage outside UK is checked
      $('input#price_20_57').prop('checked', true);
    }
    else {
      // Make sure that postage outside UK is checked
      $('input#price_20_57').prop('checked', false);
    }
  });

  function updateOptionsChoice2(choice1Selected) {
    choice1Selected = parseInt(choice1Selected);
    // Show all options
    $('#price_18').children('option').show();
    // disable options that have already been selected
    if ($.inArray(choice1Selected, choice1SpaceFlight) > -1) {
      $.each(choice2SpaceFlight, function(index, value) {
        CRM.$('#price_18').children('option[value="' + value + '"]').hide()
      });
    }
    else if ($.inArray(choice1Selected, choice1Jbis) > -1) {
      $.each(choice2Jbis, function(index, value) {
        CRM.$('#price_18').children('option[value="' + value + '"]').hide()
      });
    }
    else if ($.inArray(choice1Selected, choice1SpaceChronicle) > -1) {
        $.each(choice2SpaceChronicle, function(index, value) {
          CRM.$('#price_18').children('option[value="' + value + '"]').hide()
        });
      }
  }

  function updateOptionsChoice3(choice1Selected, choice2Selected) {
    choice1Selected = parseInt(choice1Selected);
    choice2Selected = parseInt(choice2Selected);
    // Show all options
    $('#price_19').children('option').show();
    // disable options that have already been selected
    if ($.inArray(choice1Selected, choice1SpaceFlight) > -1) {
      $.each(choice3SpaceFlight, function(index, value) {
        CRM.$('#price_19').children('option[value="' + value + '"]').hide()
      });
    }
    else if ($.inArray(choice1Selected, choice1Jbis) > -1) {
      $.each(choice3Jbis, function(index, value) {
        CRM.$('#price_19').children('option[value="' + value + '"]').hide()
      });
    }
    else if ($.inArray(choice1Selected, choice1SpaceChronicle) > -1) {
        $.each(choice3SpaceChronicle, function(index, value) {
          CRM.$('#price_19').children('option[value="' + value + '"]').hide()
        });
      }
    if ($.inArray(choice2Selected, choice2SpaceFlight) > -1) {
      $.each(choice3SpaceFlight, function(index, value) {
        CRM.$('#price_19').children('option[value="' + value + '"]').hide()
      });
    }
    else if ($.inArray(choice2Selected, choice2Jbis) > -1) {
      $.each(choice3Jbis, function(index, value) {
        console.log('hiding ' + value);
        CRM.$('#price_19').children('option[value="' + value + '"]').hide()
      });
    }
    else if ($.inArray(choice2Selected, choice2SpaceChronicle) > -1) {
        $.each(choice3SpaceChronicle, function(index, value) {
          CRM.$('#price_19').children('option[value="' + value + '"]').hide()
        });
      }
  }

}(CRM.$, CRM.ts('britishinterplanetarysociety')));
