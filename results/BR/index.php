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
                <h2>Análise estática para OpenStreetMap</h2>
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

            <h2 id="BR"><img src="/img/Brasil32.png" alt="bandeira do brasil" /> Resultados para o Brasil</h2>
            <p>
                A primeira coluna inclui um link para os resultados da análise.
            </p>
            <p>
                A coluna "Últimas alterações" está vinculada a uma página HTML que mostra as diferenças para os últimos resultados da análise.
                São coloridas, você pode usar os botões de navegação <img class="diff-navigate" src="/img/diff-navigate.png" alt="Navigation"> na parte inferior direita ou os caracteres 'j' (para frente) e 'k' (para trás) para pular de uma diferença para outra.
                Esta coluna inclui a data da última análise em que surgiram alterações relevantes.
                Datas anteriores significam que não houve alterações nos resultados.
                No entanto, os dados foram analisados conforme indicado na coluna "Data da análise".
            </p>

            <table id="networksEU">
                <thead>
                    <tr class="results-tableheaderrow">
                        <th class="results-name">Nome</th>
                        <th class="results-region">Cidade / Região</th>
                        <th class="results-network">Transporte Assiciacion</th>
                        <th class="results-datadate">Data da análise</th>
                        <th class="results-analyzed">Últimas alterações</th>
                        <th class="results-discussion">Discussão</th>
                        <th class="results-route">Linhas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="results-tablerow">
                        <td data-ref="BR-MG-BHTrans-name" class="results-name"><a href="/results/BR/MG/BR-MG-BHTrans-Analysis.html" title="to results">BR-MG-BHTrans</a></td>
                        <td data-ref="BR-MG-BHTrans-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q42800%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B" title="show on OSM map">Belo Horizonte</a> / Minas Gerais</td>
                        <td data-ref="BR-MG-BHTrans-network" class="results-network">Empresa de Transporte e Trânsito de Belo Horizonte (BHTRANS)</td>
                        <?php CreateEntry("BR-MG-BHTrans"); ?>
                        <td data-ref="BR-MG-BHTrans-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:Belo_Horizonte/Public_Transport/Analysis" title="in OSM-Wiki">Discussão</a></td>
                        <td data-ref="BR-MG-BHTrans-route" class="results-route"><a href="https://wiki.openstreetmap.org/wiki/Belo_Horizonte/Public_Transport/Analysis/BHTrans_Lines" title="in OSM-Wiki">BHTrans Linhas</a></td>
                    </tr>
                </tbody>
            </table>

        </main> <!-- main -->

        <hr />

        <footer id="footer">
            <p>
                Todos os dados geográficos <a href="https://www.openstreetmap.org/copyright"> © colaboradores do OpenStreetMap </a>
            </p>
            <p>
                Este programa é um software gratuito: você pode redistribuí-lo e / ou modificá-lo sob os termos da <a href="https://www.gnu.org/licenses/gpl.html"> LICENÇA PÚBLICA GERAL GNU, Versão 3, 29 de junho de 2007 </a> conforme publicado pela Free Software Foundation, versão 3 da licença ou (a seu critério) qualquer versão posterior. Obtenha o código fonte no <a href="https://github.com/osm-ToniE"> GitHub </a>.
            </p>
            <p>
                Esta página foi traduzida para o português com a ajuda do Google translate. Comentários para melhorar a tradução são bem-vindos, especialmente para tradução correta para o português brasileiro.
            </p>
        </footer>

      </div> <!-- wrapper -->
    </body>
</html>

