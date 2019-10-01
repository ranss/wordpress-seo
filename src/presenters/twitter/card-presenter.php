<?php
/**
 * Presenter class for the OpenGraph title.
 *
 * @package Yoast\YoastSEO\Presenters\Twitter
 */

namespace Yoast\WP\Free\Presenters\Twitter;

use Yoast\WP\Free\Presentations\Indexable_Presentation;
use Yoast\WP\Free\Presenters\Abstract_Indexable_Presenter;

/**
 * Class Twitter_Card_Presenter
 */
class Card_Presenter extends Abstract_Indexable_Presenter {
	/**
	 * Presents the Twitter card meta tag.
	 *
	 * @param Indexable_Presentation $presentation The presentation of an indexable.
	 *
	 * @return string The Twitter card tag.
	 */
	public function present( Indexable_Presentation $presentation ) {
		$card_type = $this->filter( $presentation->twitter_card );
		if ( is_string( $card_type ) && $card_type !== '' ) {
			return sprintf( '<meta name="twitter:card" content="%s" />', $card_type );
		}

		return '';
	}

	/**
	 * Run the card type through the `wpseo_twitter_card_type` filter.
	 *
	 * @param string $card_type The card type to filter.
	 *
	 * @return string $card_type The filtered card type.
	 */
	private function filter( $card_type ) {
		/**
		 * Filter: 'wpseo_twitter_card_type' - Allow changing the Twitter card type.
		 *
		 * @api string $card_type The card type.
		 */
		return (string) trim( \apply_filters( 'wpseo_twitter_card_type', $card_type ) );
	}
}
