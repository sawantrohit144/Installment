<?php
include ('header.php');

?>

<div class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon" align="center" >
                 
                  <h4 class="card-category" >Product</h4>
                  <hr>
                  <h3 class="card-title"><?php echo $countproduct; ?></h3>
                  <hr>
                 </div>
              </div>
            </div> 
               <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon" align="center">
                 
                  <h4 class="card-category">Category</h4>
                  <hr>
                  <h3 class="card-title"><?php echo $countcat; ?></h3>
                  <hr>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon" align="center">
                 
                  <h4 class="card-category">Supplier</h4>
                  <hr>
                  <h3 class="card-title"><?php echo $countsupp; ?></h3>
                  <hr>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon" align="center">
                 
                  <h4 class="card-category">Costumer</h4>
                  <hr>
                  <h3 class="card-title"><?php echo $countcos; ?></h3>
                  <hr>
                </div>
              </div>
            </div>
      
          </div>
          </div>
<br>
          <div class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon" align="center" >
                 
                  <h4 class="card-category" >Request</h4>
                  <hr>
                  <h3 class="card-title"><?php echo $countreq; ?></h3>
                  <hr>
                 </div>
              </div>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon" align="center" >
                 
                  <h4 class="card-category" >Installment</h4>
                  <hr>
                  <h3 class="card-title"><?php echo $countins; ?></h3>
                  <hr>
                 </div>
              </div>
            </div>  
             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon" align="center" >
                 
                  <h4 class="card-category" >Total Expenses</h4>
                  <hr>
                  <h3 class="card-title"><?php echo $expensescount; ?></h3>
                  <hr>
                 </div>
              </div>
            </div>   
             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon" align="center" >
                 
                  <h4 class="card-category" >Total Sales</h4>
                  <hr>
                  <h3 class="card-title"><?php echo $sscount; ?></h3>
                  <hr>
                 </div>
              </div>
            </div>   
          </div>
