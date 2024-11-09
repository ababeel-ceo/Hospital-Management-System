<?php
include('../db.php');


?>
 <html>
<body>
<form action="doc_dash_treatment.php" method="post">

<div class="form-group">
    <label class="col-sm-2 col-form-label font-weight-bold">Patient ID</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="pat_id">
    </div>

    <label class="col-sm-2 col-form-label font-weight-bold">Blood Pressure</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="bp">
    </div>

    <label class="col-sm-2 col-form-label font-weight-bold">Disease</label>
    <div class="col-sm-10">
     <textarea id="" cols="40" rows="3" class="form-control" name="dis"></textarea>
    </div>

    <label class="col-sm-2 col-form-label font-weight-bold">Medicine</label>
    <div class="col-sm-10">
     <textarea id="" cols="40" rows="3" class="form-control" name="med"></textarea>
    </div>

    <label class="col-sm-2 col-form-label font-weight-bold" >Description</label>
    <div class="col-sm-10">
     <textarea id="" cols="40" rows="3" class="form-control" name="des"></textarea>
    </div>

    <br>
    <div class="text-center">
    <input type="submit" class="btn btn-primary" name="sub-frm">
    </div>
    
  </div>


</form>
</body>
</html> 

