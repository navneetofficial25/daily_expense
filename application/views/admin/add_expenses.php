<div id="layoutSidenav_content">
<main>
   <div class="container py-5">
   <span class="text-center"><?php echo $this->session->flashdata('status')? $this->session->flashdata('status') : ''?></span>
   <form action="<?php echo base_url()."admin/add_expenses/add" ?>" method="post" enctype='multipart/form-data'>
      <div class="px-3">
         <div class="form-group">
            <label for="">Amount</label>
            <input type="text"
               class="form-control" name="amount" id="" aria-describedby="helpId" required>
         </div>
         <div class="form-check">
                <div class="row">
                    <div class="col-md-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="limit_check" id="limit_check" value="1">
                            Person name
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="country_check" id="country_id" value="1">
                            Date
                        </label>
                    </div>
                </div>
        </div>
         <div id="name" class="form-group mt-3">
            <label for="">Person Name</label>
            <input type="text"
               class="form-control" name="personName" id="" aria-describedby="helpId">
         </div>
         <div id="date" class="row mt-3">
            <div class="col">
            <label for="">Date</label>
               <input type="date" name="date" class="form-control" placeholder="Date">
            </div>
         </div><br>
         <div class="form-group">
            <label for="">Message</label>
            <textarea class="form-control"  name="message" id="" rows="3" required></textarea>
         </div>
         <center><button type="submit" class="btn btn-primary">Submit</button></center>
   </form>
   </div>
</main>
<script>
$('#name').hide();
$('#date').hide();

$(".form-check-input").change(function(){
if ($('#limit_check').prop('checked')) {
    $('#name').show();
}else{
    $('#name').hide();
}
if ($('#country_id').prop('checked')) {
    $('#date').show();
}else{
    $('#date').hide();
}
});
</script>