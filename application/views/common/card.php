<?php
    // if(isset($_GET['msg'])){
    //     $this->load->view("common/alert",["alert" => "success", "msg" => $_GET['msg']]);
    //     echo "<br>";
    // }

    if ($this->session->flashdata('success')) {
        $this->load->view("common/alert",["alert" => "success", "msg" => $this->session->flashdata('success')]);
        echo "<br>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary card-title">
                    <?php
                        echo $title;
                    ?>
                </h6>
            </div>
            <div class="card-body">
