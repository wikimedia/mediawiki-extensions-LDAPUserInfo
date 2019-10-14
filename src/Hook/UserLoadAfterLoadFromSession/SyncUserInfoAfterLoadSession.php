<?php

namespace MediaWiki\Extension\LDAPUserInfo\Hook\UserLoadAfterLoadFromSession;

use MediaWiki\Extension\LDAPProvider\Hook\UserLoadAfterLoadFromSession;
use MediaWiki\Extension\LDAPUserInfo\UserInfoSyncProcess;
use MediaWiki\Extension\LDAPUserInfo\Config;
use User;

class SyncUserInfoAfterLoadSession extends UserLoadAfterLoadFromSession {

	protected $sessionDataKey = 'ldap-user-sync-last';

	/**
	 * @return bool
	 * @throws \ConfigException
	 */
	protected function doSync() {
		$this->user->loadFromDatabase();

		$process = new UserInfoSyncProcess(
			$this->user,
			$this->domainConfig,
			$this->ldapClient,
			$this->config->get( 'LDAPUserInfoModifierRegistry' )
		);

		$process->run();

		return true;
	}

	/**
	 *
	 * @return string
	 */
	protected function getDomainConfigSection() {
		return Config::DOMAINCONFIG_SECTION;
	}

}
