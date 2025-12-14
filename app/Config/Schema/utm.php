<?php

class UtmSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
		return true;
	}

	public function default() {
		$utms = array(
			'id' => array(
				'type' => 'integer',
				'null' => false,
				'key' => 'primary'
			),
			'source' => array(
				'type' => 'string',
				'null' => false,
				'length' => 255
			),
			'medium' => array(
				'type' => 'string',
				'null' => false,
				'length' => 255
			),
			'campaign' => array(
				'type' => 'string',
				'null' => false,
				'length' => 255
			),
			'content' => array(
				'type' => 'string',
				'null' => true,
				'default' => null,
				'length' => 255
			),
			'term' => array(
				'type' => 'string',
				'null' => true,
				'default' => null,
				'length' => 255
			),
			'created' => array(
				'type' => 'datetime',
				'null' => false
			),
			'modified' => array(
				'type' => 'datetime',
				'null' => false
			)
		);

		return array('utm_data' => $utms);
	}
}
