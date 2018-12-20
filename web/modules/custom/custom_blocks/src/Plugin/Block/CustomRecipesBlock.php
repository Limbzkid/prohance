<?php
	/**
	 * @file
	 * Contains \Drupal\custom_blocks\Plugin\Block\CustomRecipesBlock.
	 */
	
	namespace Drupal\custom_blocks\Plugin\Block;
	
	use Drupal\Core\Block\BlockBase;
	use Drupal\Core\Form\FormInterface;
	
	/**
	 * Provides a 'Custom' block.
	 *
	 * @Block(
	 *   id = "recipes_listing",
	 *   admin_label = @Translation("Recipes Listing"),
	 * )
	 */
	class CustomRecipesBlock extends BlockBase {
	
		/**
		 * {@inheritdoc}
		 */
		public function build() {
			$range = 6;
			$query = \Drupal::entityQuery('node')
					->condition('status', 1)
					->condition('type', 'recipes');
			$count 	= $query->count()->execute();
			
			$query = \Drupal::entityQuery('node')
					->condition('status', 1)
					->condition('type', 'recipes')
					->sort('created', 'DESC')
					->range(0,$range);
			$nids 	= $query->execute();
			$nodes 	= entity_load_multiple('node', $nids);

			
			foreach($nodes as $node) {
				$style = \Drupal::entityTypeManager()->getStorage('image_style')->load('recipes_thumb');
				$image 	= $style->buildUrl($node->field_recipe_image->entity->getFileUri());
				$data[] = array(
					'nid'    	=> $node->nid->value,
					'title' 	=> $node->title->value,
					'image' 	=> $image,
					'servings' 	=> $node->field_servings->value,
					'time' 		=> $node->field_time_in_minutes->value,
					'level' 	=> $node->field_tags->entity->name->value,
					'path' 		=> \Drupal::service('path.alias_manager')->getAliasByPath('/node/'.$node->nid->value)
				);
			}
			
			if($count > $range) {
				$load_more = 1;
			}	else {
				$load_more = 0;
			}
			
			
			return [
				'#theme' 	=> 'block__recipes_listing',
				'#title' 	=> $this->t('Recipes'),
				'#loadmore' => $load_more,
				'#data_obj' => $data,
			];
			
		}
	}