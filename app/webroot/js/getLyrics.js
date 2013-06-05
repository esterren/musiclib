/*
* The getLyrics functions receives an artist and a song string an request the lyrics via an ajax request.
*
*/

function getLyrics(artist, song){
	// display the throbber
	var throbber = $("#throbber");
	throbber.fadeIn('slow');
	var replacedArtist = formatstring(artist);
	var replacedSong = formatstring(song);
	var baseurl = "http://lyrics.wikia.com/api.php?";
	var arguments = "artist=" +encodeURIComponent(replacedArtist)+ "&song=" 
		+encodeURIComponent(replacedSong)+ "&fmt=js";
		
	var url = baseurl + arguments;
	
	$.ajax({
		url: url,
		cache: true,
		dataType: "script",
		success: processSuccess,
		error: processError
	});
}

// on successfull ajax request the throbber fades out and the lyrics are displayed
function processSuccess(data, status, req) {
	if (status == "success") {
		var throbber = $("#throbber");
		throbber.fadeOut(
		'slow',
			function(){
				var lyricHref = document.createElement('a');
				var lyricObject = $("#lyrics");
				var linkText = document.createTextNode("->Full lyrics on lyrics.wikia.com");
				lyricHref.appendChild(linkText);
				lyricHref.title = "lyrics.wikia.com";
				lyricHref.href = song.url;
				lyricObject.html(song.lyrics.replace(/\n/g, "<br />"));
				lyricObject.append('<br />').append(lyricHref);
			}
		);

		}
}

// on an ajay request error the throbber fades out and the user will be notified (red text)
function processError(data, status, req) {
		var throbber = $("#throbber");
		throbber.fadeOut(
		'slow',
			function(){
				var lyricObject = $("#lyrics");
				lyricObject.css({'color': 'red'});
				lyricObject.html("Song lyrics could not be loaded!");
			}
		);


}  
	
// Replaces blanks with unserscores for the api request url
function formatstring(str){
	return str.replace(/ /g,"_");
}