<div id="layoutSidenav_content">
<main>
   <div class="container-fluid">
      <h1 class="mt-4 mb-4">Admin Management</h1>
      <div class="container">
         <form action="<?php echo  base_url().'admin/management/admin_management/insert_update/';?>" method="post">
            <div class="form-group">
            <?php echo (validation_errors()) ? validation_errors() : '' ;?>
        <?php
        if($this->session->flashdata('success')){
            echo '<p class="text-success">'.$this->session->flashdata('success').'</p>';
        }
        if($this->session->flashdata('error')){
            echo '<p class="text-danger">'.$this->session->flashdata('error').'</p>';
        }
        ?>
       
               <label for="exampleFormControlInput1">Name</label>
               <input type="text" class="form-control" value="<?php echo $admin['user_name']; ?>" name="name" placeholder="Name">
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1">User Name</label>
               <input type="text" class="form-control" value="<?php echo $admin['user_uname']; ?>" name="username" placeholder="User Name">
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
               <input type="email" class="form-control" value="<?php echo $admin['user_email']; ?>" name="email" placeholder="Name@gmail.com">
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1">New Password</label>
             <input type="password" class="form-control" name="new_password" placeholder="New Password">
            </div>
            <div class="form-group">
               <input type="submit" class="btn btn-primary">
            </div>
         </form>
      </div>
   </div>
</main>
<style>
h1{
    text-align:center;
  }

</style>