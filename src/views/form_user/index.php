<?php require_once $GLOBALS['src'] . 'includes/header/index.php' ;?>

<main class='form_user container-md'>
    
    <?php require_once $GLOBALS['src'] . 'components/navbar/index.php' ;?>
    
    <form class="pt-4 d-flex justify-content-center align-items-center" action="" enctype=“multipart/form-data” >
        <div class="row justify-content-between">
    
        <input type="hidden" name="id">
    
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='name'>Name</label>
          <input type="text" name="name" id='name' class="form-control" placeholder="jhon do">
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='username'>User name</label>
            <input type="text" name="username" id='username' class="form-control" placeholder="jhon">
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='email'>Email address</label>
              <input type="email" name="email" id='email' class="form-control" placeholder="name@example.com">
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='street'>Street</label>
              <input type="text" name="address_street" id='street' class="form-control" placeholder="evergreen 123, springfield">
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='suite'>Suite</label>
              <input type="text" id='suite' name="address_suite" class="form-control" placeholder="evergreen 123, springfield">
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='city'>City</label>
            <input type="text" name="address_city" id='city' class="form-control" placeholder="evergreen 123, springfield">
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='zipcode'>Zipcode</label>
            <input type="text" name="address_zipcode" id='zipcode' class="form-control" placeholder="evergreen 123, springfield">
        </fieldset>
        
        <input type="hidden" name="address_geo_lat">
        <input type="hidden" name="address_geo_lng">
        
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='phone'>Phone</label>
            <input type="text" id='phone' name="phone" class="form-control" placeholder="1122532394">
        </fieldset>
        <fieldset class="mb-3 col-12 col-lg-6">
          <label class="form-label h6 w-100" for='website'>Website</label>
              <input type="text" name="website" id='website' class="form-control" placeholder="google.com">
        </fieldset>
        <fieldset class="mb-3  col-12 col-lg-6">
          <label class="form-label h6 w-100" for='company_name'>Company name</label>
                <input type="text" name="company_name" id='company_name' class="form-control" placeholder="Google">
        </fieldset>
        <fieldset class="mb-3  col-12 col-lg-6">
          <label class="form-label h6 w-100" for='company_catchPhrase'>Company catch phrase</label>
            <input type="text" name="company_catchPhrase" id='company_catchPhrase' class="form-control" placeholder="Google">
        </fieldset>
        <fieldset class="mb-3  col-12 col-lg-6">
          <label class="form-label h6 w-100" for='company_bs'>Company bs</label>
                <input type="text" name="company_bs" id='company_bs' class="form-control" placeholder="Google">
        </fieldset>
        <div class='col-lg-6 d-md-flex justify-content-between mb-3'>
          <fieldset class='col-9'>
            <label class="form-label h6" for="avatar">Avatar</label>
            <input  class="form-control col" type="file" name="avatar" id="avatar" accept="image/jpeg">
          </fieldset>
          <div class='avatar__wrapper'>
              <?php if(isset(($this->d)['avatar']['file']) && ($this->d)['avatar']['file'] !== ''){ ?>
                  <img class='avatar' src="<?php echo $_SERVER['HTTP_REFERER'] . 'filestore/img/' . ($this->d)['avatar']['file'];?>" alt='avatar'>
              <?php }else{ ?>
                <img class='avatar d-none' src="" alt='avatar'>
              <?php };?>
          </div>
        </div>
        <div class='col-lg-6 d-md-flex justify-content-between mb-3'>
          <fieldset class='col-9'>
            <label class="form-label h6" for="cv">C.V</label>
            <input  class="form-control" type="file" name="cv" id="cv" accept="application/pdf">
          </fieldset>

          <div class='avatar__wrapper text-end'>
              <?php if(isset(($this->d)['cv']['file']) && ($this->d)['cv']['file'] !== '' ){ ?>
                  <a href="<?php echo $_SERVER['HTTP_REFERER'] . "filestore/pdf/" . ($this->d)['cv']['file'] ;?>" target="_blank" rel="noopener noreferrer">
                    <img class="avatar" src="<?php echo $_SERVER['HTTP_REFERER'] . '/src/assets/icons/file-pdf-regular.svg' ;?>" alt='avatar'>
                  </a>
              <?php };?>
          </div>
        </div>
          
        <div class="text-end mt-4">
          <button type='submit' class="btn btn-primary col-3" value=>Save</button>
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