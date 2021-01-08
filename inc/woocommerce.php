<?php

if( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    //Woocommerce support
    function rotersand_add_woocommerce_support () {
        add_theme_support ('woocommerce');
    }
    add_action ('after_setup_theme', 'rotersand_add_woocommerce_support');

    //Remove default styles Woocommerce
    //add_filter ('woocommerce_enqueue_styles', '__return_false');



    //SHOP

    //Remove sidebar
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

    //Remove breadcrumbs before main content
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

    //Remove result count after loop
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

    //Remove catalog ordering after loop
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

    //Edit icon Sale flash
    add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
    function add_percentage_to_sale_badge( $html, $post, $product ) {

        if( $product->is_type('variable')){
            $percentages = array();

            // Get all variation prices
            $prices = $product->get_variation_prices();

            // Loop through variation prices
            foreach( $prices['price'] as $key => $price ){
                // Only on sale variations
                if( $prices['regular_price'][$key] !== $price ){
                    // Calculate and set in the array the percentage for each variation on sale
                    $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
                }
            }
            // We keep the highest value
            $percentage = max($percentages) . '%';

        } elseif( $product->is_type('grouped') ){
            $percentages = array();

            // Get all variation prices
            $children_ids = $product->get_children();

            // Loop through variation prices
            foreach( $children_ids as $child_id ){
                $child_product = wc_get_product($child_id);

                $regular_price = (float) $child_product->get_regular_price();
                $sale_price    = (float) $child_product->get_sale_price();

                if ( $sale_price != 0 || ! empty($sale_price) ) {
                    // Calculate and set in the array the percentage for each child on sale
                    $percentages[] = round(100 - ($sale_price / $regular_price * 100));
                }
            }
            // We keep the highest value
            $percentage = max($percentages) . '%';

        } else {
            $regular_price = (float) $product->get_regular_price();
            $sale_price    = (float) $product->get_sale_price();

            if ( $sale_price != 0 || ! empty($sale_price) ) {
                $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
            } else {
                return $html;
            }
        }
        return '<span class="onsale"> ' . $percentage . '</span>';
    }


    //Single Product

    add_action( 'after_setup_theme', 'gallery_theme_setup' );
    function gallery_theme_setup() {
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

    //1

}