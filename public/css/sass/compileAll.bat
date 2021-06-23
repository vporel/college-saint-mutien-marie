@echo off

set /P file= Nom du fichier - sans extension - :
set css= %file%.css
set scss= %file%.scss
start sass %scss% %css% -w