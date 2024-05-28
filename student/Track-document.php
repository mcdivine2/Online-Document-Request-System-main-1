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
               <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                             <h2 class="pageheader-title"><i class="fa fa-fw fa-eye"></i> Track Document </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Track Document</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card influencer-profile-data">
                                        <div class="card-body">
                                             <div class="" id="message"></div>
                                            <form id="validationform" name="docu_forms" data-parsley-validate="" novalidate="" method="POST">
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-2 col-form-label text-sm-left"><i class="fa fa-building"></i> Departments</label>
                                                    <label class="col-12 col-sm-1 col-form-label text-sm-right"><i class="fa fa-file"></i> Status</label>
                                                    <label class="col-12 col-sm-2 col-form-label text-sm-right"><i class="fa fa-comment"></i> Comment</label>
                                                </div>
                                                
                                                <?php
                                                      $student_id = $_SESSION['student_id'];
                                                      $conn = new class_model();
                                                      $docrequest = $conn->fetchAll_documentrequest($student_id);
                                                   ?>
                                                   <?php foreach ($docrequest as $row) {

                                                ?>
                                                
                                                
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-2 col-form-label text-sm-left">LIBRARY:</label>
                                                    <div class="col-12 col-form-label col-sm-1 col-sm-1">
                                                    </div>
                                                     <div class="col-12 col-sm-6 ml-5">
                                                    <input data-parsley-type="alphanum" type="text" value="Your request for <?= $row['document_name']; ?> is pending please comply." name="subject" required="" placeholder="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                     
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-2 col-form-label text-sm-left">CUSTUDIAN:</label>
                                                    <div class="col-12 col-form-label col-sm-1 col-sm-1">
                                                    </div>
                                                     <div class="col-12 col-sm-6 ml-5">
                                                    <input data-parsley-type="alphanum" type="text" value="Your request for <?= $row['document_name']; ?> is pending please comply." name="subject" required="" placeholder="" class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-2 col-form-label text-sm-left">DEAN:</label>
                                                    <div class="col-12 col-form-label col-sm-1 col-sm-1">
                                                    </div>
                                                     <div class="col-12 col-sm-6 ml-5">
                                                    <input data-parsley-type="alphanum" type="text" value="Your request for <?= $row['document_name']; ?> is pending please comply." name="subject" required="" placeholder="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-12 col-sm-2 col-form-label text-sm-left">TREASURER:</label>
                                                    <div class="col-12 col-form-label col-sm-1 col-sm-1">
                                                   
                                                    </div> 
                                                     <div class="col-12 col-sm-6 ml-5">
                                                    <input data-parsley-type="alphanum" type="text" value="Your request for <?= $row['document_name']; ?> is pending please comply." name="subject" required="" placeholder="" class="form-control" readonly>
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-12 col-sm-2 col-form-label text-sm-left">REGISTRAR:</label>
                                                    <div class="col-12 col-form-label col-sm-1 col-sm-1">
                                                    <?php 
                                                       if($row['status'] ==="Pending"){
                                                           echo '<span class="badge bg-warning text-white">Pending</span>';
                                                         } else if($row['status'] ==="Waiting for Payment"){
                                                          echo '<span class="badge bg-info text-white">Waiting for Payment</span>';
                                                         }else if($row['status'] ==="Releasing"){
                                                            echo '<span class="badge bg-success text-white">Verified</span>';
                                                        }else if($row['status'] ==="Received"){
                                                            echo '<span class="badge bg-warning text-white">Pending Request</span>';
                                                        }
                                                        else if($row['status'] ==="Declined"){
                                                            echo '<span class="badge bg-danger text-white">Declined</span>';
                                                        }
                                                     ?> </div>  
                                                    <div class="col-12 col-sm-6 ml-5">
                                                    <input data-parsley-type="alphanum" type="text" value="Your request for <?= $row['document_name']; ?> is pending please comply." name="subject" required="" placeholder="" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                </div>

                                                
                                                

<!--                                                  <div class="form-group row">
                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Releasing</label>
                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                        <input data-parsley-type="alphanum"  type="date" name="date_releasing" required="" placeholder="" class="form-control">
                                                    </div>
                                                </div>
 -->
                                                </div>
                                                
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    

</body>
 
</html>