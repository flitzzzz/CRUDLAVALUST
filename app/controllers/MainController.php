<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class MainController extends Controller {
    
    public function home(){
        $this->call->model('Main_model');
        $data['product'] = $this->Main_model->getInfo();
        $this->call->view('home',$data);
    }
    
    public function add(){
        $Name = $this->io->post('Name');
        $Price = $this->io->post('Price');
        $Quantity = $this->io->post('Quantity');
        $bind = array(
            "Name" => $Name,
            "Price" => $Price,
            "Quantity" => $Quantity,
        );
        $this->db->table('product')->insert($bind);
        redirect('/home');
    }
    public function delete($id)
    {
        if(isset($id)){
            $this->db->table('product')->where("id", $id)->delete();
            redirect('/home');
        }
        else{
            $_SESSION['delete'] = "FAILED";
            redirect('/home');
        }
        
    }
    public function edit($id)
    {
        $this->call->model('Main_model');
        $data['product'] = $this->Main_model->getInfo();
        $data['edit'] = $this->Main_model->searchInfo($id);
        $this->call->view('home', $data);
    }
    public function submitedit($id)
    {
        if(isset($id))
        {
            $Name = $this->io->post('Name');
            $Price = $this->io->post('Price');
            $Quantity = $this->io->post('Quantity');
        $data = [
            "Name" => $Name,
            "Price" => $Price,
            "Quantity" => $Quantity,
        ];
        $this->db->table('product')->where("id", $id)->update($data);
        redirect('/home');    
        }
        
    }
}
?>
