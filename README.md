# RCP Content Restrictor Shortcode Plugin

Este plugin de WordPress proporciona una funcionalidad para restringir el contenido basado en roles de usuario, capacidades y niveles de membresía.

## Funciones

El plugin define dos funciones principales:

1. `jlmr_mensaje_ayuda_shortcode_content_restrictor`: Esta función añade un enlace de 'Ayuda' en la lista de enlaces de meta del plugin. El enlace dirige a un archivo de ayuda HTML.

2. `jlmr_enclosed_content_restrictor_shortcode`: Esta función define un shortcode que permite restringir el contenido basado en roles de usuario, capacidades y niveles de membresía. Los atributos del shortcode son 'role', 'capability' y 'membership_levels'.

## Uso

Para usar el shortcode de restricción de contenido, simplemente añade el siguiente shortcode en tu contenido:

```php
[enclosed_content_restrictor role="your_role" capability="your_capability" membership_levels="your_membership_levels"]
Your restricted content here
[/enclosed_content_restrictor]