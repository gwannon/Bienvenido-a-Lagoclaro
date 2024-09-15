<?php

require __DIR__ . '/../vendor/autoload.php';

$tags = [
  'HTML' => '',
  'HASH' => date("YmdHis"),
  'TITLE' => "Bienvenido a Lagoclaro, disfrute de su retiro de pesca",
  'DESCRIPTION' => 'En este folleto, patrocinado por la mancomunidad de Lagoclaro en conjunción con el gremio de cerveceros, podrá encontrar interesantes reglas de pesca para Dungeons&Dragons 5e.',
  'VERSION' => "1.0",
  'AUTHOR' => "@Gwannon",
  'AUTHORURL' => "https://gwannon.itch.io/",
  'BGCOLOR1' => "#2f7d20",
  'BGCOLOR2' => "#30ab19",
  'BGCOLOR3' => "#183b11",
  'BORDERCOLOR' => "#00afff",
  'BG' => "#a5efff",
  'BGINSIDE' => "#3597f0",
];

//Generamos el HTML
use FastVolt\Helper\Markdown;

$mkd = Markdown::new();
$mkd->setContent(file_get_contents(__DIR__ . "/../Reglas-de-pesca.md"));
$tags['HTML'] = $mkd->toHtml();
$html = file_get_contents(__DIR__ . "/template.html");
foreach ($tags as $tag => $value) {
  $html = str_replace("|".$tag."|", $value, $html); 
}

$html = str_replace("<hr />", "</div><div>", $html);


file_put_contents(__DIR__ . "/../Reglas-de-pesca.html", $html);

echo "InfoKey: Subject\n";
echo "InfoValue: ".$tags['DESCRIPTION']." Versión ".$tags['VERSION']."\n\n";
echo "InfoKey: Author\n";
echo "InfoValue: ".$tags['AUTHOR']."\n\n";
