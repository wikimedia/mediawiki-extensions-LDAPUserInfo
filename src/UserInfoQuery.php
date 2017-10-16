<?php

namespace MediaWiki\Extension\LDAPUserInfo;

class UserInfoQuery {

	/**
	 *
	 * @var \MediaWiki\Extension\LDAPProvider\Client
	 */
	protected $ldapClient = null;

	/**
	 *
	 * @var string
	 */
	protected $username = '';

	/**
	 *
	 * @var \Config
	 */
	protected $config = null;

	protected $result = [];

	public function __construct( $ldapClient, $username, $config ) {
		$this->ldapClient = $ldapClient;
		$this->username = $username;
		$this->config = $config;
	}

	public function run() {
		//TODO: Query LDAP based on username and provided configuration
		throw new \Exception( 'Not implemented!' );
		return $this->result;
	}
}