<?php

  namespace Drupal\custom_pages\Controller;
  
  use Drupal\Core\Controller\ControllerBase;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\HttpFoundation\JsonResponse;
  use Drupal\image\Entity\ImageStyle;
  use Drupal\node\Entity\Node;
  use Drupal\user\Entity\User;
  use Drupal\Core\Url;
  use Drupal\Core\Link;
  use Drupal\Component\Serialization\Json;
  
  class CustomPagesController extends ControllerBase {

    public function get_recipes() {
		$output  = '';
		$last_id = $_POST['id'];
		$range = 3;
		$query = \Drupal::entityQuery('node')
				->condition('status', 1)
				->condition('type', 'recipes')
				->condition('nid', $last_id, '<');
		$count 	= $query->count()->execute();
		
		$query = \Drupal::entityQuery('node')
				->condition('status', 1)
				->condition('type', 'recipes')
				->condition('nid', $last_id, '<')
				->sort('created', 'DESC')
				->range(0,$range);
		$nids 	= $query->execute();
		$nodes 	= entity_load_multiple('node', $nids);

		
		foreach($nodes as $node) {
			$style = \Drupal::entityTypeManager()->getStorage('image_style')->load('recipes_thumb');
			$image 	= $style->buildUrl($node->field_recipe_image->entity->getFileUri());
			$path = \Drupal::service('path.alias_manager')->getAliasByPath('/node/'.$node->nid->value);
			$data[] = array(
				'nid'    	=> $node->nid->value,
				'title' 	=> $node->title->value,
				'image' 	=> $image,
				'servings' 	=> $node->field_servings->value,
				'time' 		=> $node->field_time_in_minutes->value,
				'level' 	=> $node->field_tags->entity->name->value,
				'path' 		=> \Drupal::service('path.alias_manager')->getAliasByPath('/node/'.$node->nid->value)
			);
			
			$output .= '<div class="recipe-wrp" id="'.$node->nid->value.'">
                        <a href="'.$path.'" class="recipe-link">
                            <div class="recipe-img">
                                <img src="'.$image.'" alt="recipe-product">
                                <p>'.$node->title->value.'</p>
                            </div>
                        </a>
                        <div class="level-wrp">
                            <div class="serve-wrp flex-wrp">
                                <p>Serves : <span>'.$node->field_servings->value.'</span></p>
                                <p>Time : <span>'.$node->field_time_in_minutes->value.'</span></p>
                            </div>
                            <p>Difficulty Level : <span>'.$node->field_tags->entity->name->value.'</span></p>
                        </div>
                    </div>';
			
			
		}
		
		if($count > $range) {
			$load_more = '1';
		}	else {
			$load_more = '0';
		}
		
		return new JsonResponse(['lm' => $load_more, 'res' => $output]);

    }

  }