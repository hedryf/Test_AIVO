Herramientas utilizadas:

*Servidor Apache instalado mediante XAMPP.
*Manejador de paquetes Php COMPOSER.
*Software de Control de versiones Git
*Framework de desarrollo Slim
*SDK de Facebook para PHP
*GitHub como repositorio de proyecto


Modo de prueba del Test desarrollado:

*Instale el servidor Apache mediante XAMPP y proceda a la creación del directorio donde se almacenará el proyecto (en este caso /htdocs/{NombreDelDirectorioCreado})

*Instale el Manejadorr de paquetes PHP (Composer).

*Instale las herramientas Slim y Facebook graph-sdk a través de la consola GitBash (posicionada en el directorio creado), utilizando las siguientes líneas de comando:

	Ejecutar para Slim:  
				php composer.phar require slim/slim
	
	Ejecutar para Facebook graph-sdk :

				composer require facebook/graph-sdk

*Descargue el directorio (Api_Fbk) contenido en el repositorio y copielo en el directorio creado por ud (/htdocs/{NombreDelDirectorioCreado}/Api_Fbk).

*Chequee el funcionamiento del Test colocando en el URL de su navegador:

	{servidor}/{NombreDelDirectorioCreado}/Api_Fbk/profile/facebook/{Id de Facebook del usuario a consultar} 