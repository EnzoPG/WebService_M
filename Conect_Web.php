<?php
function puxando_pag_json($url) {
    $max_execution_time = 3600;
    $curl_lind = curl_init();
    curl_setopt($curl_lind, CURLOPT_RETURNTRANSFER, True);
    curl_setopt($curl_lind, CURLOPT_URL, $url);
    curl_setopt($curl_lind,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
    $volta = curl_exec($curl_lind);
    curl_close($curl_lind);
    return $volta;
}
$url = "http://sjc.salvar.cemaden.gov.br/WebServiceSalvar-war/resources/layer/id/";
?>

<html>

    <head>
    <title>Get Web Service Content</title>
        
        <meta charset="utf-8" />
        <title>Table Style</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    </head>
    
    <body>
        
        <center>
        <table class="table-fill">
            <thead>
                 <tr>
                     <th class="text-left">Id</th>
                     <th class="text-left">Nome</th>
                     <th class="text-left">Data e Hora</th>
                </tr>
            </thead>
            <tbody class="table-hover">
                <?php
                for($i=2000;$i<2100;$i++){
                    $contents = json_decode(puxando_pag_json($url . $i++), true);
                    $id = $contents["id"];
                    $nome = $contents["name"];
                    $img = $contents["imageDateTime"];
                ?>
                <tr>
                    <td><?= $id; ?></td>
                    <td><?= $nome; ?></td>
                    <td><?= $img; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </center>
    </body>
    
</html>