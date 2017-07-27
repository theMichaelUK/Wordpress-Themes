<?php
get_header();

while ( have_posts() ) { the_post();
?>

<?php include 'includes/title-wrap.php'; ?>

<section class="container_wrap">

	<div class="wrapper">

		<div class="content_wrap">

			<div class="page_content">
				<?= the_content() ?>
			</div>

		</div>

	</div>

</section>

<?php
}
?>
<?php get_footer();
