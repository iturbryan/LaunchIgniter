<?php
/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/21/15
 * Time: 2:02 PM
 */
?>


<div class="container">

   <div class="col-md-6 col-md-offset-3">
       <form id="sign-in-form" class="text-center">
           <h2 class="form-signin-heading"><i class="glyphicon glyphicon-user"></i>&nbsp;Create Account</h2>
           <div class="form-group">
               <label for="name" class="sr-only">Name</label>
               <input type="text" name="name" class="form-control" placeholder="Your Name" />
           </div>
           <div class="form-group">
               <label for="id_number" class="sr-only">ID Number</label>
               <input type="text" name="id_number" class="form-control" placeholder="Your ID Number" />
           </div>
           <div class="form-group">
               <label for="phone_number" class="sr-only">Phone Number</label>
               <input type="text" name="phone_number" class="form-control" placeholder="Your Phone Number" />
           </div>
           <div class="form-group">
               <label for="email_address" class="sr-only">Email Address</label>
               <input type="text" name="email_address" class="form-control" placeholder="Your Email Address" />
           </div>
           <div class="form-group">
               <label for="password" class="sr-only">Password</label>
               <input type="password" name="password" class="form-control" placeholder="Your Password" />
           </div>
           <div class="form-group">
               <label for="cpassword" class="sr-only">Confirm Password</label>
               <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" />
           </div>
           <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
       </form>
   </div>

</div> <!-- /container -->

