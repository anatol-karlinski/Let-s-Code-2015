$( document ).ready(function() {

    //Wybor daty
    $( "#datepicker" ).datepicker();


    //Wybor godziny i minuty 
	$("#godziny").spinner({
        spin: function(event, ui) 
        {
            if (ui.value > 23) 
            {
            	$(this).spinner("value", 0);
				return false;
            }
            else if (ui.value < 0) 
            {
            	$(this).spinner("value", 23);
				return false;
            }
        },
    });
	$("#minuty").spinner({
        spin: function(event, ui) 
        {
            if (ui.value > 59) 
            {
            	$(this).spinner("value", 0);
				return false;
            }
            else if (ui.value < 0) 
            {
            	$(this).spinner("value", 59);
				return false;
            }
        },
    });
	$("#minuty").spinner("value", 00);
	$("#godziny").spinner("value", 12);

	$("#kategorie").change(function() {
        if($("#kategorie :selected").text() == "kat 1")
        {
        	$("#sub_kat1").css("display", "block");
        	$("#sub_kat2").css("display", "none");
        	$("#sub_kat3").css("display", "none");
        }
        else if($("#kategorie :selected").text() == "kat 2")
        {
        	$("#sub_kat1").css("display", "none");
        	$("#sub_kat2").css("display", "block");
        	$("#sub_kat3").css("display", "none");
        }
		else if($("#kategorie :selected").text() == "kat 3")
        {
        	$("#sub_kat1").css("display", "none");
        	$("#sub_kat2").css("display", "none");
        	$("#sub_kat3").css("display", "block");
        }
    });    

});