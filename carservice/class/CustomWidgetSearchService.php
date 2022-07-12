<?php


class CustomWidgetSearchService extends WP_Widget
{
    function __construct() {

        parent::__construct(
            'Taxonomy_Widget',
            'FranchiseSearch Widget',
            array( 'description' => 'Виджет поиска автосервисов', )
        );

    }

    function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        echo $args['before_title'] . "FranchiseSearch" . $args['after_title'];
        echo '<div class="block-sidebar-vidget">
                <div class="prload_franchize"></div>
                <div class="top-block-search-service">
                    <div class="top-block-search-service-form">
                        <form method="post" id="franchise_search_forma_id">
                            <input type="text" name="franchise_search" id="franchise_search_input_id" value="">
                        </form>
                    </div>
                    <div class="top-block-search-service-result"></div>
                </div>
                <div class="bottom-block-search_service_result"></div>
              </div>';
        echo $args['after_widget'];
    }


}
