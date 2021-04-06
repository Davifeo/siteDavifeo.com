				
				<?php 
				$footer_status = !empty( ckav_theme_option( 'post', 'footer-status' ) ) ? ckav_theme_option( 'post', 'footer-status' ) : "yes";
				if ( $footer_status === "yes" ) { ?>
				<footer class="site-footer">
					<p class="mr-0">&copy; <?php echo date("Y") . ' ' . esc_html( ckav_theme_option( 'customizer', 'copyright' )); ?></p>
				</footer>
				<?php } ?>
			</div>

		</div><!-- / MAIN-container -->
	</div><!-- / MAIN-WRAPPER -->
		
	<?php wp_footer();  ?>
</body>
</html>
