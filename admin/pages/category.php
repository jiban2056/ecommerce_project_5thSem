<?php 
@session_start();
include("../../functions.php");
if(isset($_SESSION['ISADMINLOGIN']) && $_SESSION['ISADMINLOGIN']=="TRUE"){
include("header.php");?>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Category Details</li>
                        </ol>
                      
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Categroies
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        	<th>SN</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category Added Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                               
                                    <tbody>

                                    	<?php
                                        $i=1;

                                          $sql = "SELECT * FROM category_tbl where status='1' order by id desc";
     
                                          $result = $dbConnect->query($sql);
           									 if ($result->num_rows > 0) {
            									while($row = $result->fetch_assoc()) {  

					                  ?>



                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['description'];?></td>
                                            <td><?php echo $row['category_date'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                        </tr>

                                    <?php } } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
             
            </div>


<?php include("footer.php");

}else{
    redirect("../admin-login.php?msg=invaliduser");
}
?>
