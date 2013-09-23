#! /bin/bash
#
# Wrapper que incluye los php scripts para exportar los datos de sugar 4.2 a 6.5 .
# Se utiliza un script Ex para el encoding (UTF-8).
# 
# Mon Sep 23 10:19:03 ART 2013
# LML .-

php migra_csv_accounts.php > accounts.csv;
ex accounts.csv < format.exrc;
php migra_csv_contacts.php > contacts.csv;
ex contacts.csv < format.exrc;

