obstbaum-app: Parser
====================

Diese PHP-Script parst eine CSV Datei im folgenden Format: 

`Fläche;BaumNr;Gattung;Art;Sorte;NameDeutsch;Höhe;Schirmdurchmesser;Stammumfang;Typ;XPos;YPos;Kategorie;Reifvon;Reifbis`

Das Ergebnis wird als geojson Datei in folgendem Format gespeichert:

`var obstPoints = [
	[id, 'Name des Baumes', Längengrad, Breitengrad, 'Kategorie'],
]`

Die Koordinaten der Originaldaten sind im in Österreich gängigen Koordinatensystem GK M31 (EPSG 31255). Das Ausgangsformat sind Geographische Länge und Breite in Dezimalschreibweise. Zur Umrechnung wird die auf [proj4js](http://proj4js.org/) basierende PHP Bibliothek [proj4php](http://proj4php.sourceforge.net/) verwendet.

## Datenquelle

Datenquelle: [CC-BY-3.0](http://creativecommons.org/licenses/by/3.0/at/): Stadt Linz - [data.linz.gv.at](http://www.data.linz.gv.at/nutzungsbedingungen/)

## Lizenz

obstbaum-app Paket "parser" ist freie Software und steht (soweit in den enthaltenen Paketen nicht anders angegeben) unter der [GPL Lizenz](gpl-3.0.txt).
