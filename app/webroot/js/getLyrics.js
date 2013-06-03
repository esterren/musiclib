
//$(document).ready(


//function () {alert("Hey there");}
			//type: "POST",
			//contentType: "text/xml",
			//data: soapRequest,
			
var url = "http://lyrics.wikia.com/api.php?artist=Slipknot&song=Before_I_Forget&fmt=js";
/*
$.getJSON(url).done(function(data){
	json = jQuery.parseJSON(data);
	alert(json);
});*/
			
		$.ajax({

			url: "http://lyrics.wikia.com/api.php?artist=Slipknot&song=Before_I_Forget&fmt=js",

			dataType: "jsonp",

			success: processSuccess,
			error: processError
		});

        function processSuccess(data, status, req) {
            if (status == "success")
				
				alert(song.lyrics);
                //$("#lyrics").text($(req.responseXML).find("lyrics").text());
        }

        function processError(data, status, req) {
            alert(req.responseText + " " + status);
        }  

//);

