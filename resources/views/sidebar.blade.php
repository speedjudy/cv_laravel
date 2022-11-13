<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/cvlist">CV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/client">Client</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/demand">Demande</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="/mission">Mission</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="/intervention">Intervention</a>
        </li>  
      </ul>
    </div>
  </div>
</nav>
<script>
  if (sessionStorage.getItem("x-t")!="") {
      
  } else {
      location.href = "/";
  }
</script>