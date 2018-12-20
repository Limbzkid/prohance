<?php
	/**
	 * @file
	 * Contains \Drupal\custom_blocks\Plugin\Block\CustomFAQsBlock.
	 */
	
	namespace Drupal\custom_blocks\Plugin\Block;
	
	use Drupal\Core\Block\BlockBase;
	use Drupal\Core\Form\FormInterface;
	
	/**
	 * Provides a 'Custom' block.
	 *
	 * @Block(
	 *   id = "faqs_block",
	 *   admin_label = @Translation("FAQs"),
	 * )
	 */
	class CustomFAQsBlock extends BlockBase {
	
		/**
		 * {@inheritdoc}
		 */
		public function build() {
			$page 	= \Drupal::request()->getRequestUri();
			$arg = explode('/', $page);
			$prod 	= ucwords(str_replace('-', ' ', $arg[2]));
			$query 	= \Drupal::entityQuery('node')
						->condition('status', 1)
						->condition('type', 'faqs')
						->condition('field_select_product.entity.title', $prod)
						->sort('created', 'DESC');
						
			$nids = $query->execute();
			$nodes = entity_load_multiple('node', $nids);
			
			
			foreach($nodes as $node) {
				$data[] = array(
					'question' => $node->title->value,
					'answer'	=> strip_tags($node->body->value),
				);
			}
			
			return [
				'#theme'    => 'block--faqs-block',
				'#data_obj' => $data,
			];
		}
	}