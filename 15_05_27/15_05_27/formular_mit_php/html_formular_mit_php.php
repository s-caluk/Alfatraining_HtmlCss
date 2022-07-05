<?php
// Pruefen, ob Text eingegeben wurde
if(isset($_POST['name'])) {
$name = $_POST["name"]; // input name=”name”
$email = $_POST["email"]; // input name=“email”
$textfeld = $_POST["textfeld"]; // textarea name=“textfeld“

$empfaenger = "kontakt@meine-tolle-homepage.de" ; // Empfaenger-Zeile
$betreff = "Daten von Kontaktformular" ; // Betreff-Zeile
$mailtext = "Name: " . $name . "\r\n" . // Inhalt des Mailtextes, jeweils mit Zeilenumbruch
"E-mail: ". $email . "\r\n" .
"Nachricht: ". $textfeld . "\r\n" ;
$header = 'From: '.$_POST["email"]."\r\n" .
'X-Mailer: PHP/' . phpversion() ;
// Bemerkung: Das -f beim header ist eine Anforderung des Servers vom
// Provider Host Europe und ist nicht zwingend bei anderen Hostern erforderlich
if (@mail ($empfaenger, $betreff, $mailtext, $header, "-f kontakt@meine-tolle-homepage.de")) {
header("Location: ../wurde_gesendet.html"); // hier Dankeschön-Datei angeben und Pfad anpassen
}
// Wenn nicht funktioniert hat, die Mail zu senden, dann Fehlermeldung ausgeben
/*else {
$msg = "<p>Fehler beim Versand!</p>";
}*/
}
else {
$name = "*";
$email = "*";
$textfeld = "*";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HTML Formulare</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<!--ACHTUNG wegen Validierung:
Der HTML-Validator validiert und versteht nur HTML! Bei eingetragenem PHP gibt er deshalb Fehler aus, welche nicht weiter zu beachten sind.--> 

<div id="container">
	
    <h1>HTML Formulare</h1>
    
	<ul class="navi">
    	<li><a href="#">Start</a></li>
        <li><a href="#">Buch</a></li>
        <li><a href="#">Forum</a></li>
        <li><a href="#">Kontakt</a></li>
    </ul>
    
    <!--floats zuerst aufrufen...-->
    <div id="seitbox">
    	<h3>Infos zur Browser-Unterstützung</h3>
        
        <p>Der unterschiedlich starke Browser-Support bildet den derzeit größten Stolperstein bei der Verwendung von HTML5-Formularen.<br>
	Während der IE9 <strong>keinen</strong> der verschiedenen Typen des input-Feldes unterstützt (erst ab Version 10), können Firefox und Chrome häufig genutzte Typen wie <strong><code>email, tel, url</code></strong> schon gut verarbeiten.</p>
    
    <p>Aber selbst moderne Browser sind noch weit von einer kompletten Unterstützung entfernt. Dennoch ist es an der Zeit, HTML5-Formulare auf den eigenen Seite einzubauen. Schon allein für die immer größer werdende mobile Anwenderschaft ist es ein großer Vorteil, ihre virtuelle Tastatur nicht ständig von Buchstaben auf Zahlen umzuschalten. Die Brwoserhersteller werden sicher zukünftig noch mehr Standards umsetzen.</p>
    </div>

	<!--...vor dem normalen Elementfluss-->
    <div id="content">
    
    	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="formular1" name="formular1">
        	<h2>Kontakt</h2>
            
            <fieldset>
            	<legend>Ansprechpartner</legend>
                
                <p><label for="name">Name:</label></p>
                
                <p><input type="text" name="name" id="name" required placeholder="*" value="<?php echo $name ?>"></p>
                
                <p><label for="emailadresse">E-Mail:</label></p>
                
                <!--Reihenfolge der Attribute beliebig-->
                <p><input type="email" name="emailadresse" id="emailadresse" placeholder="*" required value="<?php echo $email ?>"></p>
                
            </fieldset>
            
            <fieldset>
            	<legend>Ihre Nachricht</legend>
                
                <textarea cols="3" rows="4" name="textfeld" id="textfeld" required placeholder="*"><?php echo $textfeld ?></textarea>
            </fieldset>
            
            <fieldset>
            	<legend>Mail senden</legend>
                
                <p><input type="submit" name="senden" id="senden" value="Absenden"></p>
            </fieldset>
        
        </form>
        
    </div>
	
    <div id="footer">
    	<ul class="navi">
        	<li><a href="#">Impressum</a></li>
            <li><a href="#">Links</a></li>
        </ul>
    </div>

</div>




</body>
</html>
