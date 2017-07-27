<?php

/*
Template Name: Content
*/

get_header();

while ( have_posts() ) { the_post();
?>

<?php include 'includes/title-wrap.php'; ?>

<section class="container_wrap">

	<article>

		<div class="content_wrap">

			<div class="page_content">
				<?= the_content() ?>
			</div>

		</div>

	</article>

</section>

<?php
}

get_footer();
