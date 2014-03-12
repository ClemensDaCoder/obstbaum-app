<?php
/**
 * @package obst
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php 
			//get values
			$id_value = get_post_meta(get_the_ID(), 'gartenid', true)-1;
			$coord_value = get_post_meta(get_the_ID(), 'koordinaten', true);
			$coord_value = substr($coord_value,1,strpos($coord_value,']')-1);
			$coords = explode(",", $coord_value);
			$lat_value = $coords[0];
			$long_value = $coords[1];

			//Anzeigebutton
			$type = get_post_meta(get_the_ID(), 'gartentyp', true);
			$array = ($type=='obstbaumgarten') ? polygonArray1 : polygonArray2;
			echo '<p><a class="abutton" href="'.esc_url( home_url( '/' ) ).'" onclick="map.setView(new L.LatLng('.$lat_value.','.$long_value.'), 17, false);map.on(\'zoomend\', function(e) {'.$array.'['.$id_value.'].openPopup()});">Zeige '.ucfirst($type).'</a></p><br />';

			//Koordinaten
			echo '<p>Koordinaten:';
			if($lat_value != '' && $long_value != '') echo ' N ' . round($lat_value,5) . ' E ' . round($long_value,5);

			//URL
			$url = 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			echo '</p><p><a href="'.$url.'">'.$url.'</a></p>';
			echo '<br />';
		?>

		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'obst' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

		<?php edit_post_link( __( 'Edit', 'obst' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
