<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://veiculos.fipe.org.br/api/veiculos/ConsultarMarcas");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS,
    "codigoTabelaReferencia=197&codigoTipoVeiculo=1");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Host" => "veiculos.fipe.org.br",
    "User-Agent" => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.100 Safari/537.36",
    "Accept" => "application/json, text/javascript, */*; q=0.01",
    "Accept-Language" => "pt-BR,pt;q=0.8,en-US;q=0.6,en;q=0.4",
    "Accept-Encoding" => "gzip, deflate",
//    "Accept-Charset" => "ISO-8859-1,utf-8;q=0.7,*;q=0.7",
//    "Keep-Alive" => "115",
    "Content-Type" => "application/x-www-form-urlencoded; charset=UTF-8",
    "Connection" => "keep-alive",
    "X-Requested-With" => "XMLHttpRequest",
    "Referer" => "http://veiculos.fipe.org.br/",
    "Origin" => "http://veiculos.fipe.org.br"
));
curl_setopt($ch, CURLOPT_TIMEOUT, 6000);
// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

print_r($server_output);

?>