<?php

namespace ant\advertisement\migrations\rbac;

use yii\db\Schema;
use ant\rbac\Migration;
use ant\rbac\Role;

class M200110082716Permission extends Migration
{
	protected $permissions;
	
	public function init() {
		$this->permissions = [
			\ant\advertisement\backend\controllers\AdvertisementController::className() => [
				'index' => ['Manage advertisement', [Role::ROLE_ADMIN]],
				'create' => ['Create advertisement', [Role::ROLE_ADMIN]],
				'update' => ['Update advertisement', [Role::ROLE_ADMIN]],
				'delete' => ['Delete advertisement', [Role::ROLE_ADMIN]],
			],
			\ant\advertisement\backend\controllers\AdvertisementPlaceholderController::className() => [
				'index' => ['Manage advertisement placeholder', [Role::ROLE_ADMIN]],
				'create' => ['Create advertisement placeholder', [Role::ROLE_ADMIN]],
				'update' => ['Update advertisement placeholder', [Role::ROLE_ADMIN]],
				'delete' => ['Delete advertisement placeholder', [Role::ROLE_ADMIN]],
			],
		];
		
		parent::init();
	}
	
	public function up()
    {
		$this->addAllPermissions($this->permissions);
    }

    public function down()
    {
		$this->removeAllPermissions($this->permissions);
    }
}
