# Guía de Despliegue - Escuela Almatriz

Este documento describe los pasos para desplegar el sitio web de Escuela Almatriz en cPanel.

## 📋 Requisitos Previos

- Acceso a cPanel con credenciales válidas
- Dominio `almatriz.com` configurado en cPanel
- Certificado SSL instalado (Let's Encrypt o comercial)
- Espacio disponible: ~20 MB

## 🚀 Método 1: Despliegue Manual (Recomendado para primera vez)

### Paso 1: Preparar el paquete

Ejecuta el script de despliegue:

```bash
chmod +x deploy.sh
./deploy.sh
```

Esto creará un archivo ZIP con timestamp, por ejemplo: `almatriz_deploy_20260701_164500.zip`

### Paso 2: Subir a cPanel

1. Inicia sesión en cPanel
2. Ve a **Administrador de archivos** (File Manager)
3. Navega a `public_html` (o el directorio de tu dominio)
4. **Importante:** Si ya existe contenido, haz un backup primero
5. Sube el archivo ZIP usando el botón **Cargar** (Upload)
6. Una vez subido, haz clic derecho sobre el ZIP y selecciona **Extraer** (Extract)
7. Asegúrate de que los archivos queden en la raíz de `public_html`, no en una subcarpeta

### Paso 3: Verificar permisos

Los permisos deben ser:
- Archivos HTML: `644`
- Directorios: `755`
- `.htaccess`: `644`
- Imágenes y assets: `644`

cPanel generalmente configura estos permisos automáticamente al extraer.

### Paso 4: Probar el sitio

1. Visita `https://almatriz.com`
2. Verifica que todas las páginas carguen correctamente
3. Prueba los formularios de contacto
4. Verifica que las imágenes se muestren
5. Prueba la descarga de PDFs

## 🔄 Método 2: Despliegue con Git (Para actualizaciones)

Si tu cPanel soporta Git deployment:

### Paso 1: Configurar Git en cPanel

1. En cPanel, ve a **Git Version Control**
2. Haz clic en **CREATE**
3. Configura:
   - **Clone a Repository**: No
   - **Repository Root**: `/home/USERNAME/almatriz`
   - **Repository Name**: `almatriz`
   - **Create**: Yes

### Paso 2: Subir el código

Desde tu máquina local:

```bash
# Agregar el repositorio remoto de cPanel
git remote add cpanel USERNAME@TU-DOMINIO:/home/USERNAME/almatriz

# Hacer push
git push cpanel master
```

### Paso 3: Configurar el despliegue

1. En cPanel, ve a **Git Version Control**
2. Haz clic en el repositorio `almatriz`
3. Ve a la pestaña **Manage**
4. Configura:
   - **Deploy HEAD Commit**: Yes
   - **Git Repository Path**: `/home/USERNAME/almatriz`
   - **Deploy Script**: `.cpanel.yml`

### Paso 4: Desplegar

Haz clic en **Deploy HEAD Commit** o configura un webhook para despliegue automático.

## ⚙️ Configuración Post-Despliegue

### Verificar SSL

Si el SSL no está instalado, el sitio no cargará por HTTPS. Para verificar:

```bash
curl -I https://almatriz.com
```

Si retorna `HTTP/2 200` o `HTTP/1.1 200`, el SSL está funcionando.

### Configurar redirecciones

El archivo `.htaccess` ya incluye:
- Redirección HTTP → HTTPS
- Compresión GZIP
- Cache de assets
- Headers de seguridad

### Verificar SEO

1. Envía el sitemap a Google Search Console: `https://almatriz.com/sitemap.xml`
2. Verifica que `robots.txt` sea accesible: `https://almatriz.com/robots.txt`
3. Prueba las URLs en [Google Rich Results Test](https://search.google.com/test/rich-results)

## 🔧 Solución de Problemas

### El sitio no carga por HTTPS

**Problema:** Error de certificado SSL

**Solución:**
1. Verifica que el SSL esté instalado en cPanel
2. Si no tienes SSL, comenta temporalmente las líneas 13-14 en `.htaccess`:
   ```apache
   # RewriteCond %{HTTPS} off
   # RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
   ```
3. Instala Let's Encrypt desde cPanel → **SSL/TLS Status**

### Error 500 Internal Server Error

**Problema:** Error de sintaxis en `.htaccess`

**Solución:**
1. Revisa los logs de error en cPanel → **Errors**
2. Verifica que `mod_rewrite` esté habilitado
3. Comenta secciones del `.htaccess` una por una para identificar el problema

### Las imágenes no se muestran

**Problema:** Permisos incorrectos o rutas mal configuradas

**Solución:**
1. Verifica que el directorio `images/` tenga permisos `755`
2. Verifica que las imágenes tengan permisos `644`
3. Revisa las rutas en el HTML (deben ser relativas: `images/archivo.jpg`)

### El formulario de contacto no funciona

**Problema:** El formulario usa `mailto:` que depende del cliente de correo del usuario

**Solución:**
- Esto es el comportamiento esperado
- Si necesitas un backend real, considera usar Formspree o un servicio similar
- Actualiza el `action` del formulario en `contacto.html`

## 📊 Verificación Post-Despliegue

Usa esta checklist para verificar que todo esté funcionando:

- [ ] El sitio carga por HTTPS
- [ ] Todas las páginas HTML son accesibles
- [ ] Las imágenes se muestran correctamente
- [ ] Los PDFs se pueden descargar
- [ ] Los enlaces de WhatsApp funcionan
- [ ] El menú móvil funciona
- [ ] El formulario de contacto abre el cliente de correo
- [ ] El sitemap.xml es accesible
- [ ] El robots.txt es accesible
- [ ] No hay errores en la consola del navegador

## 🔄 Actualizaciones Futuras

Para actualizar el sitio:

1. Haz los cambios en el directorio `site/`
2. Haz commit en Git:
   ```bash
   git add .
   git commit -m "Descripción de los cambios"
   ```
3. Si usas Git deployment:
   ```bash
   git push cpanel master
   ```
4. Si usas despliegue manual:
   ```bash
   ./deploy.sh
   ```
   Y sube el nuevo ZIP a cPanel.

## 📞 Soporte

Si encuentras problemas que no puedes resolver:

1. Revisa los logs de error en cPanel
2. Verifica los permisos de archivos
3. Consulta la documentación de cPanel
4. Revisa el archivo `.htaccess` línea por línea

## 🔒 Seguridad

El sitio incluye las siguientes medidas de seguridad:

- **HTTPS forzado** con redirección automática
- **HSTS** (HTTP Strict Transport Security)
- **X-XSS-Protection** habilitado
- **Content-Security-Policy** configurado
- **X-Frame-Options** para prevenir clickjacking
- **X-Content-Type-Options** para prevenir MIME sniffing

## 📈 Optimización

El sitio está optimizado con:

- Compresión GZIP para HTML, CSS y JavaScript
- Cache de imágenes por 1 mes
- Cache de CSS/JS por 1 semana
- Imágenes optimizadas y comprimidas
- PDFs comprimidos (reducción de ~75% en tamaño)

---

**Última actualización:** 2026-07-01
**Versión:** 1.0
