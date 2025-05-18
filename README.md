📊 ContadorPalabras

Aplicación web en PHP para contar palabras y analizar textos. Elimina signos de puntuación, filtra stopwords y considera mayúsculas y minúsculas como iguales para ofrecer resultados precisos.

🚀 Funcionalidades

Elimina puntuación del texto.

Convierte todas las palabras a minúsculas.

Filtra stopwords (palabras comunes como "el", "la", "de").

Cuenta las apariciones de cada palabra.

Muestra la lista de palabras ordenadas por frecuencia (de mayor a menor).

🛠️ Tecnologías Utilizadas

Backend: PHP

Frontend: HTML + CSS (Bootstrap 5.3)

Control de versiones: Git + GitHub

📂 Estructura del Proyecto

📦 ContadorPalabras
├── funciones.php           # Funciones principales de análisis de texto
├── index.php               # Lógica del formulario de entrada de texto
├── stopwords.txt           # Lista de palabras vacías para filtrar
├── README.md               # Documentación del proyecto
└── index.php               # Página principal del formulario

🚀 Despliegue de la Aplicación

🔧 Requisitos Previos

Antes de desplegar la aplicación, asegúrate de tener:

PHP (versión 8.1 o superior) instalado en tu máquina.

Servidor web (recomendado: Apache o Nginx) o usar el servidor embebido de PHP.

Git para clonar el repositorio.

📝 Paso 1: Clonar el repositorio

Primero, clona el repositorio desde GitHub:

git clone https://github.com/RafaEducaand/ContadorPalabras.git
cd ContadorPalabras

📁 Paso 2: Configurar los archivos del proyecto

Asegúrate de que los siguientes archivos estén presentes en la raíz del proyecto:

index.php: Página principal del formulario.

funciones.php: Funciones para analizar el texto.

stopwords.txt: Lista de palabras vacías para filtrar.

🌐 Paso 3: Iniciar el servidor

Puedes usar el servidor embebido de PHP para probar localmente:

php -S localhost:8000

Luego, abre tu navegador en:

http://localhost:8000/

🖥️ Paso 4: Configurar el servidor en producción.

Si planeas usar un servidor como Apache para producción:

Mueve los archivos del proyecto a tu directorio de servidor (ej. /var/www/html/).

Ajusta los permisos del directorio si es necesario:

sudo chown -R www-data:www-data /var/www/html/ContadorPalabras
sudo chmod -R 755 /var/www/html/ContadorPalabras

✅ Paso 5: Pruebas finales

Prueba que la aplicación funcione correctamente ingresando un texto y verificando los resultados.