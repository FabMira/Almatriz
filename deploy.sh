#!/bin/bash

# Script de despliegue para Escuela Almatriz - cPanel
# Uso: ./deploy.sh

set -e

echo "🚀 Preparando despliegue de Escuela Almatriz para cPanel..."

# Variables
SITE_DIR="site"
DEPLOY_DIR="deploy"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)
ARCHIVE="almatriz_deploy_${TIMESTAMP}.zip"

# Verificar que existe el directorio site
if [ ! -d "$SITE_DIR" ]; then
    echo "❌ Error: No se encuentra el directorio 'site'"
    exit 1
fi

# Crear directorio temporal de despliegue
echo "📦 Creando paquete de despliegue..."
rm -rf "$DEPLOY_DIR"
mkdir -p "$DEPLOY_DIR"

# Copiar archivos del sitio
cp -r "$SITE_DIR"/* "$DEPLOY_DIR"/
cp "$SITE_DIR/.htaccess" "$DEPLOY_DIR"/

# Verificar archivos críticos
echo "✅ Verificando archivos críticos..."
CRITICAL_FILES=(
    ".htaccess"
    "index.html"
    "robots.txt"
    "sitemap.xml"
)

for file in "${CRITICAL_FILES[@]}"; do
    if [ ! -f "$DEPLOY_DIR/$file" ]; then
        echo "❌ Falta archivo crítico: $file"
        exit 1
    fi
done

# Contar archivos
HTML_COUNT=$(find "$DEPLOY_DIR" -name "*.html" | wc -l)
IMAGE_COUNT=$(find "$DEPLOY_DIR/images" -type f 2>/dev/null | wc -l)
ASSET_COUNT=$(find "$DEPLOY_DIR/assets" -type f 2>/dev/null | wc -l)

echo "📊 Resumen del paquete:"
echo "   - Páginas HTML: $HTML_COUNT"
echo "   - Imágenes: $IMAGE_COUNT"
echo "   - Assets (PDFs): $ASSET_COUNT"

# Crear archivo ZIP
echo "🗜️  Comprimiendo archivos..."
if command -v zip &> /dev/null; then
    zip -r "$ARCHIVE" "$DEPLOY_DIR"/* "$DEPLOY_DIR/.htaccess" -x "*.DS_Store"
    echo "✅ Paquete creado: $ARCHIVE"
    echo "📦 Tamaño: $(du -h "$ARCHIVE" | cut -f1)"
else
    echo "⚠️  'zip' no está instalado. Creando tar.gz..."
    ARCHIVE="almatriz_deploy_${TIMESTAMP}.tar.gz"
    tar -czf "$ARCHIVE" -C "$DEPLOY_DIR" .
    echo "✅ Paquete creado: $ARCHIVE"
    echo "📦 Tamaño: $(du -h "$ARCHIVE" | cut -f1)"
fi

# Limpiar directorio temporal
rm -rf "$DEPLOY_DIR"

echo ""
echo "✅ ¡Paquete de despliegue listo!"
echo ""
echo "📋 INSTRUCCIONES PARA cPanel:"
echo "================================"
echo ""
echo "1️⃣  Subir el archivo '$ARCHIVE' a cPanel"
echo ""
echo "2️⃣  En cPanel, ir a 'Administrador de archivos'"
echo ""
echo "3️⃣  Navegar a public_html (o el directorio de tu dominio)"
echo ""
echo "4️⃣  Subir el archivo ZIP y extraerlo"
echo ""
echo "5️⃣  Verificar que .htaccess esté presente"
echo ""
echo "6️⃣  Probar el sitio en: https://escuela-almatriz.com"
echo ""
echo "⚠️  IMPORTANTE:"
echo "   - Asegúrate de tener SSL instalado antes de probar HTTPS"
echo "   - Si no tienes SSL, comenta temporalmente las líneas 13-14 en .htaccess"
echo ""
echo "📖 Para más detalles, consulta el archivo DEPLOY.md"
echo ""
