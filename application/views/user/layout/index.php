<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" class="no-js" >
    <?php $this->load->view('user/layout/head'); ?>
    <body class="bg-lightwhite" data-ng-app="mohit"> 
        <div class=""> 
            <div class="">
                <?php $this->load->view('user/layout/content', $data); ?>
            </div>
            
            <?php $this->load->view('user/layout/footerlink'); ?>
        </div>
    </body>
</html>