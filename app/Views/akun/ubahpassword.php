<?php include("head.php");?>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <?php include("sidebar.php");?>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="form-style-1 user-pro" action="#">
                    
                    <form action="<?php echo base_url('akun/ubahpassword')?>" class="password"  method="POST">
                        <h4>Change password</h4>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>New Password</label>
                                <input type="password" name="password" id="password-3" placeholder="" required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>Confirm New Password</label>
                                <input type="password" name="repassword" id="repassword-3" placeholder="" required="required" oninput="validatePassword2()" />
                                <small id="password-error3" style="color: red; display: none;">⚠️ Password tidak cocok!</small>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input class="submit" type="submit" value="change" id="btn-ubahpassword">
                            </div>
                        </div>  
                    </form>
                </div>
            </div><script>
function validatePassword2() {
    let password = document.getElementById("password-3").value;
    let repassword = document.getElementById("repassword-3").value;
    let errorText = document.getElementById("password-error3");
    let submitButton = document.getElementById("btn-ubahpassword");

    if (password === repassword && password.length > 0) {
        errorText.style.display = "none"; // Sembunyikan pesan error
        submitButton.disabled = false; // Aktifkan tombol
    } else {
        errorText.style.display = "block"; // Tampilkan pesan error
        submitButton.disabled = true; // Disable tombol daftar
    }
}
</script>
        </div>
    </div>
</div>