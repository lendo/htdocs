<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ElasticSearch
 *
 * Class for working with an ElasticSearch engine.  The elasticsearch.php
 * configuration file should be updated with your specific configuration.
 *
 * @package <package>
 * @subpackage <subpackage>
 * @category Library
 * @author Kurt Wolf <kurt@itguyonline.com
 */

class IncorrectElasticsearchConfiguration extends Exception {}

class Elasticsearch {

    private $config_file = 'elasticsearch';

    private $server = '';
    private $port = '';
    private $index = '';
    private $type = '';
    private $ci = '';


    /**
     * Object constructor
     *
     * @access public
     */
    public function __construct()
    {
        $this->ci =& get_instance();

        $this->ci->config->load($this->config_file);
        $config = $this->ci->config->item('elasticsearch');

        $this->server = (isset($config['server']))?'http://'.$config['server']:'http://localhost';
        $this->index  = (isset($config['index']))?$config['index']:$_SERVER['SERVER_NAME'];
        $this->port   = (isset($config['port']))?':'.$config['port']:':9200';

        // TODO: Check for a 404 error returned for a status

    } // end: public function __construct($config = null)


    /**
     * Perform interaction with the Elasticsearch server
     *
     * @access private
     * @param $path string the URL to use
     * @param $data array the data to pass to the server
     * @return array the response from the server
     */
    private function _call($path, $data = array())
    {
        $data['header'] = 'Content-Type: text/html; charset=utf-8';
        $content = @file_get_contents($this->server . $this->port . '/' . $this->index . '/' . $path, NULL, stream_context_create(array('http' => $data)));
        if ($content === FALSE)
        {
            return NULL;
        }
        else
        {
            return json_decode($content, TRUE);
        }
    } // end: private function _call($path, $data = array())


    /**
     * Create a new index
     *
     * @access public
     * @return array the response from the server
     */
    public function create()
    {
        return $this->_call(NULL, array('method' => 'PUT'));
    } // end: public function create($index = '')


    /**
     * Drop the index from the Elasticsearch server
     *
     * @access public
     * @return array the response from the server
     */
    public function drop($type = "")
    {
        if (strlen($type) == 0)
        {
            return $this->_call(NULL, array('method' => 'DELETE'));
        }
        else
        {
            return $this->_call($type, array('method' => 'DELETE'));
        }
    } // end: public function drop()


    /**
     * Get the status of an index
     *
     * @access public
     * @return array the response from the server
     */
    public function status()
    {
        return $this->_call('_status');
    } // end: public function status()


    /**
     * Get the number of documents in an index or for a specific type in the index
     *
     * @access public
     * @param $type string the type to reference, if not provided address the entire index
     * @return array the response from the server
     */
    public function count($type = '')
    {
        $type = (strlen($type)>0)? $type . '/': '';
        return $this->_call($type . '_count', array('method' => 'GET', 'content' => '{ matchAll:{} }'));
    } // end: public function count($type = '')


    /**
     * Configure a map for a type
     *
     * @access public
     * @param $type string the type to reference
     * @param $data array the map definition for the type
     * @return array the response from the server
     */
    public function map($type, $data)
    {
        $type = (strlen($type)>0)? $type . '/': '';
        return $this->_call($type . '_mapping', array('method' => 'PUT', 'content' => $data));
    } // end: public function map($type, $data)


    /**
     * Add a new document to the index
     *
     * @access public
     * @param $type string the type to reference, if not provided address the entire index
     * @param $id int identifier for this index entry
     * @param $data <mixed> data to add to the index
     * @return array the response from the server
     */
    public function add($type = '', $id, $data)
    {
        // TODO: $id should not be a required value
        $type = (strlen($type)>0)? $type . '/': '';
        return $this->_call($type . $id, array('method' => 'PUT', 'content' => $data));
    } // end: public function add($type = '', $id, $data)


    /**
     * Delete a record from the index
     *
     * @access public
     * @param $type string the type to reference, if not provided address the entire index
     * @param $id int identifier for this index entry
     * @return array the response from the server
     */
    public function delete($type = '', $id)
    {
        $type = (strlen($type)>0)? $type . '/': '';
        return $this->_call($type . $id, array('method' => 'DELETE'));
    } // end: public function delete($type = '', $id)


    /**
     * Get a record from the index
     *
     * @access public
     * @param $type string the type to reference, if not provided address the entire index
     * @param $id int identifier for this index entry
     * @return array the response from the server
     */
    public function get($type = '', $id)
    {
        $type = (strlen($type)>0)? $type . '/': '';
        return $this->_call($type . $id, array('method' => 'GET'));
    } // end: public function get($type = '', $id)


    /**
     * Query the index for matching records
     *
     * @access public
     * @param $type string the type to reference, if not provided address the entire index
     * @param $q string the search query
     * @param $limit int the maximum number or records to retrieve
     * @param $highlight boolean highlight the matching text
     * @return array the response from the server
     */
    public function query($type = '', $q, $limit = 9999, $highlight = TRUE)
    {
        $type = (strlen($type)>0)? $type . '/': '';
        if ($highlight == TRUE)
        {
            return $this->_call(
                $type . '_search?' . http_build_query(array(
                    'q' => $q,
                    'size' => $limit
                    )),
                array(
                    'header' => 'Content-Type: application/x-www-formurlencoded\r\n',
                    'content' => '{ "highlight": { "fields": { "field_1": {"pre_tags": ["<b class=\"match\">"], "post_tags": ["</b>"]}}}}'
                    )
                );
        }
        else
        {
            return $this->_call(
                $type . '_search?' . http_build_query(array(
                    'q' => $q,
                    'size' => $limit
                    ))
                );
        }
    } // end: public function query($type = '', $q)


} // end: class Elasticsearch

/* End of file Elasticsearch.php */
/* Location: ./application/libraries/Elasticsearch.php */