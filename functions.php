<?php
    function add_query_vars_filter( $vars ){
        $vars[] = "color_scheme";
        return $vars;
    }
    add_filter( 'query_vars', 'add_query_vars_filter' );
?>