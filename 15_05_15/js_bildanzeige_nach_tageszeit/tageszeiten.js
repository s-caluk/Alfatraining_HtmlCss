// JavaScript Document

/*------------------------------------------------------------------
	JavaScript: tageszeiten
------------------------------------------------------------------*/

$(document).ready(function() {
	tag = new Date();
	zeit=tag.getTime();
	tag.setTime(zeit);
	stunde = tag.getHours();
	if (stunde >21) {
	nachricht = "Gute Nacht!";
	$("body").addClass("nacht");
	$("div#tageszeitenbild").addClass("nachtbild");
	}
	else if (stunde >17) {
	nachricht = "Einen schönen Abend!";
	$("body").addClass("abend");
	$("div#tageszeitenbild").addClass("abendbild");
	}
	else if (stunde >13) {
	nachricht = "Einen fröhlichen Nachmittag!";
	$("body").addClass("nachmittag");
	$("div#tageszeitenbild").addClass("nachmittagbild");
	}
	else if (stunde >12) {
	nachricht = "Schöne Mittagspause!";
	$("body").addClass("mittag");
	$("div#tageszeitenbild").addClass("mittagbild");
	}
	else {
	nachricht = "Guten Morgen!";
	$("body").addClass("morgen");
	$("div#tageszeitenbild").addClass("morgenbild");
	}
	$(".nachricht").html(nachricht);	
});