<div class="card">
    <div class="card-body">
    <div class="jumbotron">
  <h1 class="display-4">Welcome, <?=session('user')->name;?> </h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-warning btn-lg" href="<?= site_url("login");?>" role="button">Logout</a>
  </p>

</div>
    </div>
    
</div>