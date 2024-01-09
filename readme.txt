=== 00 Enclosed Content Restrictor ===
Contributors: [tu_nombre_de_usuario]
Tags: content restriction, membership, roles, capabilities, shortcode
Requires at least: WP 4.7
Tested up to: WP 5.7
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Restringe el contenido encerrado en un shortcode basado en roles, capacidades y niveles de membresía específicos.

== Description ==

El plugin 00 Enclosed Content Restrictor permite restringir contenido encerrado dentro de un shortcode en tus páginas y publicaciones de WordPress. Basado en roles de usuario, capacidades específicas y niveles de membresía, este plugin ofrece una forma flexible y potente de controlar el acceso al contenido.

== Features ==

- Restricción de contenido utilizando shortcodes.
- Comprobación de roles, capacidades y niveles de membresía para el acceso al contenido.
- Fácil integración y uso en cualquier página o entrada.
- Nota: Si desactivas el plugin, se mostrará el contenido encerrado entre el shortcode.

== Installation ==

1. Sube los archivos del plugin al directorio `/wp-content/plugins/`, o instala el plugin directamente a través de la pantalla de plugins de WordPress.
2. Activa el plugin a través de la pantalla 'Plugins' en WordPress.
3. Utiliza el shortcode `[enclosed_content_restrictor]` en tus páginas o entradas para restringir contenido.

== Usage ==

Para usar el plugin, añade el shortcode `[enclosed_content_restrictor role="rol_deseado" capability="capacidad_deseada" membership_levels="1,2"]` en tu contenido, seguido del contenido a restringir y cierra el shortcode.

Ejemplo de uso:
[enclosed_content_restrictor role="subscriber" capability="read" membership_levels="1"]
Aquí tu contenido restringido.
[/enclosed_content_restrictor]

== Frequently Asked Questions ==

= ¿Este plugin funciona con cualquier tipo de contenido? =

Sí, puedes encerrar cualquier tipo de contenido dentro del shortcode, incluyendo texto, imágenes y videos.

= ¿Qué sucede si desactivo el plugin? =

Si desactivas el plugin, el contenido encerrado entre los tags del shortcode será visible para todos los usuarios.

== Changelog ==

= 1.0 =
* Lanzamiento inicial.

== Upgrade Notice ==

= 1.0 =
Versión inicial. Asegúrate de configurar correctamente los roles, capacidades y niveles de membresía.
