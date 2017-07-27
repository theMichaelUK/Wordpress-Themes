<section class="background_dark">
	<article>
		<header>
			<h1>
				<?php
					if (isset( $page['title'] )) {
						echo $page['title'];
					} else {
						echo the_title();
					}
				?>
			</h1>
			<?php
			if (isset( $page['subtitle'] )) {
				echo '<p>' . $page['subtitle'] . '</p>';
			}
		?>
		</header>
	</article>
</section>