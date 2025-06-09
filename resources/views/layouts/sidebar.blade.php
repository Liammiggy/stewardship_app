<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1E1E2D;">
   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}" style="background-color: #14141E;">
      <div class="sidebar-brand-text mx-3 text-white">Stewardship</div>
   </a>
   <!-- Divider -->
   <!-- <hr class="sidebar-divider my-0" style="border-color: #7C8DB5;"> -->
   <!-- Nav Item - Dashboard -->
   <li class="nav-item" style="background-color: #1E1E2D;">
      <a class="nav-link text-white" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-solid fa-house-user"></i>
      <span>Dashboard</span>
      </a>
   </li>
   <hr class="my-4 border-top border-secondary w-100">
   <li class="nav-item" style="background-color: #1E1E2D;">
      <a class="nav-link text-white" href="{{ route('dataMahasiswa') }}">
         <i class="fas fa-fw fa-address-book"></i> <!-- Member List -->
         <span>Member List</span>
      </a>
   </li>
   <li class="nav-item" style="background-color: #1E1E2D;">
      <a class="nav-link text-white" href="{{ route('dataMahasiswa.create') }}">
         <i class="fas fa-fw fa-user-plus"></i> <!-- Add Member -->
         <span>Add Member</span>
      </a>
   </li>
   <li class="nav-item" style="background-color: #1E1E2D;">
      <a class="nav-link text-white" href="{{ route('dataMahasiswa.bulkupload') }}">
      <i class="fas fa-fw fa-file-upload"></i>
      <span>Bulk Upload</span>
      </a>
   </li>



    <li class="nav-item" style="background-color: #1E1E2D;">
      <a class="nav-link text-white" href="{{ route('dataMahasiswa.addpayment') }}">
      <i class="fas fa-fw fa-file-upload"></i>
      <span>Payment</span>
      </a>
   </li>
   <hr class="my-4 border-top border-secondary w-100">
   <!-- Divider -->
   <!-- <hr class="sidebar-divider d-none d-md-block" style="border-color: #7C8DB5;"> -->
   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button  style=" background-color: #7C8DB5;"class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>
</ul>
<script src="//unpkg.com/alpinejs" defer></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />