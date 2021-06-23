@echo off


set /P compile_all= Tout compiler ? (0 = Oui, N = Non) 

IF %compile_all% == "n" or %compile_all% == "N" (

	set /P files= Noms des fichiers - sans extension - : 
	for %%f in (%files%) do start sass %%f.scss ../%%f.css -w

) ELSE ( for %%f in (*.scss) do start sass %%f ../%%~nf.css -w )
