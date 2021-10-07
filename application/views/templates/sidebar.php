<!-- Sidebar -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



  <!-- Sidebar - Brand -->

  <a class="container align-items-center" style="text-decoration: none;" href="<?= base_url('dashboard'); ?>">

    <div class="container" style="color: #ffffff; font-family: Arial, sans-serif; font-size: 22px;">

      <img src=" <?= base_url('assets/img/ybb_putih_cropped.png'); ?>" style="width: 100px; height: 90px; padding-top: 20px; padding-lef: 0px;">

      <p style="padding-top:10px;">YBB Admin</p>

    </div>



  </a>



  <!-- Divider -->

  <hr class="sidebar-divider my-0">



  <!-- Nav Item - Dashboard -->

  <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link" href="<?= base_url('dashboard'); ?>">

      <i class="fas fa-fw fa-tachometer-alt"></i>

      <span>Dashboard</span></a>

  </li>



  <!-- Divider -->

  <hr class="sidebar-divider">



  <!-- Nav Item - Pages Collapse Menu -->

  <li <?= $this->uri->segment(1) == 'participant'  ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePar" aria-expanded="true" aria-controls="collapsePar">

      <i class="fas fa-user fa-cog"></i>

      <span>Participants</span>

    </a>

    <div id="collapsePar" class="collapse <?= $this->uri->segment(1) == 'participant' ? 'show' : ''; ?>" aria-labelledby="headingPar" data-parent="#accordionSidebar">

      <div class="bg-white py-2 collapse-inner rounded">

        <a <?= $this->uri->segment(2) == '' ? 'class="collapse-item active"' : 'class="collapse-item"'; ?> href="<?= base_url('participant'); ?>">Participants</a>

        <!-- <a class="collapse-item" href="cards.html">Valid Participants</a> -->

        <a <?= $this->uri->segment(2) == 'full' ? 'class="collapse-item active"' : 'class="collapse-item"'; ?> href="<?= base_url('participant/full'); ?>">Fully Funded Participants</a>
        <a <?= $this->uri->segment(2) == 'sorted' ? 'class="collapse-item active"' : 'class="collapse-item"'; ?> href="<?= base_url('participant/sorted'); ?>">Sorted Participants</a>

      </div>

    </div>

  </li>


  <li <?= $this->uri->segment(1) == 'agreemnet_letter' ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link collapsed" href="<?= base_url('agreement_letter'); ?>">

      <i class="fas fa-list"></i>

      <span>Agreement Letters</span>

    </a>

  </li>


  <!-- Nav Item - Utilities Collapse Menu -->

  <li <?= $this->uri->segment(1) == 'payment' ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link collapsed" href="<?= base_url('payment'); ?>">

      <i class="fas fa-credit-card fa-cog"></i>

      <span>Payments</span>

    </a>

  </li>



  <!-- Nav Item - Utilities Collapse Menu -->

  <li <?= $this->uri->segment(1) == 'summit_content' ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link collapsed" href="<?= base_url('summit_content'); ?>">

      <i class="fas fa-folder fa-cog"></i>

      <span>Summit Contents</span>

    </a>

  </li>



  <!-- Nav Item - Pages Collapse Menu -->

  <li class="nav-item <?= $this->uri->segment(1) == 'others' ? 'active' : '' ?>">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOther" aria-expanded="true" aria-controls="collapseOther">

      <i class="fas fa-file fa-cog"></i>

      <span>Summit Management</span>

    </a>

    <div id="collapseOther" class="collapse <?= $this->uri->segment(1) == 'others' ? 'show' : ''; ?>" aria-labelledby="headingOther" data-parent="#accordionSidebar">

      <div class="bg-white py-2 collapse-inner rounded">

        <a class="collapse-item <?= $this->uri->segment(2) == 'index_summits' ? 'active' : '' ?>" href="<?= base_url('others/index_summits'); ?>">Summits</a>

        <a class="collapse-item <?= $this->uri->segment(2) == 'index_timelines' ? 'active' : '' ?>" href="<?= base_url('others/index_timelines'); ?>">Summit Timelines</a>

        <a class="collapse-item <?= $this->uri->segment(2) == 'index_payment_types' ? 'active' : '' ?>" href="<?= base_url('others/index_payment_types'); ?>">Payment Types</a>

      </div>

    </div>

  </li>



  <li class="nav-item <?= $this->uri->segment(1) == 'meal_attendance' || $this->uri->segment(1) == 'summit_day' || $this->uri->segment(1) == 'meal_type' ? 'active' : ''; ?>">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

      <i class="fas fa-plug fa-cog"></i>

      <span>Attendance</span>

    </a>

    <div id="collapseTwo" class="collapse <?= $this->uri->segment(1) == 'meal_attendance' || $this->uri->segment(1) == 'summit_day' || $this->uri->segment(1) == 'meal_type' ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

      <div class="bg-white py-2 collapse-inner rounded">

        <a class="collapse-item <?= $this->uri->segment(1) == 'meal_attendance' ? 'active' : '' ?>" href="<?= base_url('meal_attendance'); ?>">Meal Attendances</a>

        <a class="collapse-item <?= $this->uri->segment(1) == 'meal_type' ? 'active' : '' ?>" href="<?= base_url('meal_type'); ?>">Meal Types </a>

        <a class="collapse-item <?= $this->uri->segment(1) == 'summit_day' ? 'active' : '' ?>" href="<?= base_url('summit_day'); ?>">Summit Days </a>

      </div>

    </div>

  </li>



  <!-- Nav Item - Utilities Collapse Menu -->

  <li <?= $this->uri->segment(1) == 'influencer' ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link collapsed" href="<?= base_url('influencer'); ?>">

      <i class="fas fa-users fa-cog"></i>

      <span>Influencers</span>

    </a>

  </li>

  <!-- Nav Item - Utilities Collapse Menu -->

  <li <?= $this->uri->segment(1) == 'report' ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link collapsed" href="<?= base_url('report'); ?>">

      <i class="fas fa-settings fa-cog"></i>

      <span>Reports</span>

    </a>

  </li>

  <!-- Nav Item - Utilities Collapse Menu -->

  <li <?= $this->uri->segment(1) == 'document_management' ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link collapsed" href="<?= base_url('doc_management'); ?>">

      <i class="fas fa-list fa-cog"></i>

      <span>Document Management</span>

    </a>

  </li>




  <!-- Nav Item - Utilities Collapse Menu -->

  <li <?= $this->uri->segment(1) == 'admin' ? 'class="nav-item active"' : 'class="nav-item"'; ?>>

    <a class="nav-link collapsed" href="<?= base_url('admin'); ?>">

      <i class="fas fa-users fa-cog"></i>

      <span>Admins</span>

    </a>



  </li>



  <!-- Divider -->

  <hr class="sidebar-divider my-0">



  <!-- Logout -->

  <li class="nav-item">

    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">

      <i class="fas  fa-power-off "></i>

      <span>Logout</span>

    </a>



  </li>



  <!-- Divider -->

  <hr class="sidebar-divider">



  <!-- Nav Item - Pages Collapse Menu -->





  <!-- Nav Item - Charts -->



</ul>

<!-- End of Sidebar -->





<script>
  // Add active class to the current button (highlight it)

  var header1 = document.getElementById("collapseTwo");

  var header2 = document.getElementById("collapsePar");

  var header3 = document.getElementById("collapseAdmin");

  var header4 = document.getElementById("collapseOther");



  var btns1 = header1.getElementsByClassName("collapse-item");

  for (var i = 0; i < btns1.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("active");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" active", "");

      }

      this.className += " active";

    });

  }



  var btns2 = header2.getElementsByClassName("collapse-item");

  for (var i = 0; i < btns2.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("active");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" active", "");

      }

      this.className += " active";

    });

  }



  var btns3 = header3.getElementsByClassName("collapse-item");

  for (var i = 0; i < btns3.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("active");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" active", "");

      }

      this.className += " active";

    });

  }



  var btns4 = header4.getElementsByClassName("collapse-item");

  for (var i = 0; i < btns4.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("active");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" active", "");

      }

      this.className += " active";

    });

  }
</script>



<script>
  var header5 = document.getElementById("collapseTwo");

  var header6 = document.getElementById("collapsePar");

  var header7 = document.getElementById("collapseAdmin");

  var header8 = document.getElementById("collapseOther");



  var btnc1 = header5.getElementsByClassName("collapse");

  for (var i = 0; i < btnc1.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("show");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" show", "");

      }

      this.className += " show";

    });

  }



  var btnc2 = header6.getElementsByClassName("collapse");

  for (var i = 0; i < btnc2.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("show");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" show", "");

      }

      this.className += " show";

    });

  }



  var btnc3 = header7.getElementsByClassName("collapse");

  for (var i = 0; i < btnc3.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("show");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" show", "");

      }

      this.className += " show";

    });

  }



  var btnc4 = header8.getElementsByClassName("collapse");

  for (var i = 0; i < btnc4.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("show");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" show", "");

      }

      this.className += " show";

    });

  }
</script>



<script>
  var header9 = document.getElementById("accordionSidebar");

  var btnav = header9.getElementsByClassName("nav-item");

  for (var i = 0; i < btnav.length; i++) {

    btns[i].addEventListener("click", function() {

      var current = document.getElementsByClassName("active");

      if (current.length > 0) {

        current[0].className = current[0].className.replace(" active", "");

      }

      this.className += " active";

    });

  }
</script>