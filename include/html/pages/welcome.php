<?php

if(!defined("STUDENTNAME"))
{
    die("Forbidden access");
}
?>
<h3>Willkommen zur Prüfung in<br>Websprachen!</h3>
<p>Folgen Sie der Anleitung!</p>

<h4>Erfüllen Sie folgende Aufgaben!</h4>
<p>
    <ul>
        <li>Erstellen Sie eine <b>Konstante mit Ihrem Nachnamen in Großbuchstaben</b> als Name und dem Wert 'true'.</li>
        <li>Benutzen Sie diese Konstante, um Ihre PHP <b>Seiten vor unbefugten Aufrufen zu schützen</b>!</li>
        <li>Aktivieren Sie <b>Sitzungen (Sessions)</b> für Ihre Anwendung!</li>
        <li>Bringen Sie die <b>Navigation über die 3 Buttons</b> zum Laufen!</li>
        <li>Erstellen Sie eine <b>DTD für die XML Datei &quot;movies.xml&quot;</b>!</li>
        <li>Geben sie die <b>Transformation der Dateien &quot;movies.xml&quot; und &quot;movies.xsl&quot;</b> bei Wahl des Navigationspunkts &quot;Movies&quot; aus!</li>
        <li>Ergänzen Sie unten stehendes <b>Formular</b>!</li>
        <li>Speichern Sie den übergebenen <b>Wert aus dem Formular in eine Sitzungsvariable</b>!</li>
        <li>Wenn diese Variable gesetzt ist, soll <b>&quot;Bereich 1&quot;</b> nicht angezeigt werden. Ist sie nicht gesetzt dann <b>&quot;Bereich 2&quot;</b> ausblenden!</li>
        <li>Holen Sie mittels <b>Ajax Informationen bezüglich Anzahl der Filme und Anzahl der Anmerkungen</b> in die Seite &quot;info.php&quot;</li>
    </ul>
</p>

<h4>Formular & Sitzungen</h4>

<!-- Bereich 1: Name nicht gesetzt -->
<!-- Über PHP den Bereich mittels eines IF ausblenden -->
<?php
if(!isset($_SESSION["name"]))
{
?>
    <blockquote class="blockquote" >
    <!--Achtung!Ergänzen Sie das Formular an 2 Stellen!-->
    <form action = "index.php?action=killname" method = "post" >
        <div class="form-group" >
            <label > Name</label >
            <input name = "name" type = "text" placeholder = "Ihre Name hier ..."
        </div >
        <button type = "submit" class="btn btn-success btn-xs" ><b > Name senden </b ></button >
    </form >
</blockquote >
<!--Ende Bereich 1-->

<?php
}

else {
    ?>
    <!-- Bereich 2: Name gesetzt -->
    <blockquote class="blockquote">
        <!-- Hier soll Ihre Name aus der Sitzung mit einer Begrüßung eingebaut werden: -->
        <p>Name: <b><i>Hallo <?php echo $_SESSION["name"] ?></i></b></p>
        <!-- Achtung! Ergänzen Sie das Formular an 1 Stelle! -->
        <form action="index.php?action=killname" method="get">
            <button type="submit" class="btn btn-success btn-xs"><b>Name löschen</b></button>
        </form>
        <footer>Bereich 2</footer>
    </blockquote>
    <!-- Ende Bereich 2 -->
    <?php
}
?>