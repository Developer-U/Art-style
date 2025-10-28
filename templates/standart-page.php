<?php
/*
Template Name: Стандартная страница
*/

get_header();

// Block Top
get_template_part('template-parts/top', 'pages');
?>

<section class="standert-page">
    <div class="container post">
        <?php echo get_the_content(); ?>
    </div>
</section>

<?php
get_template_part('template-parts/free', 'block');

get_footer(); ?>