<?php include('main_header/header.php');?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
         <?php include('left_sidebar/sidebar.php');?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
            <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title"><i class="fa fa-fw fa-money-bill-wave"></i> Add Payment </h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Payment</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<style>
    .form-group {
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 16px;
        font-weight: bold;
        color: #1269AF;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .form-control {
        padding: 5px;
        font-size: 14px;
    }

    .btn-primary {
        background-color: #1269AF;
        border-color: #1269AF;
        color: white;
    }

    .row {
        margin-left: 0;
        margin-right: 0;
    }

    .row > .col-md-6 {
        padding-left: 15px;
        padding-right: 15px;
    }

    .text-right {
        text-align: right;
    }
</style>

<!-- Payment Form -->

<div class="row justify-content-right mx-3">
    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10">
        <div class="card influencer-profile-data">
            <div class="card-body">
            
            <h4 class="section-title">Payment details</h4>
                <form id="addPaymentForm" method="POST" action="submit_payment.php">
                    <div class="form-group row">
                        <div class="col-12 col-sm-6">
                            <label>Reference No.</label>
                            <input type="text" value="<?= uniqid('ref_'); ?>" name="reference_no" readonly class="form-control">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Student Name</label>
                            <input type="text" name="student_name" required class="form-control" placeholder="student name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-sm-6">
                            <label>Control No.</label>
                            <input type="text" name="control_no" required class="form-control" placeholder="Enter control number">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Document Name</label>
                            <input type="text" name="document_name" required class="form-control" placeholder="List of the documents">
                        </div>
                    </div>
                    <div class="form-group row">
                       
                        <div class="col-12 col-sm-6">
                            <label>Total Amount</label>
                            <input type="text" name="total_amount" required class="form-control" placeholder="Total amount to be paid">
                        </div>
                    </div>
                   
                        
                    
                    <div class="form-groupform-group mt-4 text-right">
                        <div class="col-12">
                            <button type="submit" class="btn btn-space btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
  


