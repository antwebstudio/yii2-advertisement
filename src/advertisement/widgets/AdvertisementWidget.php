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
	public $defaultUrl = 'javascript:;';
	
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
		
		if (false && isset($ads)) {
			if ($ads->type == 0) {
				$url = FileAttachment::getFirstUrl($ads->file);
				
				if ($url) {
					$width = strpos($this->width, 'px') === false ? $this->width.'px' : $this->width;
					$height = strpos($this->height, 'px') === false ? $this->height.'px' : $this->height;
					
					$style = 'object-fit:cover; ';
					if (isset($this->height)) $style .= 'max-height: '.$height.'; ';
					if (isset($this->width)) $style .= 'width: '.$width.'; ';
					
					$style .= 'max-width: 100%; ';
					
					if ($ads->target_url) {
						$html .= Html::a(Html::img($url, ['style' => $style]), $ads->target_url, ['target' => '_blank']);
					} else {
						$html .= Html::img($url, ['style' => $style]);
					}
				}
			}
		} else {
			$html .= $this->renderEmpty();
		}
		$html .= Html::endTag('div');
		
		return $html;
	}
	
	protected function renderEmpty() {
		return '<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-client="ca-pub-7254200052353371"
			 data-ad-slot="2937646921"
			 data-ad-format="auto"
			 data-full-width-responsive="true"></ins>
		<script>
			 (adsbygoogle = window.adsbygoogle || []).push({});
		</script>';
		
		return Html::a(Html::img('https://via.placeholder.com/'.$this->width.'x'.$this->height), $this->defaultUrl);
	}
}