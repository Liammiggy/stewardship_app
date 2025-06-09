<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1E1E2D;">
   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}" style="background-color: #14141E;">
      <div class="sidebar-brand-text mx-3 text-white">Stewardship</div>
   </a>
   <!-- Divider -->
   <!-- <hr class="sidebar-divider my-0" style="border-color: #7C8DB5;"> -->
   <!-- Nav Item - Dashboard -->
   <div class="text-center d-none d-md-inline px-0">
      <button id="sidebarToggle"     class="border-0"     style="      background-color: #7C8DB5;       width: 100%;       height: 40px;       color: white;       font-size: 18px; 
         cursor: pointer;      border-radius: 0; /* no rounded corners */      display: flex;      align-items: center;      justify-content: center;    "    aria-label="Toggle sidebar"    title="Toggle sidebar"  >
      <i></i>
      </button>
   </div>
   <li class="nav-item" style="background-color: #1E1E2D;">
      <a class="nav-link text-white" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-solid fa-house-user"></i>
      <span>Dashboard</span>
      </a>
   </li>
   <hr class="my-4 border-top border-secondary w-100">
   <ul class="nav flex-column" style="width: 220px; padding-left: 0;">
      <!-- Main Button -->
      <li class="nav-item mb-2">
         <a class="nav-link fw-bold text-white" href="{{ route('dataMahasiswa') }}" style="font-size: 0.9rem;">
         <i class="fas fa-fw fa-users me-2"></i> Membership
         </a>
      </li>
      <!-- Submenu Items, shifted right -->
      <li class="nav-item mb-1" style="margin-left: 10px;">
         <a class="nav-link text-secondary ps-3" href="{{ route('dataMahasiswa') }}" style="font-size: 0.9rem;">
         <i class="fas fa-fw fa-address-book me-2"></i> Member List
         </a>
      </li>
      <!-- <li class="nav-item mb-1" style="margin-left: 30px;">
         <a class="nav-link text-secondary ps-3" href="{{ route('dataMahasiswa.create') }}" style="font-size: 0.9rem;">
           <i class="fas fa-fw fa-user-plus me-2"></i> Add Member
         </a>
         </li> -->
 
      <li class="nav-item mb-1" style="margin-left: 10px;">
         <a class="nav-link text-secondary ps-3" href="{{ route('dataMahasiswa.addpayment') }}" style="font-size: 0.9rem;">
         <i class="fas fa-fw fa-file-upload me-2"></i> Payment
         </a>
      </li>
           <li class="nav-item mb-1" style="margin-left: 10px;">
         <a class="nav-link text-secondary ps-3" href="{{ route('dataMahasiswa.bulkupload') }}" style="font-size: 0.9rem;">
         <i class="fas fa-fw fa-file-upload me-2"></i> Bulk Upload
         </a>
      </li>
   </ul>
   <hr class="my-4 border-top border-secondary w-100">
   <!-- Divider -->
   <!-- <hr class="sidebar-divider d-none d-md-block" style="border-color: #7C8DB5;"> -->
   <!-- Sidebar Toggler (Sidebar) -->
</ul>
<script src="//unpkg.com/alpinejs" defer></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />