<!-- footer section-->
<footer class="ht-footer">
    <div class="container">
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1">
                 <a href="<?php echo base_url('home'); ?>"><img class="logo" src="<?php echo base_url('assets/upload/image/logoR.png') ?>" alt=""></a>
                 <p>Website Review Film<br>
                Nonton Dan Review </p>
                <p>Kontak Kami: <a href="#">0811 222 333 44</a></p>
            </div>
            <div class="flex-child-ft item2">
                <h4>Menu</h4>
                <ul>
                    <li><a href="#">Login</a></li> 
                    <li><a href="#">Registrasi</a></li>
                    <li><a href="#">Daftar Film</a></li>

                </ul>
            </div>
            <div class="flex-child-ft item3">
                <h4>Legal</h4>
                <ul>
                    <li><a href="#">Terms of Use</a></li> 
                    <li><a href="#">Privacy Policy</a></li> 
                    <li><a href="#">Security</a></li>
                </ul>
            </div>
            
        </div>
    </div>

  <div class="ft-copyright">
    
    <div class="backtotop">
      <p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
    </div>
  </div>
</footer>
<!-- end of footer section-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action="<?php echo base_url('login') ?>">
          <div class="row">
             <label for="email">
                    Email:
                    <input type="email" name="email" id="username" placeholder="Masukan Email Anda" required="required" />
                </label>
          </div>
           
            <div class="row">
              <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="Masukan Password Anda" required="required" />
                </label>
            </div>
            <div class="row">
              <div class="remember">
          <div>
            <input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
          </div>
                <a href="#">Lupa password ?</a>
              </div>
            </div>
           <div class="row">
             <button type="submit">Login</button>
           </div>
        </form>
        
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Registrasi</h3>
        <form method="post" action="<?php echo base_url('registrasi'); ?>">
            <div class="row">
                 <label for="username-2">
                    Nama :
                    <input type="text" name="name" id="username-2" placeholder="Masukan Nama Anda" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                   Email :
                    <input type="email" name="email"  placeholder=""  required="required" />
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" name="repassword" id="repassword-2" placeholder="" required="required" oninput="validatePassword()" />
                </label>
                <small id="password-error" style="color: red; display: none;">⚠️ Password tidak cocok!</small>

            </div>
           <div class="row">
             <button type="submit" id="submit-btn" disabled>Daftar</button>
           </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->
<script src="<?php echo base_url('assets/template/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('assets/template/js/plugins.js') ?>"></script>
<script src="<?php echo base_url('assets/template/js/plugins2.js') ?>"></script>
<script src="<?php echo base_url('assets/template/js/custom.js') ?>"></script>
<script>
function validatePassword() {
    let password = document.getElementById("password-2").value;
    let repassword = document.getElementById("repassword-2").value;
    let errorText = document.getElementById("password-error");
    let submitButton = document.getElementById("submit-btn");

    if (password === repassword && password.length > 0) {
        errorText.style.display = "none"; // Sembunyikan pesan error
        submitButton.disabled = false; // Aktifkan tombol
    } else {
        errorText.style.display = "block"; // Tampilkan pesan error
        submitButton.disabled = true; // Disable tombol daftar
    }
}
</script>

<!-- Sweet Alert -->
<script src="<?php echo base_url();?>/assets/admin2/assets/js/plugin/sweetalert/sweetalert.min.js"></script>


<script>
  // Sweet alert
function confirmation(ev) {
ev.preventDefault();
var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
console.log(urlToRedirect); // verify if this is the right URL
swal({
title: "Yakin ingin menghapus data ini?",
text: "Data yang sudah dihapus tidak dapat dikembalikan",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
// redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
if (willDelete) {
// Proses ke URL
window.location.href = urlToRedirect;
} 
});
} 
</script>


</body>


</html>