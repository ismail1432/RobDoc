/**
 * Created by Eniams on 11/10/2017.
 */
$(document).ready(function(){

    //Collapsible
    $('.collapsible').collapsible({
        onOpen: function(el) {
            //Change color from green to red when selected
            $(el).find('.material-icons').first().css('color','red')
        }
    });

    //Modal
    $('.modal').modal(
        {
            opacity: 0,
        }
    );

    $('.answerMsg').click(function (e) {
        e.preventDefault();
        $('#tableMessage').fadeOut('250', function () {
            $('#formArea').css('display', 'block').fadeIn('250');

        });
    });
    $('#seeMessage').click(function (e) {
        e.preventDefault();
        $('#formArea').fadeOut('250', function () {
            $('#tableMessage').css('display', 'block').fadeIn('250');
        });
    })
});