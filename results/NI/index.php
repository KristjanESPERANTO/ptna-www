<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PTNA - Results</title>
        <meta name="generator" content="PTNA" />
        <meta name="keywords" content="OSM Public Transport PTv2" />
        <meta name="description" content="PTNA - Results of the Analysis of various Networks" />
        <meta name="robots" content="noindex,nofollow" />
        <link rel="stylesheet" href="/css/main.css" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="icon" type="image/png" href="/favicon.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/favicon.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" sizes="any" />
        <?php
            function CreateEntry( $network ) {
                $prefixparts = explode( '-', $network );
                $countrydir  = array_shift( $prefixparts );
                if ( count($prefixparts) > 1 ) {
                    $subdir = array_shift( $prefixparts );
                    $detailsfilename  = '/osm/ptna/work/' . $countrydir . '/' . $subdir . '/' . $network . '-Analysis-details.txt';
                    $diff_filename    = $subdir . '/' . $network . '-Analysis.diff.html';
                } else {
                    $detailsfilename  = '/osm/ptna/work/' . $countrydir . '/' . $network . '-Analysis-details.txt';
                    $diff_filename    = $network . '-Analysis.diff.html';  
                }
                $data_hash = [];
                $data_hash['OLD_OR_NEW'] = 'old';
                if ( file_exists($detailsfilename) ) {
                    $lines = file( $detailsfilename, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES  );
    
                    foreach ( $lines as $line ) {
                        list($key,$value) = explode( '=', $line, 2 );
                        $key              = rtrim(ltrim($key));
                        $data_hash[$key]  = rtrim(ltrim($value));
                    }
                }
                if ( $data_hash['NEW_DATE_UTC'] && $data_hash['NEW_DATE_LOC'] ) {
                    echo '<td data-ref="'.$network.'-datadate" class="results-datadate"><time datetime="'.$data_hash['NEW_DATE_UTC'].'">'.$data_hash['NEW_DATE_LOC'].'</time></td>';
                } else {
                    echo '<td data-ref="'.$network.'-datadate" class="results-datadate">&nbsp;</td>';
                }
                echo "\n                        ";
                if ( $data_hash['OLD_DATE_UTC'] && $data_hash['OLD_DATE_LOC'] && $data_hash['OLD_OR_NEW'] ) {
                    echo '<td data-ref="'.$network.'-analyzed" class="results-analyzed-'.$data_hash['OLD_OR_NEW'].'"><a href="'.$diff_filename.'"><time datetime="'.$data_hash['OLD_DATE_UTC'].'">'.$data_hash['OLD_DATE_LOC'].'</time></a></td>';
                } else {
                    echo '<td data-ref="'.$network.'-analyzed" class="results-analyzed-old">&nbsp;</time></a></td>';
                }
                echo "\n";
            }
        ?>

    </head>
    <body>
      <div id="wrapper">
        <header id="headerblock">
            <div id="headerimg" class="logo">
                <a href="/"><img src="/img/logo.png" alt="logo" /></a>
            </div>
            <div id="headertext">
                <h1><a href="/">PTNA - Public Transport Network Analysis</a></h1>
                <h2>Análisis estático para OpenStreetMap</h2>
            </div>
            <div id="headernav">
                <a href="/">Home</a> |
                <a href="/contact.html">Contact</a> |
                <a target="_blank" href="https://www.openstreetmap.de/impressum.html">Impressum</a> |
                <a target="_blank" href="https://www.fossgis.de/datenschutzerklaerung">Datenschutzerklärung</a> |
                <a href="/en/index.html" title="english"><img src="/img/GreatBritain16.png" alt="Union Jack" /></a>
                <a href="/de/index.html" title="deutsch"><img src="/img/Germany16.png" alt="deutsche Flagge" /></a>
                <!-- <a href="/fr/index.html" title="français"><img src="/img/France16.png" alt="Tricolore Française" /></a> -->
            </div>
        </header>

        <main id="main" class="results">

            <h2 id="EU"><img src="/img/Nicaragua32.png" alt="bandera Nicaragua" /> Resultados para Nicaragua</h2>
            <p>
                La primera columna contiene un enlace a los resultados del análisis.
            </p>
            <p>
                La columna "Cambios recientes" enlaza con la página HTML que muestra las diferencias con los últimos resultados del análisis.
                Estos son de color, puede usar los botones de navegación <img class="diff-navigate" src="/img/diff-navigate.png" alt="Navigation"> en la parte inferior derecha o los caracteres 'j' (hacia adelante) y 'k' (hacia atrás) para saltar de una diferencia a otra.
                Esta columna incluye la fecha del último análisis donde han surgido cambios relevantes.
                Las fechas más antiguas significan que no hubo cambios en los resultados.
                Sin embargo, los datos han sido analizados como se indica en la columna "Fecha de análisis".
            </p>

            <table id="networksEU">
                <thead>
                    <tr class="results-tableheaderrow">
                        <th class="results-name">Nombre</th>
                        <th class="results-region">Ciudad / Región</th>
                        <th class="results-network">Asociación de transporte</th>
                        <th class="results-datadate">Fecha de análisis</th>
                        <th class="results-analyzed">Cambios recientes</th>
                        <th class="results-discussion">Discusiones</th>
                        <th class="results-route">Líneas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="results-tablerow">
                        <td data-ref="NI-MN-IRTRAMMA-name" class="results-name"><a href="/results/NI/MN/NI-MN-IRTRAMMA-Analysis.html" title="to results">NI-MN-IRTRAMMA</a></td>
                        <td data-ref="NI-MN-IRTRAMMA-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22~%22^(Q3274|Q2720849)$%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B">Managua + Ciudad Sandino</a> / Managua</td>
                        <td data-ref="NI-MN-IRTRAMMA-network" class="results-network">Instituto Regulador del Transporte del Municipio de Managua</td>
                        <?php CreateEntry("NI-MN-IRTRAMMA"); ?>
                        <td data-ref="NI-MN-IRTRAMMA-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/ES_talk:Nicaragua/Transporte_p%C3%BAblico/Managua/Análisis" title="in OSM-Wiki">Discusiones</a></td>
                        <td data-ref="NI-MN-IRTRAMMA-route" class="results-route"><a href="https://wiki.openstreetmap.org/wiki/ES:Nicaragua/Transporte_p%C3%BAblico/Managua/Análisis/IRTRAMMA_Rutas" title="in OSM-Wiki">IRTRAMMA Rutas</a></td>
                    </tr>
                </tbody>
            </table>

        </main> <!-- main -->

        <hr />

        <footer id="footer">
            <p>
                Todos los datos geográficos <a href="https://www.openstreetmap.org/copyright">© colaboradores de OpenStreetMap</a>.
            </p>
            <p>
                Este programa es software libre: puede redistribuirlo y / o modificarlo bajo los términos de la <a href="https://www.gnu.org/licenses/gpl.html">LICENCIA PÚBLICA GENERAL GNU, Versión 3, 29 de junio de 2007</a> según lo publicado por la Free Software Foundation, ya sea la versión 3 de la Licencia o (a su elección) cualquier versión posterior.
                Obtenga el código fuente a través de <a href="https://github.com/osm-ToniE">GitHub</a>.
            </p>
            <p>
                Esta página ha sido traducida al español con la ayuda de Google translate.
                Los comentarios para mejorar la traducción son bienvenidos.
            </p>
        </footer>

      </div> <!-- wrapper -->
    </body>
</html>

