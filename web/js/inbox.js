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
            opacity: 0
        }
    );

});