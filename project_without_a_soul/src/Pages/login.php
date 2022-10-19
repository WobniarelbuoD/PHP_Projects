
<!-- login screen -->
<?php
    if(isset($_POST['failed'])){
        print('<h3 style="color:red;">'.$_POST['failed'].'</h3>');
    }
?>
<div style='height:50vh' class='d-flex align-items-center justify-content-center'>
    <div style='min-width:500px' class='border border-danger p-5 rounded bg-warning'>
        <form action='' method='POST' class='text-black'>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name='email' class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name='password' type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-success mt-3">Submit</button>
        </form>
    </div>
</div>