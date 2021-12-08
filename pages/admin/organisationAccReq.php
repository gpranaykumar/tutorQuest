

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <hr>
            <h3> Organisation Account Requests</h3>
        </div>
    </div> 
<div class="row justify-content-center">
    <div class="col-md-12 table-responsive-sm ">
    <?php if (isset($_GET['success'])) { ?>
            <p class="text-success"><?php echo $_GET['success']; ?></p>
    <?php unset($_GET['success']);} ?>
        <table class="table table-bordered"  data-sorting="true">
            <thead>
                <tr>
                    <th >Name</th>
                    <th >Username</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>Proof Document</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                #display organisation data 
                $sql=" SELECT * FROM organisation_data WHERE status='0' ";
                $result = mysqli_query($conn, $sql);
                while($row=$result->fetch_assoc()){
                    #print_r($row); ?>
                    <tr>
                        <td> <?= $row['name']; ?></td>
                        <td> <?= $row['uname']; ?></td>
                        <td> <?= $row['email']; ?></td>
                        <td> <?= $row['state']; ?></td>
                        <td> <?= $row['city']; ?></td>
                        <td> <?= $row['address']; ?></td>
                        <td> <?= $row['number']; ?></td>
                        <td> <a href="../assets/organisation_data/<?php echo $row['uname'];?>/proof_doc.jpg" download> Download</a></td>
                        <td class='text-danger'>Not Activated</td>
                        <td> 
                            <?php $uname= $row['uname']?>
                            <a href="admin_operation.php?uname=<?php echo $uname ?>&status=A&rol=O" class="btn btnA" title="Verify" >A</a>
                            <a href="admin_operation.php?uname=<?php echo $uname ?>&status=R&rol=O" class="btn btnR" title="Reject" >R</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
