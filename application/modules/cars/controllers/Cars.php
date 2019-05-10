<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @copyright	Copyright (c) 2019 Andy Binder
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */
/**
 * Class Cars
 */
class Cars extends Admin_Controller
{
    /**
    * Cars constructor.
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_cars');
    }
    
    public function index()
    {
        // Display active clients by default
        redirect('cars/view');
    }
    
    /**
     * @param null $id
     */
    public function form($id = null)
    {
        
    }
    
    /**
     * @param int $car_id
     */
    public function view($car_id)
    {
      
    }
    
    /**
     * @param int $client_id
     */
    public function delete($car_id)
    {
        $this->mdl_cars->delete($client_id);
        redirect('cars');
    }
}
