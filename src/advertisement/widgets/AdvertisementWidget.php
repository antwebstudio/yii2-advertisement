<?php
namespace ant\advertisement\widgets;

use yii\helpers\Html;
use ant\file\models\FileAttachment;
use ant\advertisement\models\AdvertisementPlaceholder;

class AdvertisementWidget extends \yii\base\Widget {
	public $placeholder;
	public $height;
	public $width;
	public $options = [];
	
	public function run() {
		$placeholder = $this->getPlaceholder();
		
		if (isset($placeholder)) {
			return $this->renderAds($placeholder->randomAdvertisement);
		} else {
			return $this->renderEmpty();
		}
	}
	
	protected function getPlaceholder() {
		return AdvertisementPlaceholder::findOne(['handle' => $this->placeholder]);
	}
	
	protected function renderAds($ads) {
		$html = Html::beginTag('div', ['class' => 'ads']);
		
		if (isset($ads)) {
			if ($ads->type == 0) {
				$url = FileAttachment::getFirstUrl($ads->file);
				
				if ($url) {
					$width = strpos($this->width, 'px') === false ? $this->width.'px' : $this->width;
					$height = strpos($this->height, 'px') === false ? $this->height.'px' : $this->height;
					
					$style = 'object-fit:cover; ';
					if (isset($this->height)) $style .= 'height: '.$height.'; ';
					if (isset($this->width)) $style .= 'width: '.$width.'; ';
					
					$html .= Html::img($url, ['style' => $style]);
				}
			}
		} else {
			$html .= $this->renderEmpty();
		}
		$html .= Html::endTag('div');
		
		return $html;
	}
	
	protected function renderEmpty() {
		return Html::img('https://via.placeholder.com/'.$this->width.'x'.$this->height);
	}
}