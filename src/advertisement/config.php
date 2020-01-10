<?php

return [
    'id' => 'advertisement',
    'class' => \ant\advertisement\Module::className(),
    'isCoreModule' => false,
	'modules' => [
		//'v1' => \ant\cms\api\v1\Module::class,
		'backend' => \ant\advertisement\backend\Module::class,
	],
	'depends' => [],
];