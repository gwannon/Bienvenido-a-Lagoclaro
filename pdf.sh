#!/bin/bash

php ./tools/generateFolleto.php > ./metas.txt
chromium --no-sandbox --headless --gpu --no-pdf-header-footer --print-to-pdf=./temp.pdf ./Reglas-de-pesca.html
pdftk 'temp.pdf' update_info_utf8 'metas.txt' output 'Reglas-de-pesca.pdf'
rm temp.pdf
rm metas.txt
rm Reglas-de-pesca.html