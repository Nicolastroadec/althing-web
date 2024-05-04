<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mobin-solution
 */

?>

<?php $logo_du_site = get_field('logo_du_site', 'option');
$reseaux_sociaux = get_field('reseaux_sociaux', 'option'); ?>

<footer class="site-footer-wrapper">
	<div class="site-footer internal-section-width">
		<?php if (isset($logo_du_site)) : ?>
			<a class="logo-footer" href="<?= esc_url(home_url('/')); ?>" rel="home">
				<img src="<?= esc_url($logo_du_site['url']) ?? '' ?>" alt="<?= esc_attr($logo_du_site['alt']) ?? '' ?>">
			</a>
		<?php endif; ?>
		<div class="site-footer-menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer_menu',
					'menu_id'        => 'footer-menu',
				)
			);
			?>
		</div>
		<div class="reseaux-sociaux">
			<?php foreach ($reseaux_sociaux ?? [] as $reseau) : ?>
				<div class="reseau-social">
					<?php if (isset($reseau['image']['url'])) : ?>
						<img src="<?= $reseau['image']['url'] ?? '' ?>" alt="<?= $reseau['image']['alt'] ?? '' ?>" />
					<?php endif; ?>
					<a href="<?= $reseau['lien_du_reseau_social']['url'] ?? '' ?>"></a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>

</body>

</html>