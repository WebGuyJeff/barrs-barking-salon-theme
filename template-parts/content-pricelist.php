<?php
/**
 * Barking Salon theme - Template part for displaying archive-service.php content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Barrs_Barking_Salon
 */

?>

            <!-- Build the service price table -->
            <table class="pricelist_table">
                <thead>
                    <tr>
                      <th>Service</th>
                      <th>Price<br><span class="tableHeader_pricesFrom">(Prices Starting From)</span></th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Build args array for loop to filter and sort -->
                    <?php $args = array(
                        'post_type'        => 'service',
                        'post_status'      => 'publish',
                        'posts_per_page'   => '-1',
                        'meta_key'         => 'bbs_position',
                        'orderby'          => 'meta_value',
                        'order'            => 'ASC',
                        'tax_query' => array(  /* Exclude hidden category */
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'id',
                                'terms'    => '9',
                                'operator' => 'NOT IN'
                            )
                        )
                    );

                    /* Loop titles and prices into table */
                    $loop = new WP_Query( $args );

                    while ( $loop->have_posts() ) : $loop->the_post();

                        echo '<tr>';

                            $title = the_title( '', '', false );
                            $url =  sanitize_title( $title );
                            echo '<td>' . '<a href="#' . $url . '">' . $title . ' - <span class="readMore"><i>Learn more </i><i class="fas fa-angle-double-right"></i></span></a></td>';

                            // ACF Number
                            $price = get_field( 'bbs_price' );

                            // ACF True/False
                            if ( get_field('show_pricelist_price') && !empty( $price ) ) {
                                echo '<td>' . '£' . get_field( 'bbs_price' ) . '</td>';
                            } else {
                                echo '<td><a class="readMore" href="/services/#breed-pricelist">See Breed Pricelist</a></td>';
                            }

                        echo '</tr>';

                    endwhile;
                    wp_reset_postdata(); ?>

                </tbody>
            </table>
