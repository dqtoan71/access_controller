<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2/27/2018
 * Time: 5:11 PM
 */
namespace toandang\access_controller;
class Acl
{
    private $_url;
    private $_group;
    private $_accessData = [];

    public function __construct($url = null,$users = null)
    {
        $this->_url = $url;

        if (!file_exists($this->_url)) return false;

        $data = json_decode(file_get_contents($this->_url), TRUE);

        if(!$data) return false;

        foreach ($data as $key => $value) {

            if($users === $key){

                $this->_group = $key;

                foreach ($value['allow'] as $controller => $actions) {

                    $this->_accessData[$controller] = $actions[0];

                }
            }
        }

        if(!$this->_group) return false; return true;
    }

    public function getGroup(){return $this->_group;}

    public function getAccessData(){return $this->_accessData;}


    public function isAllowed($controller, $action)
    {
        foreach ($this->_accessData as $con => $act){

            if($con === $controller && $act === $action)return true;

        }
        return false;
    }


}