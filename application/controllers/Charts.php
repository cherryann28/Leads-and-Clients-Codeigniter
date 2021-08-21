<?php
class Charts extends CI_Controller{
    public function index(){
        $this->load->model('chart_model');
        $data['leads'] = $this->chart_model->lead_client();
        // $data['top5'] = $this->chart_model->top5_lead();

        $this->load->view('chart', $data);
    }

    public function update(){

        if(isset($_POST['update'])){
            $to = $this->input->post('to');
            $from = $this->input->post('from');
            $this->load->model('chart_model');
            $update_chart['list'] = $this->chart_model->update_date($to, $from);
            $this->load->view('chart', $update_chart);
        }
        else{
            redirect('/');
        }
    }
   
}
?>