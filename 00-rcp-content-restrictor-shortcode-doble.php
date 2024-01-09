<?php
/**
 * Plugin Name: 000 RCP Shortcode Content Restrictor
 * Description: Restringe el contenido encerrado en el shortcode basado en roles, capacidades y niveles de membresía específicos de RestricContentPro. Uso del shortcode: [enclosed_content_restrictor role="rol_deseado" capability="capacidad_deseada" membership_levels="1,2"]...[/enclosed_content_restrictor] nota: Si desactivas el plugin se vera el contenido encerrado entre el shortcode.
 * Version: 09-01-2024
 * Author: Juan Luis Martel
 * Author URI: https://www.webyblog.es
 */


// Prevenir acceso directo al archivo del plugin
if ( ! defined( 'ABSPATH' ) ) exit;


function jlmr_mensaje_ayuda_shortcode_content_restrictor( $links_array, $plugin_file_name, $plugin_data, $status ) {
    if ( strpos( $plugin_file_name, basename(__FILE__) ) ) {
        // Construye la URL del archivo de ayuda
        $ayuda_url = plugins_url( 'ayuda.html', __FILE__ );

        // Añade el enlace de 'Ayuda' al final de la lista de enlaces
        $links_array[] = '<a rel="noopener noreferrer nofollow"  href="' . esc_url( $ayuda_url ) . '" target="_blank">Ayuda</a>';
    }

    return $links_array;
}

add_filter( 'plugin_row_meta', 'jlmr_mensaje_ayuda_shortcode_content_restrictor', 10, 4 );



function jlmr_enclosed_content_restrictor_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'role' => '',
        'capability' => '',
        'membership_levels' => ''
    ), $atts, 'enclosed_content_restrictor');

    // Comprobar si Restrict Content Pro está activo.
    if ( ! function_exists( 'rcp_user_has_active_membership' ) || ! function_exists( 'rcp_is_pending_verification' ) ) {
        return '<div class="jlmr-ecr-message"><h3>ERROR: Sistema de Restricción apagado.</h3></div>';
    }

    // Verificar si el usuario está logueado.
    if ( ! is_user_logged_in() ) {
        return '<div class="jlmr-ecr-message"><h3>Parte del contenido que quieres ver está oculto solo a usuarios Premium, puedes <a href="/wp-login.php">Registrarte</a> o <a href="/wp-login.php">Acceder</a> con tu cuenta.</h3></div>';
    }

    $user = wp_get_current_user();

    // Verificar rol y capacidad.
    if ( ! in_array( $atts['role'], (array) $user->roles ) || ! current_user_can( $atts['capability'] ) ) {
        return '<div class="jlmr-ecr-message"><h3>No tienes permiso para ver este contenido.</h3></div>';
    }

    // Verificar si el usuario tiene una membresía activa.
    if ( ! rcp_user_has_active_membership() ) {
        return '<div class="jlmr-ecr-message"><h3>Tu cuenta no cumple con los requisitos necesarios para ver este contenido.</h3></div>';
    }

    // Verificar si el usuario está pendiente de verificación de correo electrónico.
    if ( rcp_is_pending_verification() ) {
        return '<div class="jlmr-ecr-message"><h3>Para acceder debes de verificar tu dirección de correo electrónico en el email que has recibido.</h3></div>';
    }

    // Verificar los niveles de membresía si están especificados.
    if ($atts['membership_levels']) {
        $membership_levels = explode(',', $atts['membership_levels']);
        $user_membership_levels = rcp_get_customer_membership_level_ids();

        if (!count(array_intersect($user_membership_levels, $membership_levels))) {
            return '<div class="jlmr-ecr-message"><h3>No tienes el nivel de membresía requerido para ver este contenido.</h3></div>';
        }
    }

    // Si todas las condiciones se cumplen, devolver el contenido encerrado.
    return do_shortcode($content);
}

add_shortcode('enclosed_content_restrictor', 'jlmr_enclosed_content_restrictor_shortcode');

