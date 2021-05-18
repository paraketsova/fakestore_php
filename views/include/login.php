<!-- <form action="" method="post">
  <input type="text" name="login" />
  <input type="password" name="pass" />
  <input type="hidden" name="login_add" value="login_add" />
  <input type="submit" name="Submit" value="Logga in" />
 </form> -->


<div class="container mt-4">
 <div class="row justify-content-center">
  <form action="/login" method="POST" class="col-12 col-md-8 col-lg-8 col-xl-6">
   <div class="row">
    <div class="col text-center">
     <h1>Login</h1>
    </div>
   </div>
   <div class="row align-items-center">
    <div class="col mt-4">
     <input type="text" class="form-control" name="email" placeholder="Email" aria-label=".form-control-sm example">
    </div>
   </div>
   <div class="row align-items-center">
    <div class="col mt-4">
     <input type="password" class="form-control" name="password" placeholder="Password" aria-label=".form-control-sm example">
    </div>
   </div>
   <div class="row align-items-center mt-4">
    <div class="controls col">
     <button type="submit" name="Submit" class="btn btn-secondary">Login</button>
    </div>
   </div>
  </form>
 </div>
</div>