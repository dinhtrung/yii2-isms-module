<?php
/**
 * Return a list of menu item suitable for display in the main Nav
 */
return [
	['label' => 'iSMS Reports', 'url' => '#', 'items' => [
			['label' => 'Dashboard', 'url' => ['/isms/default/index']],
			['label' => 'Send SMS', 'url' => ['/isms/send-sms/index']],
			['label' => 'Sent SMS', 'url' => ['/isms/sent-sms/index']],
	]],
	['label' => 'iSMS Campaign', 'url' => '#', 'items' => [
			['label' => 'Campaign', 'url' => ['/isms/campaign/index']],
			['label' => 'Template', 'url' => ['/isms/template/index']],
			['label' => 'Data Files', 'url' => ['/isms/datafile/index']],
			['label' => 'Work Time', 'url' => ['/isms/worktime/index']],
			['label' => 'Email', 'url' => ['/isms/mailbox/index']],
			['label' => 'FTP', 'url' => ['/isms/ftpsetting/index']],
	]],
	['label' => 'iSMS Filter', 'url' => '#', 'items' => [
			['label' => 'Filter', 'url' => ['/isms/filter/index']],
			['label' => 'Black List', 'url' => ['/isms/blacklist/index']],
			['label' => 'White List', 'url' => ['/isms/whitelist/index']],
	]],
	['label' => 'iSMS Partners', 'url' => '#', 'items' => [
			['label' => 'Orders', 'url' => ['/isms/order/index']],
	]],
];