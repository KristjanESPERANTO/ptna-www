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
        <?php include('../../script/entries.php'); ?>
    </head>
    <body>
      <div id="wrapper">
        <header id="headerblock">
            <div id="headerimg" class="logo">
                <a href="/"><img src="/img/logo.png" alt="logo" /></a>
            </div>
            <div id="headertext">
                <h1><a href="/">PTNA - Public Transport Network Analysis</a></h1>
                <h2>Static Analysis for OpenStreetMap</h2>
            </div>
            <div id="headernav">
                <a href="/">Home</a> |
                <a href="/contact.html">Contact</a> |
                <a target="_blank" href="https://www.openstreetmap.de/impressum.html">Impressum</a> |
                <a target="_blank" href="https://www.fossgis.de/datenschutzerklärung">Datenschutzerklärung</a> |
                <a href="/en/index.html" title="english"><img src="/img/GreatBritain16.png" alt="Union Jack" /></a>
                <a href="/de/index.html" title="deutsch"><img src="/img/Germany16.png" alt="deutsche Flagge" /></a>
                <!-- <a href="/fr/index.html" title="français"><img src="/img/France16.png" alt="Tricolore Française" /></a> -->
            </div>
        </header>

        <main id="main" class="results">

            <h2 id="EU"><img src="/img/Europe32.png" alt="Europaflagge" /> Results for Europe</h2>
            <p>
                The first column includes a link to the results of the analysis.
            </p>
            <p>
                The column "Latest Changes" links to an HTML page which shows the differences to the last analysis results.
                These are coloured, you can use navigation buttons <img class="diff-navigate" src="/img/diff-navigate.png" alt="Navigation"> at the bottom right or the characters 'j' (forward) and 'k' (backward) to jump from difference to difference.
                This column includes the date of the last analysis where relevant changes have emerged.
                Older dates mean that there were no changes in the results. Nevertheless, the data has been analyzed as denoted in the column "Date of Analysis".
            </p>

            <table id="networksEU">
                <thead>
                    <tr class="results-tableheaderrow">
                        <th class="results-name">Name</th>
                        <th class="results-region">City/Region</th>
                        <th class="results-network">Network</th>
                        <th class="results-datadate">Date of Analysis</th>
                        <th class="results-analyzed">Latest Changes</th>
                        <th class="results-discussion">Discussion</th>
                        <th class="results-route">Lines</th>
                    </tr>
                </thead>
                <tbody>

                    <?php CreateFullEntry( "EU-Flixbus" ); ?>

                </tbody>
            </table>

        </main> <!-- main -->

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

