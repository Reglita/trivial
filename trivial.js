var preguntas;
//Busca una pregunta por Ajax
function cargarPregunta() {
    $.get("pregunta.php", function (datos, status) {
 
        if (status == "success") {
            preguntas = JSON.parse(datos);
            pintarPregunta();
        }
    });
}
//Pinta la pregunta en nuestro HTML
function pintarPregunta() {
    $('#pregunta').text(preguntas.pregunta);
    $('#res1').text(preguntas.respuestas[0]);
    $('#res2').text(preguntas.respuestas[1]);
    $('#res3').text(preguntas.respuestas[2]);
    $('#res4').text(preguntas.respuestas[3]);
    $(".tablero").show();
    $('#mensaje div').fadeOut();
}
 
$(function () {
    cargarPregunta();
    //Enlazar con los botones el evento click y comprobar si la respuesta es correcta
    $('button').click(function () {
        var puntos = 0;
        //Comprobamos que el botón pulsado es la respuesta correcta
        if ($(this).text() === preguntas.correcta) {
            $('#mensaje').html('<div class="alert alert-success alert-dismissible">  <button type="button" class="close" data-dismiss="alert">&times;</button>  <strong>¡Bien! </strong> Respuesta correcta.</div>')
            puntos = 1;
        } else {
            $('#mensaje').html('<div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert">&times;</button>  <strong>¡Error! </strong> Respuesta incorrecta.</div>')
 
        }
        //Escondemos el tablero para queno pueda pulsar más botones
        $(".tablero").hide();
        //LLamamos por ajax con post para guardar los resultados, la función nos devuelve la puntuación
        $.post("resultado.php", {idPregunta: preguntas.id, puntos: puntos}, function (datos, status) {
            $('#puntuacion').text(datos);
            cargarPregunta();
        });
 
    });
});
