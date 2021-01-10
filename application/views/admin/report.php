<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".form-control" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
<style>
    .bg-green{
        background : #c7fbd3 !important;
    }
    .bg-red{
        background : #f7a2aa !important;
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container py-5">
            <span class="text-center"><?php echo $this->session->flashdata('status')? $this->session->flashdata('status') : ''?></span>
            <div class="form-check">
                <form action="<?php echo base_url()."admin/report/fetch" ?>" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" placeholder="start" class="form-control" name="first">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" placeholder="end" class="form-control" name="end">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" value="Submit">
                                </div>
                            </div>
                        </div>
                </form>
                </div>
        </div>
        <?php if(isset($fetch)){ ?>
        <div class="container">
            <table class="table">
                <thead>
                    <tr class="bg-secondary text-white">
                        <th>Id</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Message</th>
                        <th>Person Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($fetch as $value) {?>
                    <?php echo ($value['amt'][0] == '+')? '<tr class=" bg-green">' : '<tr class=" bg-red">'; ?>
                        <td scope="row"><?php echo $i; ?></td>
                        <td><?php echo $value['date'] ; ?></td>
                        <td><?php echo $value['amt'] ; ?></td>
                        <td><?php echo $value['msg'] ; ?></td>
                        <td><?php echo $value['personName'] ; ?></td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
        </div>
        <?php }?>
    </main>

