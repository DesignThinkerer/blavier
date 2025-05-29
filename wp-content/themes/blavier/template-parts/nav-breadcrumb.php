<nav aria-label="Breadcrumb">
    <ol>
        <li>
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
        </li>
        <?php
        $breadcrumb_items = [];

        if (is_singular('inspiration')) {
            $breadcrumb_items[] = [
                'url' => get_post_type_archive_link('inspiration'),
                'label' => 'Inspiration',
                'current' => false
            ];
            $breadcrumb_items[] = [
                'url' => '',
                'label' => get_the_title(),
                'current' => true
            ];
        } elseif (is_post_type_archive('inspiration')) {
            $breadcrumb_items[] = [
                'url' => '',
                'label' => 'Inspiration',
                'current' => true
            ];
        } elseif (is_tax('type_maison')) {
            $term = get_queried_object();
            $breadcrumb_items[] = [
                'url' => get_post_type_archive_link('inspiration'),
                'label' => 'Inspiration',
                'current' => false
            ];
            $breadcrumb_items[] = [
                'url' => '',
                'label' => esc_html($term->name),
                'current' => true
            ];
        }

        foreach ($breadcrumb_items as $item) {
            if ($item['current']) {
                echo '<li><a href="" aria-current="page">' . $item['label'] . '</a></li>';
            } else {
                echo '<li><a href="' . esc_url($item['url']) . '">' . $item['label'] . '</a></li>';
            }
        }
        ?>
    </ol>
</nav>