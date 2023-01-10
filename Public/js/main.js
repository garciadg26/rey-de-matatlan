

$(document).ready(function(){
    contadorInput();
    console.log("Hola mundo");
});

//FUNCIÓN PARA EL CONTROLADOR
function contadorInput(){
    var unit = 0;
    var total;
    // if user changes value in field
    $('.field').change(function() {
      unit = this.value;
    });
    $('.add').click(function() {
      unit++;
      var $input = $(this).prevUntil('.sub');
      $input.val(unit);
      unit = unit;
    });
    $('.sub').click(function() {
      if (unit > 0) {
        unit--;
        var $input = $(this).nextUntil('.add');
        $input.val(unit);
      }
    });
}