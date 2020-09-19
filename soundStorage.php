<?php

$json = 
	'[{
        "title":"I am a man who will fight for your honor",
        "author":"None", 
        "description":"None", 
        "type":"Other", 
        "language":"None",
        "album":"None"
    }]';
	var_dump(json_decode($json));
	var_dump(json_decode($json, true));
