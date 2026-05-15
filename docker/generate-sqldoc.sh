#!/bin/bash
# Script para generar la documentación de la base de datos (SQLDoc) con SchemaSpy

echo "Generando documentación de la base de datos..."

# Ejecutar el contenedor de SchemaSpy usando el profile 'tools'
docker-compose --profile tools up schemaspy

echo "¡Documentación generada exitosamente!"
echo "Puedes verla abriendo el archivo public/sqldoc/index.html en tu navegador."
