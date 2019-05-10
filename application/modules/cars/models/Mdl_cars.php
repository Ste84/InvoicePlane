<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */
/**
 * Class Mdl_Cars
 */
class Mdl_Cars extends Response_Model
{
    public $table = 'ip_cars';
    public $primary_key = 'ip_cars.car_id';
    public $date_created_field = 'car_date_created';
    public $date_modified_field = 'car_date_modified';
    
    public function default_select()
    {
    
    }
    
    public function default_order_by()
    {
        $this->db->order_by('ip_cars.car_name');
    }
    
    public function validation_rules()
    {
        
    }
    
    /**
     * @param int $amount
     * @return mixed
     */
    function get_latest($amount = 10)
    {
            return $this->mdl_cars
            ->order_by('car_id', 'DESC')
            ->limit($amount)
            ->get()
            ->result();
    }
    
        /**
     * @param $input
     * @return string
     */
    function fix_avs($input)
    {
        if ($input != "") {
            if (preg_match('/(\d{3})\.(\d{4})\.(\d{4})\.(\d{2})/', $input, $matches)) {
                return $matches[1] . $matches[2] . $matches[3] . $matches[4];
            } else if (preg_match('/^\d{13}$/', $input)) {
                return $input;
            }
        }
        return "";
    }
    
        function convert_date($input)
    {
        $this->load->helper('date_helper');
        if ($input == '') {
            return '';
        }
        return date_to_mysql($input);
    }
    
        public function db_array()
    {
        $db_array = parent::db_array();
        return $db_array;
    }
    
    /**
    * @param int $id
    */
    public function delete($id)
    {
        parent::delete($id);
        $this->load->helper('orphan');
        delete_orphans();
    }
    
    /**
    * Returns car_id of existing car
    *
    * @param $client_name
    * @return int|null
    */
    public function car_lookup($car_name)
    {
        
    }
    
    /**
    * @param $user_id
    * @return $this
    */
    public function get_not_assigned_to_user($user_id)
    {
        
    }
}
