<?php

namespace MediaWiki\Extension\LDAPUserInfo\Hook\UserLoggedIn;

use MediaWiki\Extension\LDAPUserInfo\Config;
use MediaWiki\Extension\LDAPUserInfo\UserInfoQuery;

class SyncUserInfo extends \MediaWiki\Extension\LDAPProvider\Hook\UserLoggedIn {

	protected function doProcess() {
		$userInfo = $this->ldapClient->getUserInfo( $this->user->getName() );
		$attributesMap = $this->domainConfig->get( Config::ATTRIBUTES_MAP );
		//TODO: Process all mapped attributes. E.g.
			//'email' -> 'user.email'
			//'gender'-> 'user_properties.gender'
		return true;
	}

	protected function getDomainConfigSection() {
		return Config::DOMAINCONFIG_SECTION;
	}
}