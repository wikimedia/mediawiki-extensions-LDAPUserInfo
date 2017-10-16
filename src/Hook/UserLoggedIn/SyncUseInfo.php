<?php

namespace MediaWiki\Extension\LDAPUserInfo\Hook\UserLoggedIn;

use MediaWiki\Extension\LDAPUserInfo\Config;
use MediaWiki\Extension\LDAPUserInfo\UserInfoQuery;

class SyncUseInfo extends \MediaWiki\Extension\LDAPProvider\Hook\UserLoggedIn {

	protected $result = [];

	protected function doProcess() {
		$userInfoQuery = new UserInfoQuery(
			$this->ldapClient,
			$this->user->getName(),
			$this->config
		);

		$this->result = $userInfoQuery->run();
		//TODO: Run callbacks that persist data in appropriate db tables
	}

	protected static function makeConfig() {
		return new Config();
	}
}