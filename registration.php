<!DOCTYPE html>
<html lang="en">
<?php
 include('partials-front/nav-bar.php');
 ?>
<body>




<div class="py-5">
<div class="container-md w-50 p-3 " >
    <div class="row">
        <div class="col-md-12">
            <?php   
            // if(isset($_SESSION['message']))
            // {
            ?>
            <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hei!</strong> <?php echo  $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> -->
            <?php
              // unset($_SESSION['message']);
            }

            ?>

            <!-- <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Înregistrare Utilizator</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="functions/authcode.php" method="POST" novalidate>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Nume</label>
                            <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-fill"></i></span>
                            <input name="numeComplet" type="text" class="form-control" id="validationCustom01" value="" required>
                            <div class="valid-feedback">
                            Camp completat corect.
                            </div>
                            <div class="invalid-feedback">
                            Campul este obligatoriu!
                            </div>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <label for="validationCustom07" class="form-label">Telefon</label>
                            <input name="phone" type="number" class="form-control" id="validationCustom07" value="" required>
                            <div class="valid-feedback">
                            Camp completat corect.
                            </div>
                            <div class="invalid-feedback">
                            Campul este obligatoriu!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="validationCustom03" value="" required>
                            <div class="valid-feedback">
                            Camp completat corect.
                            </div>
                            <div class="invalid-feedback">
                            Adresa de mail este in format invalid!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Parola</label>
                            <input name="password" type="password" class="form-control" id="password" value="" required>

                            <div class="valid-feedback">
                            Camp completat corect.
                            </div>
                            <div class="invalid-feedback">
                            Campul este obligatoriu!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="password2" class="form-label">Confirma Parola</label>
                            <input name="password2" type="password" class="form-control" id="password2" value="" required>

                            <div class="valid-feedback">
                            Campnu este completat corect.
                            </div>
                            <div class="invalid-feedback">
                            Confirmare Parola nu coincide cu Parola
                            </div>
                        </div>
                        <br>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="register_btn">Submit form</button>
                        </div>
                    </form>
                </div>
                
            </div>
        

        </div>
    </div>
</div>
</div>




  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

var password = document.getElementById("parola")
var confirm_password = document.getElementById("parola2");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Parolele nu coincid!!");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
    </script>
</body>

</html>


 -->


   <?php include('partials-front/footer.php') ?>