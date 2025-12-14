<?php

class Utm extends AppModel {
    public $name = 'Utm';

    public $useTable = "utm_data";

    public $validate = array(
        'source' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Source required'
            )
        ),
        'medium' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Medium required'
            )
        ),
        'campaign' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Campaign required'
            )
        )
    );
}
