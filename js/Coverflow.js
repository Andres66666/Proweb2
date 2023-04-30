//almacenar slider en una variable
var slider = $('#slider');
//almacenar botones y se guarda en variables 
var siguiente = $('#btn-next');
var anterior = $('#btn-prev');

//mover ultima imagen al primer lugar 
// seleccionamos la ultmia imagen y  sucecivamente  se repetira 
$('#slider .slider__section:last').insertBefore('#slider .slider__section:first');

//mostrar la primera imagen con un margen de -100%
// aplicamos un estilo para ver el margen menos de 100%
slider.css('margin-left', '-'+100+'%');


// funcion mover  a la derecha 
function moverD() {
  //escogemos el estilo de css de cual queremos mover con tiempo 
  slider.animate({
    marginLeft:'-'+200+'%'
  } ,700, 

  //la funcion se ejecuta cuando termine la ejecucion y se ejecuta esta funcion
 //insertAfte permite mover un elemto y seleccionar de pues del utimo seccion
  function(){
    $('#slider .slider__section:first').insertAfter('#slider .slider__section:last');
    slider.css('margin-left', '-'+100+'%');
  });
}

function moverI() {
  slider.animate({
    marginLeft:0
  } ,700, function(){
    $('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
    slider.css('margin-left', '-'+100+'%');
  });
}

// cuncion que permite ejecutar automticamente cuandop el maus esta en la pocion derecha o isquierda 

function autoplay() {
  interval = setInterval(function(){
    moverD();
  }, 4000);
}

/// funciond e evento de click  para recorrer la imagenes 
siguiente.on('click',function() {
  moverD();
  clearInterval(interval);
  autoplay();
});

anterior.on('click',function() {
  moverI();
  clearInterval(interval);
  autoplay();
});


autoplay();

