<?php
/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/21/15
 * Time: 2:02 PM
 */
?>


<div class="container">

   <div class="col-md-4 col-md-offset-4">
       <form id="login-form" class="text-center custom-form">
           <i class="fa fa-user icon-lg"></i>
           <h2 class="form-signin-heading">Please login</h2>
           <div id="message-alert">

           </div>
           <div class="form-group">
               <label for="username" class="sr-only">Username</label>
               <input type="text" name="username" class="form-control" placeholder="Username" />
           </div>
           <div class="form-group">
               <label for="password" class="sr-only">Password</label>
               <input type="password" name="password" class="form-control" placeholder="Password" />
           </div>
           <button class="btn btn-primary btn-block" type="submit" id="login-submit">Sign In</button>
       </form>
   </div>

</div> <!-- /container -->

