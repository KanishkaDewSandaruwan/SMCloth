<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                  <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Add Medication Amount</a></h1>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 mt-4" style="font-family: \"Times New Roman\",Times, serif;">
                                   <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name" class="a"><b>Medication Amount</b></label>
                        <input type="number" class="form-control" name="amount" placeholder="Medication Amount">
                      </div>
                    </div>

   

                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="window.location.href='pre.php'" data-bs-dismiss="modal">Back</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                    <?php
                         if(isset($_POST['submit'])){
                            $cat = $_REQUEST['amount'];

                            $id = $_REQUEST['medication_id'];


                              if(!empty($cat))
                              {

                                $query3="UPDATE medication SET price='$cat',status='Accepted' WHERE medication_id='".$id."'";
                                $sql3=mysqli_query($con,$query3);
                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location.href='pre.php';</script>";
                                    
                              }
                        } ?>
                  </div>
                </form>
                                </div>
                            </div>
                                            
                                        
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SM Clothing.2021.</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
