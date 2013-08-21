<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Configuration for using ElasticSearch
 *
 * The configuration is stored as a key value pair.  Server and index
 * are required for proper operation.
 */
$config['elasticsearch'] = array(
    'server'    =>  '192.168.1.38',
    'index'     =>  'stock',
    'port'      =>  9200,
    'type'      =>  ''
    );