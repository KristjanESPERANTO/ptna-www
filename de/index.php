<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <title>PTNA - Dokumentation</title>
        <meta name="generator" content="PTNA" />
        <meta name="keywords" content="OSM Public Transport PTv2" />
        <meta name="description" content="PTNA - Dokumentation" />
        <meta name="robots" content="noindex,nofollow" />
        <link rel="stylesheet" href="/css/main.css" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="icon" type="image/png" href="/favicon.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/favicon.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" sizes="any" />
    </head>
    <body>
      <div id="wrapper">
        <header id="headerblock">
            <div id="headerimg" class="logo">
                <a href="/"><img src="/img/logo.png" alt="logo" /></a>
            </div>
            <div id="headertext">
                <h1><a href="/">PTNA - Public Transport Network Analysis</a></h1>
                <h2>Statische Auswertungen für OpenStreetMap</h2>
            </div>
            <div id="headernav">
                <a href="/">Home</a> |
                <a href="/contact.html">Kontakt</a> |
                <a target="_blank" href="https://www.openstreetmap.de/impressum.html">Impressum</a> |
                <a target="_blank" href="https://www.fossgis.de/datenschutzerklärung">Datenschutzerklärung</a> |
                <a href="/en/index.html" title="english"><img src="/img/GreatBritain16.png" alt="Union Jack" /></a>
                <a href="/de/index.html" title="deutsch"><img src="/img/Germany16.png" alt="deutsche Flagge" /></a>
                <!-- <a href="/fr/index.html" title="français"><img src="/img/France16.png" alt="Tricolore Française" /></a> -->
            </div>
        </header>

        <nav id="navigation">
            <h2>Dokumentation</h2>
            <ul>
                <li><a href="#motivation">Motivation</a></li>
                <li><a href="#overview">Überblick</a></li>
                <li><a href="#web">Die Web-site</a>
                    <ul>
                        <li><a href="#analysislist">Die Auswertungen</a></li>
                    </ul>
                </li>
                <li><a href="#networkroutes">Die zum Verkehrsverbund gehörigen Linien</a></li>
                <li><a href="#analysis">Die Analyse</a>
                    <ul>
                        <li><a href="#routesdescription">Beschreibung der erwarteten Linien</a></li>
                        <li><a href="#overpass">Download der Daten aus OSM</a></li>
                        <li><a href="#analysissettings">Definition von Auswertungsoptionen</a></li>
                        <li><a href="#dataanalysis">Analyse der Daten</a>
                            <ul>
                                <li><a href="#analysisdate">Datum der Daten</a></li>
                                <li><a href="#analysisroutes">Überblick über die ÖPNV-Linien ...</a></li>
                                <li><a href="#analysisnotassigned">Nicht eindeutig zugeordnete Linien</a></li>
                                <li><a href="#analysisother">Andere ÖPNV-Linien</a></li>
                                <li><a href="#analysisnoref">ÖPNV-Linien ohne 'ref'</a></li>
                                <li><a href="#analysisrelations">Weitere Relationen</a></li>
                                <li><a href="#analysisnetwork">Details zu 'network'-Werten</a>
                                    <ul>
                                       <li><a href="#analysisnetworkconsidered">Berücksichtigte 'network' Werte</a></li>
                                       <li><a href="#analysisnetworknotconsidered">Nicht berücksichtigte 'network' Werte</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#checks">Prüfungen</a>
                            <ul>
                                <li><a href="#scheme">Verwendetes Schema</a>
                                   <ul>
                                      <li><a href="#deviations">Abweichungen</a></li>
                                      <li><a href="#specials">Besonderheiten</a></li>
                                    </ul>
                                </li>
                                <li><a href="#approach">Vorgehensweise</a></li>
                                <li><a href="#messages">Meldungen</a></li>
                                <li><a href="#plannedmessages">Geplante Meldungen</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#code">Der Code</a>
                    <ul>
                        <li><a href="#ptna">ptna</a></li>
                        <li><a href="#ptnanetworks">ptna-networks</a></li>
                        <li><a href="#ptnawww">ptna-www</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <hr />

        <main id="main">

            <h2 id="motivation">Motivation</h2>
            <div class="indent">
                <p>
                    Erste <a href="https://wiki.openstreetmap.org/wiki/Talk:M%C3%BCnchen/Transportation#Qualit.C3.A4tssicherung_-_M.C3.BCnchen.2FTransportation">Diskussionen</a> fanden auf einem Münchner Stammtisch im Februar 2017 statt.
                </p>
                <p>
                    Ausgelöst wurde die ganze Diskussion durch unbeabsichtigtes Löschen von Bus-Relationen im Münchener Umfeld (es wurden aber neue Relationen erstellt).
                    Dadurch waren viele Links auf der Seite <a href="https://wiki.openstreetmap.org/wiki/München/Transportation#Verkehrsmittel">München/Transportation</a> nicht mehr aktuell.
                    Allerdings muss man auch sagen, dass die Seite in der Vergangenheit eh nicht gut gepflegt war, z.T. gar nicht bekannt war.
                    Die Qualität und Aktualität der Seite scheint also ein generelles Problem zu sein.
                </p>
                <p>
                    <strong>Problem:</strong> es hapert mit der Qualität der <a class="a" href="https://wiki.openstreetmap.org/wiki/München/Transportation#Verkehrsmittel">München/Transportation</a> Seite:
                </p>
                <ul>
                    <li>Vollständigkeit:
                        <ul>
                            <li>wir wissen nicht, ob wir alle existierenden Buslinien des MVV auf der Seite aufgelistet haben</li>
                            <li>wir wissen nicht, ob wir Artefakte, d.h. Buslinien gemapped haben die bereits (wieder) eingestellt oder umnummeriert worden sind</li>
                            <li>S-Bahn, U-Bahn und Tram sind in ihrer Anzahl überschaubar, da besteht die Chance, dass wir vollständig sind</li>
                        </ul>
                    </li>
                    <li>PTv2:
                        <ul>
                            <li>wir wissen nicht, welche der Linien schon auf "Public-Transport Version 2" umgestellt sind.</li>
                            <li><a href="https://wiki.openstreetmap.org/wiki/DE:Public_Transport">DE:Public_transport</a>. Den originalen Wortlaut des Proposals findet man unter
                                <a href="https://wiki.openstreetmap.org/w/index.php?title=Proposed_features/Public_Transport&amp;oldid=625726">Approved Feature Public Transport (approved Version 625726)</a>
                            </li>
                        </ul>
                    </li>
                    <li>Korrektheit:
                        <ul>
                            <li>wir wissen nicht, ob die auf PTv2 umgestellten Linien durchgängig und sortiert sind</li>
                            <li>d.h. ob die Ways komplett, in der richtigen Reihenfolge, ohne Lücken, ohne Fortsätze und bei Kreisverkehren korrekt erfasst sind</li>
                            <li>ob die "stop" und "platform" Member komplett und in der richtigen Reihenfolge erfasst sind</li>
                        </ul>
                    </li>
                    <li>Einheitlichkeit:
                        <ul>
                            <li>wir wissen nicht, ob alle Relationen mit ihren Tags komplett und korrekt sind</li>
                            <li>d.h. mit vorhanden, korrekten und gegebenenfalls einheitlichen "network", "operator",
                                "public_transport:version", "name", "ref", "from", "to" (und "via"), ...
                            </li>
                        </ul>
                    </li>
                    <li>Übersichtlichkeit:
                        <ul>
                            <li>wir haben keine Seite, auf der uns all das, <strong>vor allem aber die Probleme damit</strong>, übersichtlich angezeigt wird
                            </li>
                        </ul>
                    </li>
                    <li>Automatisierbarkeit:
                        <ul>
                            <li>wir haben keine Möglichkeit eine solche Übersichtsseite automatisiert zu erstellen (wöchentlich, ...)
                            </li>
                        </ul>
                    </li>
                </ul>
                <p>
                    <strong>Ursachen</strong> gibt es viele:
                </p>
                <ul>
                    <li>Vollständigkeit:
                        <ul>
                            <li>woher sollen wir die Informationen bekommen? Wir erhalten u.U. vom MVV eine Liste (CSV, ...)</li>
                        </ul>
                    </li>
                    <li>PTv2:
                        <ul>
                            <li>einige Linien haben weder "Version" 1 noch 2 als Tag: vergessen, Unkenntnis der Existenz ...</li>
                         </ul>
                    </li>
                    <li>Korrektheit:
                        <ul>
                            <li>das ist eine mühsame Kleinarbeit, die immer wieder und wieder angestoßen werden muss, da Relationen schnell mal (unbeabsichtigt) mit Lücken "versehen werden", ...</li>
                        </ul>
                    </li>
                    <li>Einheitlichkeit:
                        <ul>
                            <li>was ist denn der Standard? network=MVV oder network="Münchner Verkehrs- und Tarif-Verbund" und so weiter? <a href="https://wiki.openstreetmap.org/wiki/München/Transportation#Vorschlag_für_vereinheitliches_Tagging">München/Transportation Vorschlag_für_vereinheitliches_Tagging</a></li>
                        </ul>
                    </li>
                    <li>Übersichtlichkeit:
                        <ul>
                            <li>Teile der Seite sind schon übersichtlicher gestaltet, wie könnte eine übersichtlichere Seite aussehen (Layout?)</li>
                        </ul>
                    </li>
                    <li>Automatisierbarkeit:
                        <ul>
                            <li>da gibt es nichts</li>
                        </ul>
                    </li>
                </ul>
                <p>
                    Ein nicht repräsentativer Blick auf Berlin, Hamburg und Aachen zeigt, dass andere Städte u.U. das gleiche Problem haben.
                </p>
            </div> <!-- "motivation" -->

            <hr />

            <h2 id="overview">Überblick</h2>
            <div class="indent">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                </p>
            </div> <!-- "overview" -->

            <hr />

            <h2 id="web">Die Web-site</h2>
            <div class="indent">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                </p>
                <h3 id="analysislist">Die Auswertungen</h3>
                <div class="indent">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                    </p>
                    <ul>
                        <li>Name</li>
                        <li>City/Region</li>
                        <li>Verkehrsverbund</li>
                        <li>Auswertung</li>
                        <li>Letzte Änderung</li>
                        <li>Diskussion</li>
                        <li>Linien</li>
                    </ul>
                </div> <!-- "analysislist" -->
            </div> <!-- "web" -->

            <hr />

            <h2 id="networkroutes">Die zum Verkehrsverbund gehörigen Linien</h2>
            <div class="indent">
                <p>
                    <strong>Wichtig: Beachte das Copyright &copy; des Verkehrsverbundes bzw. die Herkunft der Daten!</strong><br /><br />
                    Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                </p>
                <p>
                    <strong>Beachte: Die Liste wird unter der <a href="https://www.gnu.org/licenses/gpl.html">GPL 3</a> veröffentlicht.</strong>
                </p>
            </div> <!-- "networkroutes" -->

            <hr />

            <h2 id="analysis">Die Analyse</h2>
            <div class="indent">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                </p>

                <h3 id="routesdescription">Beschreibung der erwarteten Linien</h3>
                <div class="indent">
                    <p>
                        <strong>Wichtig: Beachte das Copyright &copy; des Verkehrsverbundes bzw. die Herkunft der Daten!</strong><br /><br />
                        Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                    </p>
                    <p>
                        <strong>Beachte: Die Liste wird unter der <a href="https://www.gnu.org/licenses/gpl.html">GPL 3</a> veröffentlicht.</strong>
                    </p>
                    <p>
                        Beispiel: Linien des <a href="https://wiki.openstreetmap.org/wiki/M%C3%BCnchen/Transportation/MVV-Linien-gesamt">Münchner Verkehrs- und Tarifverbund</a> im OSM Wiki
                    </p>
                </div> <!-- "routesdescription" -->

                <h3 id="overpass">Download der Daten aus OSM</h3>
                <div class="indent">
                    <p>
                        Für den Download der Daten wird das Overpass-API verwendet.
                        Die Abfrage erfolgt außerhalb des eigentlichen Analysetools durch einen <code>wget</code>-Aufruf unter Linux.<br />
                    </p>
                        Die Abfrage selber gliedert sich in 3 große Teile:
                        <ol>
                            <li><strong>Eingrenzung und Abspeichern des Gebietes</strong><br />
                                   Folgenden Möglichkeiten gibt es:
                                <ul>
                                    <li>Namen der Kreise oder/und Landkreise<br />
                                        Beispiel: boundary=administrative und admin_level=6 und name~'(Dachau|München|Ebersberg|Erding|Starnberg|Freising|Tölz|Wolfratshausen|Fürstenfeldbruck)'
                                    </li>
                                    <li>Name des Regierungsbezirks<br />
                                        Beispiel: boundary=administrative und admin_level=5 und name='Oberbayern'
                                    </li>
                                    <li>Name des Verkehrsverbundes, sofern es dazu einen Relation gibt<br />
                                        Beispiel: boundary=public_transport und name='Verkehrsverbund Rhein-Sieg'
                                    </li>
                                    <li>Oder die Liste von Geokoordinaten eines umschließenden Polygons<br />
                                        Beispiel, einfaches Rechteck: poly:'48.0770 11.6378 48.0436 11.6378 48.0436 11.7024 48.0770 11.7024'<br />
                                    </li>
                                </ul>
                                    Hinweis: Die Definition mittels poly:'...' ist der aufwändigste aber zugleich auch der sicherste Weg:
                                <ul>
                                   <li>er ist eindeutig, denn z.b. einen Landkreis: admin_level=6 mit name="Coburg" mag es weltweit mehrfach geben.</li>
                                   <li>eine Relation mit type=boundary kann Lücken enthalten, es werden dann keine Daten runter geladen.</li>
                                </ul>
                            </li>
                            <li><strong>Auswahl und Abspeichern aller relevanten Route und deren Route-Master Relationen</strong></li>
                            <li><strong>Ausgabe der relevanten Informationen</strong></li>
                        </ol>
<!--
=== Auswahl und Abspeichern aller relevanten Route und deren Route-Master Relationen ===
* <code>(rel(area)[route~'(bus|tram|train|subway|light_rail|trolleybus|ferry|monorail|aerialway|share_taxi|funicular)'];rel(br);rel[type='route'](r);)->.routes;</code>
==== Auswahl und Abspeichern der Routen innerhalb des Gebietes ====
Es erfolgt eine unscharfe Auswahl durch Verwendung von '~'. Das stellt sicher, dass auch "verdächtige" Relationen mit z.B. <code>route='suspended_bus'</code>
gefunden werden.<br />
Es wird absichtlich nach 'route' und nicht nach 'route_master' gesucht, da PTv1 keine Route-Master kennt und wir eine Bestandsaufnahme aller ÖPNV-Linien anstreben.<br />
Nur Busse
* <code>rel(area)[route~'(bus)'];</code>
Busse und Bahnen
* <code>rel(area)[route~'(bus|train)'];</code>
Alle bekannten ÖPNV Typen
* <code>rel(area)[route~'(bus|tram|train|subway|light_rail|trolleybus|ferry|monorail|aerialway|share_taxi|funicular)'];</code>

==== Auswahl und Abspeichern der zugehörigen Route-Master (Eltern-Relationen) ====
Die Tags der Eltern-Relationen sowie die IDs der Member der Eltern-Relationen
* <code>rel(br);</code>

==== Auswahl und Abspeichern aller Route Relationen die zu den Route-Master Relationen gehören ====
Diese extra Abfrage stell sicher, dass auch diejenigen Route-Relationen ausgewählt werden, die sich außerhalb des Suchgebietes befinden, aber zum eigentlichen Suchumfang gehören sollten
* <code>rel[type='route'](r);</code>

=== Ausgabe der relevanten Informationen ===
* <code>(.routes;<<;rel(r.routes);way(r.routes);node(r.routes););out;</code>
==== Ausgabe aller abgespeicherten Route-Master und Route Relationen ====
* <code>.routes;</code>
==== Ausgabe aller Eltern-Relationen, Großeltern-Relationen, ... der Route-Master und Route Relationen====
* <code><<;</code>
==== Ausgabe der Member der Routen, die Relationen sind ====
Platforms, ... und deren Tags sowie deren Ways (nur deren IDs)
* <code>rel(r.routes);</code>
** gelegentlich werden hierdurch wieder weitere Route-Relationen geladen. Das führt zu Fehlermeldungen bei der Analyse
*** "Error in input data: ...", da deren Relation-, Way- und Node-Memmber nicht nachgeladen werden.
** das Nachladen von Route-Relationen an dieser Stelle deutet auf Fehler beim Mapping hin:
*** die nachgeledenen Route-Relationen sind Member von Route-Relationen oder Network-Relationen
*** die nachgeledenen Route-Relationen liegen zudem außerhalb des Suchgebietes, sind also für die Analyse nicht relevant.

==== Ausgabe der Member der Routen, die Ways sind ====
Straßen, Platforms, ... und deren Tags sowie die IDs ihrer Nodes (nicht die Tags der Nodes)
* <code>way(r.routes);</code>
==== Ausgabe der Member der Routen, die Nodes sind ====
Stop-Positions, Platforms, ... und deren Tags
* <code>node(r.routes);</code>

== Die Overpass-API-Abfrage liefert ==
* Die Overpass-API Abfrage liefert alle Routen für ÖPNV sowie deren Route-Master für den angegebenen Ort (die angegebene Region).
* Zusätzlich werden indirekt noch Routen außerhalb des Ortes, der Region über die Member-Ship der Route-Master Relationen geliefert.
* Des Weiteren werden alle Eltern-Relationen, Großeltern-Relationen, ... der Route-Relationen und Route-Master -Relationen gefunden.
* danach liefert die Abfrage noch alle Ways und Nodes der Routen (d.h. Member der Relationen mit ihren Details, sowie die Ids aller Nodes der Ways).

== Die Overpass-API-Abfrage liefert nicht ==
* Die Suche erfolgt absichtlich nicht nach "route_master"-Relationen und deren Mitgliedern.
** PTv1 relation haben keinen Route-Master, sie würden nicht gefunden werden, eine Bestandsaufnahme wäre somit unvollständig,
** Route-Master haben keine physischen Objekte, die Suche in einem Gebiet scheitert und liefert keine Daten.
* Route-Master ohne Routen (leere Route-Master) werden hiermit nicht gefunden.
* "stop_area"-Relationen werden nicht gesucht und somit auch nicht analysiert.
** sie haben keine Bedeutung für Linien des ÖPNV.
** dafür und für die Analyse von 'stop_position" und 'platform" Objekten könnte
*** evtl ein weiteres Tool geschrieben werden oder
*** das selbe Tool eine zweite Output-Datei erzeugen
*** oder schaut mal bei Ilya Zveriks [http://osmz.ru/subways/ Subway Validator] vorbei. [https://www.openstreetmap.org/user/Zverik/diary/43526 Blog].


== Die Overpass-API-Abfrage erlaubt ==
Diese Abfrage erlaubt eine Analyse der ÖPNV-Linien dahingehend, dass auch die Wegstrecke auf Vollständigkeit geprüft werden kann.
Nodes, Ways und Relationen (Stops und Platforms) und deren Tags können nun auch gegen deren Rolle 'role' in der Relation geprüft werden.
Die Abfrage liefert XML-Daten zwischen 1.1 MB und ~93 MB, je nach Größe des Gebietes und des Verkehrsverbundes (Gemeinde Ottobrunn: 1.1 MB, Verkehrsverbund Rhein-Nekar: ~93 MB).

== Beispiele ==
=== Suche nach dem (Land-)Kreis ===
Als Beispiel wird Landshut verwendet
Es werden alle Busse analysiert, die durch das Gebiet fahren.
* der Landkreis Landshut (name="Landkreis Landshut") hat den "admin_level" 6 und existiert weltweit als Kreis mit diesem Namen nur ein einziges mal - das ist zu beachten!
* die Kreisfreise Stadt Landshut (name="Landshut") hat den "admin_level" 6 und existiert weltweit als Kreis mit diesem Namen nur ein einziges mal - das ist zu beachten!
Da hier beide Kreise erfasst werden sollen wird die unscharfe Suche nach "Landshut" verwendet.
<pre>
http://overpass-api.de/api/interpreter?data=area[boundary=administrative][admin_level=6][name~'Landshut'];(rel(area)[route~'(bus)'];rel(br);rel[type='route'](r);)->.routes;(.routes;<<;rel(r.routes);way(r.routes);node(r.routes););out;
</pre>

=== Suche nach der Gemeinde ===
Als Beispiel wird hier die Gemeinde Ottobrunn südöstlich am Stadtrand von München verwendet.
Es werden alle Busse und Züge (S-Bahn) analysiert, die durch das Gemeindegebiet fahren.
* Die Gemeinde Ottobrunn hat den "admin_level" 8 und existiert weltweit als Gemeinde mit diesem Namen nur ein einziges mal - das ist zu beachten!
<pre>
http://overpass-api.de/api/interpreter?data=area[boundary=administrative][admin_level=8][name='Ottobrunn'];(rel(area)[route~'(bus|train)'];rel(br);rel[type='route'](r);)->.routes;(.routes;<<;rel(r.routes);way(r.routes);node(r.routes););out;
</pre>

=== Suche per Polygon ===
Als Beispiel hier eine Gegend um Augsburg herum definiert. Die Definition erfolgt per Polygon.
Es werden alle Busse und Züge (S-Bahn) analysiert, die durch das Gebiet fahren.<br />
Hier wurde der Einfachheit halber ein Rechteck gewählt mit: oben links, unten links, unten rechts, oben rechts.
Es sind jedoch beliebige Polygone realisierbar - durch Hinzufügen von weiteren Breitengrad/Längengrad-Paaren.
Siehe auch: [[Talk:Augsburg/Transportation/Analyse#Overpass-API_Abfrage|Overpass-API Abfrage für Augsburger Verkehrs- und Tarifverbund]]
<pre>
http://overpass-api.de/api/interpreter?data=(rel(poly:'48.0770 11.6378 48.0436 11.6378 48.0436 11.7024 48.0770 11.7024')[route~'(bus|train)'];rel(br);rel[type='route'](r);)->.routes;(.routes;<<;rel(r.routes);way(r.routes);node(r.routes););out;
</pre>

=== Suche per Verkehrsverbund ===
Als Beispiel wird hier ein Verkehrsverbund, für den es eine boundary=public_transport Relation gibt.
Es werden alle ÖPNV-Transportmittel analysiert, die durch das Gebiet fahren.<br />
Hier werden die Grenzen des [[Talk:VRS/Analyse#Overpass-API_Abfrage|VRS, Verkehrsverbund Rhein-Sieg]], benutzt.
<pre>
http://overpass-api.de/api/interpreter?data=area[boundary=public_transport][name='Verkehrsverbund Rhein-Sieg'];(rel(area)[route~'(bus|tram|train|subway|light_rail|trolleybus|ferry|monorail|aerialway|share_taxi|funicular)'];rel(br);rel[type='route'](r);)->.routes;(.routes;<<;rel(r.routes);way(r.routes);node(r.routes););out;
</pre>
-->
                    <p>
                        Siehe: <a href="https://wiki.openstreetmap.org/wiki/User:ToniE/analyze-routes#Download_der_Daten_via_Overpass-API_Abfrage">OSM Wiki</a>
                    </p>
                    <p>
                        Beispiel: Overpass-API query für <a href="https://wiki.openstreetmap.org/wiki/Talk:M%C3%BCnchen/Transportation/Analyse#Overpass-API_Abfrage">Münchner Verkehrs- und Tarifverbund</a>
                    </p>
                </div> <!-- "overpass" -->

                <h3 id="analysissettings">Definition von Auswertungsoptionen</h3>
                <div class="indent">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                    </p>
                    <p>
                        Beispiel: Optionen für <a href="https://wiki.openstreetmap.org/wiki/Talk:M%C3%BCnchen/Transportation/Analyse#Auswertungsoptionen">Münchner Verkehrs- und Tarifverbund</a>
                    </p>
                </div> <!-- "#analysissettings" -->

                <h3 id="dataanalysis">Analyse der Daten</h3>
                <div class="indent">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                    </p>

                    <h4 id="analysisdate">Datum der Daten</h4>
                    <div class="indent">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                        </p>
                        <p>
                            Beispiel: <a href="/results/DE/BY/DE-BY-MVV-Analysis.html#A1">Münchner Verkehrs- und Tarifverbund</a>
                        </p>
                    </div> <!-- "analysisdate" -->

                    <h4 id="analysisroutes">Überblick über die ÖPNV-Linien ... </h4>
                    <div class="indent">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                        </p>
                        <p>
                            Beispiel: <a href="/results/DE/BY/DE-BY-MVV-Analysis.html#A2">Münchner Verkehrs- und Tarifverbund</a>
                        </p>
                    </div> <!-- "analysisroutes" -->

                    <h4 id="analysisnotassigned">Nicht eindeutig zugeordnete Linien</h4>
                    <div class="indent">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                        </p>
                        <p>
                            Beispiel: <a href="/results/DE/SN/DE-SN-VMS-Analysis.html#A3">Verkehrsverbund Mittelsachsen</a>
                        </p>
                    </div> <!-- "analysisnotassigned" -->

                    <h4 id="analysisother">Andere ÖPNV-Linien</h4>
                    <div class="indent">
                        <p>
                            Übrig bleiben die Linien, die
                        </p>
                        <ul>
                            <li>den network-Tag Kriterien entsprechen und</li>
                            <li>eben nicht in der Liste (CSV-Datei) "Beschreibung der erwarteten Linien" vorkommen.</li>
                        </ul>

                        <p>
                            Taucht in dieser Liste ("Andere ÖPNV-Linien") z.B. eine Linie 724 auf, und
                        </p>
                        <ul>
                            <li>das 'network' tag ist gesetzt und passt zum analysierten Verkehrsverbund?
                                <ul>
                                    <li>Die Linie wurde u.U. eingestellt - denn sonst würde sie bei der Liste "Überblick über die ÖPNV-Linien ... " auftauchen.</li>
                                    <li>Die Linie existiert tatsächlich und fehlt in der Liste (CSV-Datei) "Beschreibung der erwarteten Linien".</li>
                                </ul>
                            </li>
                            <li>das 'network' tag ist nicht gesetzt und müsste eigentlich zum analysierten Verkehrsverbund passen?
                                <ul>
                                    <li>Die Linie wurde u.U. eingestellt - denn sonst würde sie bei der Liste "Überblick über die ÖPNV-Linien ... " auftauchen.</li>
                                    <li>Die Linie existiert tatsächlich und fehlt in der Liste (CSV-Datei) "Beschreibung der erwarteten Linien".</li>
                                </ul>
                            </li>
                            <li>das 'network' tag ist nicht gesetzt und müsste eigentlich zu einem anderen Verkehrsverbund passen?
                                <ul>
                                    <li>Das 'network' tag mit dem korrekten Wert des anderen Verkehrsverbundes zu belegen lässt die Linie aus der Auswertung verschwinden.</li>
                                </ul>
                            </li>
                        </ul>
                        <p>
                            Beispiel: <a href="/results/DE/BY/DE-BY-RVO-Analysis.html#A3">Regionalverkehr Oberbayern</a>
                        </p>
                    </div> <!-- "analysisother" -->

                    <h4 id="analysisnoref">ÖPNV-Linien ohne 'ref'</h4>
                    <div class="indent">
                        <p>
                            Hierzu zählen alle Linien, die
                        </p>
                        <ul>
                            <li>keinen ref-Tag haben
                                <ul>
                                    <li>egal, ob sie den network-Tag Kriterien entsprechen oder nicht</li>
                                </ul>
                            </li>
                        </ul>
                        <p>
                            Beispiel: <a href="/results/DE/NI/DE-NI-VEJ-Analysis.html#A4">Verkehrsverbund Ems-Jade</a>
                        </p>
                    </div> <!-- "analysisnoref" -->

                    <h4 id="analysisrelations">Weitere Relationen</h4>
                    <div class="indent">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                        </p>
                        <p>
                            Dieser Abschnitt enthält weitere Relationen aus dem Umfeld der Linien:
                        </p>
                        <ul>
                            <li>evtl. falsche 'route' oder 'route_master' Werte?
                                <ul>
                                    <li>z.B. 'route' = "suspended_bus" statt 'route' = "bus"</li>
                                </ul>
                            </li>
                            <li>aber auch 'type' = 'network' oder 'route' = "network", d.h. eine Sammlung aller zum 'network' gehörenden Route und Route-Master.
                                <ul>
                                    <li>solche <strong>Sammlungen sind streng genommen Fehler</strong>, da Relationen keinen Sammlungen darstellen sollen: Relationen sind keine Kategorien</li>
                                </ul>
                            </li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisici elit, …</li>
                        </ul>

                        <p>
                            Die Darstellung erfolgt in diesem Abschnitt lediglich mit der Relation-ID und markanten Tags.
                        </p>
                        <p>
                            Beispiel: <a href="/results/DE/NW/DE-NW-VRS-Analysis.html#A5">Verkehrsverbund Rhein-Sieg (VRS)</a>
                        </p>
                    </div> <!-- "analysisrelations" -->

                    <h4 id="analysisnetwork">Details zu 'network'-Werten</h4>
                    <div class="indent">
                        <p>
                            Das 'network' Tag wird nach den folgenden Werten durchsucht:
                        </p>
                        <ul>
                            <li>"langer" Name des Verkehrsverbundes</li>
                            <li>"kurzer" Name des Verkehrsverbundes</li>
                            <li>'network' ist nicht gesetzt</li>
                        </ul>

                        <h5 id="analysisnetworkconsidered">Berücksichtigte 'network' Werte</h5>
                        <div class="indent">
                            <p>
                                Dieser Abschnitt listet die 'network'-Werte auf, die berücksichtigt wurden, d.h. einen der oben genannten Werte enthält.
                            </p>
                            <p>
                                Beispiel: <a href="/results/DE/SN/DE-SN-VMS-Analysis.html#A7.1">Verkehrsverbund Mittelsachsen (VMS)</a>
                            </p>
                        </div> <!-- "analysisnetworkconsidered" -->

                        <h5 id="analysisnetworknotconsidered">Nicht berücksichtigte 'network' Werte</h5>
                        <div class="indent">
                            <p>
                                Dieser Abschnitt listet die 'network'-Werte auf, die nicht berücksichtigt wurden. Darunter können auch Tippfehler in ansonsten zu berücksichtigenden Werten sein.
                            </p>
                            <p>
                                Beispiel: <a href="/results/DE/SN/DE-SN-VMS-Analysis.html#A7.2">Verkehrsverbund Mittelsachsen (VMS)</a>
                            </p>
                        </div> <!-- "analysisnetworknotconsidered" -->
                    </div> <!-- "analysisnetwork" -->
                </div> <!-- "dataanalysis" -->

                <h3 id="checks">Prüfungen</h3>
                <div class="indent">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                    </p>

                    <h4 id="scheme">Verwendetes Schema</h4>
                    <div class="indent">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, …
<!--        Die Daten durchlaufen mehrere Prüfungen, wobei der Fokus auf dem Schema: '''Public Transport Version 2''' liegt. Dieses Schema wird beschrieben unter:
* [[DE:Public_transport|Public Transport]]
* [http://wiki.openstreetmap.org/w/index.php?title=Proposed_features/Public_Transport&oldid=625726 Approved Feature Public Transport (approved Version 625726)]
wobei ich mich vornehmlich auf das '''Approved Feature Public Transport''' beziehe, da die einzelnen Tags dort weitaus besser beschrieben sind.
-->
                        </p>
                        <p>
                            Siehe: <a href="https://wiki.openstreetmap.org/wiki/User:ToniE/analyze-routes#Verwendetes_Schema">OSM Wiki</a>
                        </p>

                        <h5 id="deviations">Abweichungen</h5>
                        <div class="indent">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                            </p>
                            <p>
                                Siehe: <a href="https://wiki.openstreetmap.org/wiki/User:ToniE/analyze-routes#Abweichungen">OSM Wiki</a>
                            </p>
                        </div> <!-- "deviations" -->

                        <h5 id="specials">Besonderheiten</h5>
                        <div class="indent">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                            </p>
                            <p>
                                Siehe: <a href="https://wiki.openstreetmap.org/wiki/User:ToniE/analyze-routes#Besonderheiten">OSM Wiki</a>
                            </p>
                        </div> <!-- "specials" -->
                    </div> <!-- "scheme" -->

                    <h4 id="approach">Vorgehensweise</h4>
                    <div class="indent">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                        </p>
                        <p>
                            Siehe: <a href="https://wiki.openstreetmap.org/wiki/User:ToniE/analyze-routes#Vorgehensweise">OSM Wiki</a>
                        </p>
                    </div> <!-- "approach" -->

                    <h4 id="messages">Meldungen</h4>
                    <div class="indent">
                        <p>
                            <!--  Siehe: <a href="https://wiki.openstreetmap.org/wiki/User:ToniE/analyze-routes#Momentane_Pr.C3.BCfungen">OSM Wiki</a> -->
                        </p>
                        <?php include "message-table.inc" ?>

                        <!-- <table id="message-table">
                            <thead>
                                <tr class="message-tableheaderrow">
                                    <th class="message-text">Text</th>
                                    <th class="message-type">Typ</th>
                                    <th class="message-option">Tool Option</th>
                                    <th class="message-description">Erläuterung</th>
                                    <th class="message-treatment">Behandlung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="message-tablerow">
                                    <td class="message-text">Fehlende Linie f&uuml;r 'ref' = '%s' und 'route' = '%s'</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">diese Route wird laut z.B. CSV-Datei als '%s' (bus, tram, ...) erwartet, existiert aber nicht im gegebenen Datensatz (siehe: <a href="#overpass">Overpass-API Abfrage</a>)</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-name">Es existiert mehr als ein Route-Master</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">Route: Es gibt mehr als einen Route-Master für diese Linie = 'ref' plus Eltern-Route-Master dieser Route</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master haben mehr Routen als im Datensatz tats&auml;chlich passend gefunden wurden (%d gegen&uuml;ber %d)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route-Master haben mehr Route-Relationen als hier aufgelistet sind (Route ohne oder mit anderem 'ref'/'route'/'network' tag?).</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master haben weniger Routen als im Datensatz tats&auml;chlich passend gefunden wurden (%d gegen&uuml;ber %d)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route-Master haben weniger Route-Relationen als hier aufgelistet sind (Route(n) nicht im Route-Master eingetragen?).</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master hat mehr Routen als im Datensatz tats&auml;chlich passend gefunden wurden (%d gegen&uuml;ber %d)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">dieser Route-Master hat mehr Route-Relationen als hier aufgelistet sind (Route ohne oder mit anderem 'ref'/'route'/'network' tag?)</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master hat weniger Routen als im Datensatz tats&auml;chlich passend gefunden wurden (%d gegen&uuml;ber %d)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">dieser Route-Master hat weniger Route-Relationen als hier aufgelistet sind (Route(n) nicht im Route-Master eingetragen?)</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route ist unter der 'ref' = '%s' m&ouml;glicherweise in einem anderen Abschnitt oder im Abschnitt 'Nicht eindeutig zugeordnete Linien' gelistet: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route hat einen anderen 'operator' = '%s' Wert als der Route-Master 'operator' = '%s': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist Member dieses Route-Masters, hat aber einen anderen 'operator' tag (letztes %s = ID der Route)</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route hat einen 'operator' = '%s' Wert, der als irrelevant betrachtet wird: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist Member dieses Route-Masters, hat aber einen merkwürdigen, unpassenden 'operator' tag (letztes %s = ID der Route). Der 'operator'-Wert passt nicht zu den relevanten 'operator'-Werten (siehe --operator-regex).</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route hat einen anderen 'network' = '%s' Wert als der Route-Master 'network' = '%s': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist Member dieses Route-Masters, hat aber einen anderen 'network' tag (letztes %s = ID der Route)</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route hat einen 'network' = '%s' Wert, der als irrelevant betrachtet wird: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist Member dieses Route-Masters, hat aber einen merkwürdigen, unpassenden 'network' tag (letztes %s = ID der Route). Der 'network'-Wert passt nicht zu den relevanten 'network'-Werten (siehe --network-short-regex und --network-long-regex).</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route hat einen anderen 'ref' = '%s' Wert als der Route-Master 'ref' = '%s - das sollte vermieden werden': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route hat unpassenden 'ref' = '%s' Wert: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist Member dieses Route-Masters, hat aber einen anderen 'ref' tag (letztes %s = ID der Route)</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route existiert im geladenen Datensatz, 'ref' ist aber nicht gesetzt: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist Member dieses Route-Masters, existiert aber nicht - zumindest nicht im gegebenen Datensatz ( %s = ID der Route).</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route hat einen anderen 'route' = '%s' Wert als der Route-Master 'route' = '%s': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist Member dieses Route-Masters, hat aber einen anderen 'route' tag (letztes %s = ID der Route)</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route hat einen 'route' = '%s' Wert, der als irrelevant betrachtet wird: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist Member dieses Route-Masters, hat aber einen merkwürdigen, unpassenden 'route' tag (letztes %s = ID der Route).</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'route' ist nicht gesetzt: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">das route-Tag ist nicht vorhanden.</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'type' = '%s' ist nicht 'route': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">das type-Tag hat einen falschen Wert.</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'type' ist nicht gesetzt: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">das type-Tag ist nicht vorhanden.</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route wurde im geladenen Datensatz nicht gefunden: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route ist nicht Element des Route-Masters: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route ist nicht Member dieses Route-Masters (%s = ID der Route).</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master ist unter der selben 'ref' = '%s' m&ouml;glicherweise in einem anderen Abschnitt oder im Abschnitt 'Nicht eindeutig zugeordnete Linien' gelistet: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master ist mit undefiniertem 'ref' Wert m&ouml;glicherweise im Abschnitt '&Ouml;PNV Linien ohne 'ref'-Wert' gelistet: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Die Route ist direktes Element von mehr als einem Route-Master: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">Diese Route hat mehr als einen Eltern-Route-Master (%s = Liste der Route-Master).</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Mehrere Routen aber diese Route ist nicht Element eines existierenden Route-Masters</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Diese Route ist nicht Element eines existierenden Route-Masters</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">es existiert mindestens ein Route-Master für diese Linie, aber diese Route ist nicht Member irgend eines Route-Masters.</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'route' = '%s' der Route passt nicht zu 'route_master' = '%s' des Route-Masters: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master hat unpassenden  'ref' = '%s' Wert: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'network' = '%s' der Route passt nicht zu 'network' = '%s' des Route-"Masters: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">"Mehrere Routen aber 'public_transport:version' ist nicht auf '2' gesetzt</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'ref' ist nicht gesetzt</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">das ref-Tag ist nicht vorhanden.</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'name' ist nicht gesetzt</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">das name-Tag ist nicht vorhanden.</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'network' ist nicht gesetzt</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">das network-Tag ist nicht vorhanden.</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'network' = '%s' sollte in Kurzform angegeben werden</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'network' = '%s' sollte in Langform angegeben werden</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'network' ist Langform</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'network' passt zur Langform</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'network' = '%s' enth&auml;lt das Trennzeichen ';' (Semikolon) mit umgebendem Leerzeichen</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'network' = '%s': ',' (Komma) als Trennzeichen sollte durch ';' (Semikolon, ohne Leerzeichen) ersetzt werden</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'colour' hat einen unbekannten Wert '%s'</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'colour' der Route passt nicht zu 'colour' des Route-Masters: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'colour' der Route ist gesetzt aber 'colour' des Route-Masters ist nicht gesetzt: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'colour' der Route ist nicht gesetzt aber 'colour' des Route-Masters ist gesetzt: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master ohne Route(n)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master mit Relation(en) ungleich "route"</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route-Master Relation enthält Relation(en) die nicht vom Typ "route" sind.</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master mit Way(s)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route-Master Relation enthält Straßen/Schienen/Bahn-/Bussteige/...</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route-Master mit Node(s)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route-Master Relation enthält Haltestellen oder Bahn-/Bussteige</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'public_transport:version' ist nicht '2'</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'public_transport:version' ist nicht gesetzt</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route ohne Way(s)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route enthält keine Straßen/Schienen/...</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route mit nur einem Way</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route enthält nur eine Straße/Schiene/... (Ausnahme: Fähren, Seilbahnen)</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route ohne Node(s)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route enthält keine Haltestellen und Bahn-/Bussteige</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route mit nur einem Node</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route enthält nur eine Haltestelle bzw. nur einen Bahn-/Bussteig</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route mit Relation(en)</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description">die Route enthält andere Relation(en) (Ausnahme: 'role' ='platform*' vom 'type' = 'multipolygon')</td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">'public_transport:version' ist weder '1' noch '2'</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: der erste Weg ist eine Einbahnstra&szlig;e und endet in einer 'stop_position' und es geht nicht mehr weiter. Sind die Wege der Route falsch herum sortiert?</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: hat eine L&uuml;cke, besteht aus %d Segmenten</td>
                                    <td class="message-type" rowspan="2">Fehler</td>
                                    <td class="message-option" rowspan="2"></td>
                                    <td class="message-description" rowspan="2">Die Fahrstrecke ist nicht durchgängig und in %d Segmente zerfallen, hat also Lücken.</td>
                                    <td class="message-treatment" rowspan="2"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: hat L&uuml;cken, besteht aus %d Segmenten</td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: falsche Reihenfolge von 'stop_position', 'platform' und 'way': 'stop_position'/'platform' m&uuml;ssen vor allen 'way' kommen</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: enth&auml;lt %d kompletten Kreisverkehr von dem aber nur Teile benutzt werden</td>
                                    <td class="message-type" rowspan="2"></td>
                                    <td class="message-option" rowspan="2"></td>
                                    <td class="message-description" rowspan="2"></td>
                                    <td class="message-treatment" rowspan="2"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: enth&auml;lt %d komplette Kreisverkehre von denen aber nur Teile benutzt werden</td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Einbahnstra&szlig;e wird in der falschen Richtung benutzt: %s</td>
                                    <td class="message-type" rowspan="2">Fehler</td>
                                    <td class="message-option" rowspan="2"></td>
                                    <td class="message-description" rowspan="2">Wege führen falsch herum in Einbahnstraßen hinein  (%s = Liste der Ways). <br />JOSM erkennt das derzeit (2017-06-13) ohne das 'pt_assistant Plug-In nicht: Ticket #14711.<br />Bei oneway:bus=no, oneway:psv=no oder busway=opposite_lane erscheint diese Meldung natürlich nicht.<br />Bei der weiteren Analyse wird davon ausgegangen, dass der Weg in der 'falschen' Richtung befahren werden darf. Es entsteht hierdurch keine 'Lücke'.</td>
                                    <td class="message-treatment" rowspan="2"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Einbahnstra&szlig;en werden in der falschen Richtung benutzt: %s</td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: es wird eine 'motorway_link' Stra&szlig;e benutzt ohne vorher oder nachher eine 'motorway' Stra&szlig;e benutzt zu haben: %s</td>
                                    <td class="message-type" rowspan="2">Fehler</td>
                                    <td class="message-option" rowspan="2">--check-motorway_link</td>
                                    <td class="message-description" rowspan="2">Das Fahrzeug benutzt eine Autobahnauf- bzw. abfahrt ohne unmittelbar danach oder davor eine Autobahn/Trunk zu benutzen. Das kann auf falsches Tagging des highway=motorway_link hinweisen. Es kann aber auch auf eine falsche Route hinweisen, wenn diese z.B. automatisch durch eine Routing-SW erstellt wurde. Es scheint noch Routing-SW zu geben, die lieber auf ein kurzes Stück Autobahnauffahrt lenkt um nach 20 m zu wenden und wieder zurück auf die alte Strecke zu routen, statt den direkten Weg zu nehmen (weil eine Ampel das Ergebnis beeinflusst?).<br />Voraussetzung: die Route ist ohne Lücke(n).</td>
                                    <td class="message-treatment" rowspan="2"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: es werden 'motorway_link' Stra&szlig;en benutzt ohne vorher oder nachher eine 'motorway' Stra&szlig;e benutzt zu haben: %s</td>
                                 </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Der erste Punkt einer Einbahnstra&szlig;e hat die 'role' = 'stop_exit_only': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Der letzte Punkt einer Einbahstra&szlig;e hat die 'role' = 'stop_entry_only': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Der erste Punkt des Fahrweges hat die 'role' = 'stop_exit_only'. Sind die Wege der Route falsch herum sortiert?: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Der letzte Punkt des Fahrweges hat die 'role' = 'stop_entry_only'. Sind die Wege der Route falsch herum sortiert?: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'public_transport' = 'stop_position' liegt nicht auf dem Fahrweg: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Fehlende Angabe '%s' = 'yes' an 'public_transport' = 'stop_position': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Konflikt zwischen 'role' = '%s' und 'public_transport' = '%s': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'role' = '%s' und 'highway' = 'bus_stop': 'public_transport' = 'stop_position' sollte gesetzt werden: %s</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'role' = '%s' aber 'public_transport' ist nicht gesetzt: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'public_transport' = 'platform' liegt auf dem Fahrweg: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'role' = '%s' und 'highway' = 'bus_stop': 'public_transport' = 'platform' sollte gesetzt werden: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: falsche 'role' = '%s': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Leere 'role': %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: der erste Punkt des Fahrweges ist nicht die erste 'stop_position' der Route: %s gegen&uuml;ber %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: auf dem ersten Weg der Route gibt es keine 'stop_position' au&szlig;er dem letzten Punkt, der aber auch der erste Punkt des zweiten Weges ist: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: die erste 'stop_position' auf dem ersten Weg ist nicht die erste 'stop_position' der Route: %s gegen&uuml;ber %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: es gibt keine 'stop_position' auf dem ersten Weg der Route: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: der erste Punkt des Weges ist keine 'stop_position' dieser Route: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: der letzte Punkt des Fahrweges ist nicht die letzte 'stop_position' der Route: %s gegen&uuml;ber %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: auf dem letzte Weg der Route gibt es keine 'stop_position' au&szlig;er dem ersten Punkt, der aber auch der letzte Punkt des vorletzten Weges ist: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: die letzte 'stop_position' auf dem letzten Weg ist nicht die letzte 'stop_position' der Route: %s gegen&uuml;ber %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: es gibt keine 'stop_position' auf dem letzten Weg der Route: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: der letzte Punkt des Weges ist keine 'stop_position' dieser Route: %s</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'name' enth&auml;lt un&uuml;bliches '==>'</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: '%s' ist nicht Teil von 'name' (hergeleitet von '%s' = '%s')</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Der 'Von'-Anteil ('%s') von 'name' ist nicht Teil von 'from' = '%s'</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'from' = '%s' ist nicht Teil von 'name'</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'from' ist nicht gesetzt</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: Der 'Nach'-Anteil ('%s') von 'name' ist nicht Teil von 'to' = '%s'</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'to' = '%s' ist nicht Teil von 'name'</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'to' ist nicht gesetzt</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'via' ist gesetzt: der %d. '&Uuml;ber'-Anteil ('%s') von 'name' ist nicht gleich dem %d. via-Teil = '%s'</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: es gibt mehr '&Uuml;ber'-Anteile in 'name (%d) als in 'via' (%d)</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: es gibt weniger '&Uuml;ber'-Anteile in 'name (%d) als in 'via' (%d)</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'name' enth&auml;lt mehr als ein '=>', aber 'via' ist nicht gesetzt</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'name' sollte ann&auml;hernd die Form '... ref ...: from => to' haben</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">PTv2 Route: 'name' sollte (mindest) von der Form '... ref ...: from => to' sein</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: eingeschr&auml;nkte Befahrbarkeit (%s) auf Weg ohne dass 'psv' = 'yes', '%s' = 'yes', '%s' = 'designated', oder ... angegeben ist: %s</td>
                                    <td class="message-type" rowspan="2">Fehler</td>
                                    <td class="message-option" rowspan="2">--check-access</td>
                                    <td class="message-description" rowspan="2">Es werden Wege benutzt, die explizit oder implizit nicht befahren werden dürfen und wo 'bus'='yes', 'bus'='designated', 'bus'='official', 'psv'='yes', ... fehlen (letztes %s = Liste der Ways).<br />Derzeit wird in dieser Reihenfolge geprüft: access=no, access=private, vehicle=no, vehice=private, motor_vehicle=no, motor_vehicle=private, motor_car=no, motor_car=private, highway=pedestrian, highway=footway, highway=cycleway, highway=path, highway=construction</td>
                                    <td class="message-treatment" rowspan="2"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: eingeschr&auml;nkte Befahrbarkeit (%s) auf Wegen ohne dass 'psv' = 'yes', '%s' = 'yes', '%s' = 'designated', oder ... angegeben ist: %s</td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'highway' = 'bus_stop' ist auf einem 'way' gesetzt. Dieses Tag ist nur auf Nodes erlaubt.: %s</td>
                                    <td class="message-type" rowspan="2">Fehler</td>
                                    <td class="message-option" rowspan="2"></td>
                                    <td class="message-description" rowspan="2"></td>
                                    <td class="message-treatment" rowspan="2"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'highway' = 'bus_stop' ist auf mehreren 'way' gesetzt. Dieses Tag ist nur auf Nodes erlaubt.: %s</td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'route_ref' = '%s' der Haltestelle enth&auml;lt nicht den 'ref' = '%s' Wert dieser Route (trenne mehrere Werte durch ';' (Semikolon) ohne Leerzeichen): %s</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'route_ref' = '%s' der Haltestelle enth&auml;lt das Trennzeichen ';' (Semikolon) mit umgebendem Leerzeichen: %s</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'route_ref' = '%s' der Haltestelle: ',' (Komma) als Trennzeichen sollte durch ';' (Semikolon, ohne Leerzeichen) ersetzt werden: %s</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: '%s' = '%s' der Haltestelle sollte gel&ouml;scht werden, 'route_ref' = '%s' "existiert: %s</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: 'ref' = '%s' der Haltestelle sollte die Referenz der Haltestelle sein, enth&auml;lt aber die 'ref' = '%s' dieser Route: %s</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Route: '%s' = '%s' der Haltestelle sollte durch 'route_ref' = '%s' ersetzt werden: %s</td>
                                    <td class="message-type"></td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Fehler in den Inputdaten: nicht gen&uuml;gend Daten f&uuml;r 'ways'</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Fehler in den Inputdaten: nicht gen&uuml;gend Daten f&uuml;r 'nodes'</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Fahrzeugtyp wird nicht unterst&uuml;tzt: '%s'. Zeile %s der Routen-Daten. Inhalt der Zeile: '%s'</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                                <tr class="message-tablerow">
                                    <td class="message-text">Fahrzeugtyp ist nicht definiert. Zeile %s der Routen-Daten. Inhalt der Zeile: '%s'</td>
                                    <td class="message-type">Fehler</td>
                                    <td class="message-option"></td>
                                    <td class="message-description"></td>
                                    <td class="message-treatment"></td>
                                </tr>
                            </tbody>
                        </table>
-->
                    </div> <!-- "messages" -->

                    <h4 id="plannedmessages">Geplante Meldungen</h4>
                    <div class="indent">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                        </p>
                        <p>
                            Siehe: <a href="https://wiki.openstreetmap.org/wiki/User:ToniE/analyze-routes#Geplante_Pr.C3.BCfungen">OSM Wiki</a>
                        </p>
                    </div> <!-- "plannedmessages" -->
                </div> <!-- "checks" -->
            </div> <!-- "analysis" -->

            <hr />

            <h2 id="code">Der Code</h2>
            <div class="indent">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                </p>

                <h3 id="ptna">ptna</h3>
                <div class="indent">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                    </p>
                    <p>
                        Siehe: <a href="https://github.com/osm-ToniE/ptna">ptna auf GitHub</a>
                    </p>
                </div> <!-- "ptna" -->

                <h3 id="ptnanetworks">ptna-networks</h3>
                <div class="indent">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                    </p>
                    <p>
                        Siehe: <a href="https://github.com/osm-ToniE/ptna-networks">ptna-networks auf GitHub</a>
                    </p>
                </div> <!-- "ptnanetworks" -->

                <h3 id="ptnawww">ptna-www</h3>
                <div class="indent">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisici elit, …
                    </p>
                    <p>
                        Siehe: <a href="https://github.com/osm-ToniE/ptna-www">ptna-www auf GitHub</a>
                    </p>
                </div> <!-- "ptnawww" -->
            </div> <!-- "code" -->
        </main>

        <hr />

        <footer id="footer">
            <p>
                All geographic data <a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors</a>.
            </p>
            <p>
                This program is free software: you can redistribute it and/or modify it under the terms of the <a href="https://www.gnu.org/licenses/gpl.html">GNU GENERAL PUBLIC LICENSE, Version 3, 29 June 2007</a> as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. Get the source code via <a href="https://github.com/osm-ToniE">GitHub</a>.
            </p>
        </footer>

	</div> <!-- wrapper -->
    </body>
</html>

