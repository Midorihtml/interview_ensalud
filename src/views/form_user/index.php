<?php require_once $GLOBALS['src'] . 'includes/header/index.php' ;?>

<main class='form_user container-md'>
    
    <?php require_once $GLOBALS['src'] . 'components/navbar/index.php' ;?>
    
    <form class="pt-4 d-flex justify-content-center align-items-center" action="" enctype=“multipart/form-data” >
        <div class="row justify-content-between">
    
        <input type="hidden" name="id">
    
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">Name
              <input type="text" name="name" class="form-control" placeholder="jhon do">
          </label>
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">User name
              <input type="text" name="username" class="form-control" placeholder="jhon">
          </label>
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">Email address
              <input type="email" name="email" class="form-control" placeholder="name@example.com">
          </label>
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">Street
              <input type="text" name="address_street" class="form-control" placeholder="evergreen 123, springfield">
            </label>
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">Suite
              <input type="text" name="address_suite" class="form-control" placeholder="evergreen 123, springfield">
            </label>
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">City
              <input type="text" name="address_city" class="form-control" placeholder="evergreen 123, springfield">
            </label>
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">Zipcode
              <input type="text" name="address_zipcode" class="form-control" placeholder="evergreen 123, springfield">
            </label>
        </fieldset>
        
        <input type="hidden" name="address_geo_lat">
        <input type="hidden" name="address_geo_lng">
        
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">Phone
              <input type="text" name="phone" class="form-control" placeholder="1122532394">
            </label>
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label w-100">Website
              <input type="text" name="website" class="form-control" placeholder="google.com">
            </label>
        </fieldset>
        <fieldset class="mb-3  col-12 col-lg-6">
          <label class="form-label w-100">Company name
                <input type="text" name="company_name" class="form-control" placeholder="Google">
            </label>
        </fieldset>
        <fieldset class="mb-3  col-12 col-lg-6">
          <label class="form-label w-100">Company catch phrase
                <input type="text" name="company_catchPhrase" class="form-control" placeholder="Google">
            </label>
        </fieldset>
        <fieldset class="mb-3  col-12 col-lg-6">
          <label class="form-label w-100">Company bs
                <input type="text" name="company_bs" class="form-control" placeholder="Google">
            </label>
        </fieldset>
        <div class='col-lg-6 mb-3'>
          <label class= "form-label" for="">Avatar
              <input  class="form-control col"  type="file" name="avatar" id="avatar" accept="image/jpeg">
          </label>
          <div class='avatar__wrapper'>
              <?php 
                  if(isset(($this->d)['avatar']['file'])){
                      echo "<img class='avatar' src=" . $_SERVER['HTTP_REFERER'] . "filestore/img/" . ($this->d)['avatar']['file'] . " alt='avatar'>";
                  };
              ;?>
          </div>
        </div>
        <label class="form-label col-lg-6 mb-3" for="">C.V
            <input  class="form-control" type="file" name="cv" id="cv" accept="application/pdf">
        </label>
        <div class="text-end mt-4">
          <button id='' class="btn btn-primary col-3" value=>Save</button>
        </div>
    </div>
    </form>

    <div class="toast align-items-center " role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <!-- insertar msg de response -->
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>

</main>

<?php require_once $GLOBALS['src'] . 'components/footer/index.php' ;?>

<script>
    <?php require_once $GLOBALS['src'] . 'scripts/Models.js' ;?>

    <?php require_once $GLOBALS['src'] . 'scripts/form_user.js' ;?>
</script>

<?php require_once $GLOBALS['src'] . 'includes/footer/index.php' ;?>