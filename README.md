
# Universidad Siglo 21

# Repositorio del Trabajo Final de Graduación - Licenciatura en Informática


# Título
Sistema de generación y análisis de cuestionarios adaptables mediante inteligencia artificial

# Configuración
Requerimientos:
- Docker
- Docker Compose
- Make

Para ejecutar el sistema se debe proceder a:

1.  clonar el repositorio
2.  ejecutar el comando: make init
3.  ejecutar el comando: make up
4.  cargar los fixtures con: make fload
5.  navegar a la página: http://localhost:8000
6.  ingresar como: mariano/mariano
7.  navegar a: Cuestionarios -> Realizar cuestionario
8.  hacer click sobre el botón de inicio del cuestionario
9.  responder la pregunta que aparece y presionar Siguiente

Luego de cada pregunta, el Tutor de IA determina la probabilidad de que la persona que 
está ejecutando el cuestionario haya aprendido el tema en cuestión.
Si determina que esa probabilidad es mayor al 84% dirige al usuario al final del cuestionario.
Si no, se ejecutarán las preguntas hasta que no haya más disponible.
En el resultado final, el sistema muestra la última probabilidad obtenida por el Tutor.

# Autor

Mariano Boisselier - Legajo VINF07567
