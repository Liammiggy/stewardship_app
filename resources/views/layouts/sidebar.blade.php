{{-- -------------  STYLES ------------- --}}
<style>
    /* === Sidebar container === */
    #accordionSidebar {
        width: 250px;                /* expanded width */
        min-height: 100vh;
        background-color: #1E1E2D;
        transition: width .3s ease;
        overflow-x: hidden;
    }

    /* Collapse state: shrink width, hide EVERYTHING except .toggle-container */
    #accordionSidebar.collapsed {
        width: 60px;                 /* thin strip for toggle bar */
    }
    #accordionSidebar.collapsed > *:not(.toggle-container) {
        display: none !important;
    }

    /* === Toggle bar (always visible) === */
    .toggle-container {
        width: 100%;
        padding: 0;
    }
    #sidebarToggle {
        width: 100%;
        height: 40px;
        background-color: #7C8DB5;
        border: none;
        color: #fff;
        font-size: 1.25rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0;            /* square edges */
    }
    #sidebarToggle:focus { outline: none; }

    /* === Optional link styling (desktop) === */
    @media (min-width: 768px) {
        .sidebar .nav-item .nav-link {
            display: block;
            width: 100%;
            text-align: left;
            padding: 5px;
            font-size: 13.6px;
        }
   
    .sidebar.toggled {
        overflow: visible;
        width: 2.5rem !important;
   
}
    }
</style>

{{-- -------------  SIDEBAR ------------- --}}
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Toggle bar (always stays) --}}
    <div class="toggle-container text-center">
        <button id="sidebarToggle" aria-label="Toggle sidebar">
           
        </button>
    </div>

    {{-- Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('dashboard') }}" style="background-color:#14141E;height:56px;">
        <div class="sidebar-brand-text mx-3 text-white">Stewardship</div>
    </a>

    {{-- Dashboard --}}
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="my-4 border-top border-secondary w-100">

    {{-- Membership section --}}
    <ul class="nav flex-column px-0" style="width:100%;">
        <li class="nav-item mb-2">
            <a class="nav-link fw-bold text-white" href="{{ route('dataMahasiswa') }}">
                <i class="fas fa-fw fa-users me-2"></i> Membership
            </a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataMahasiswa') }}">
                Member
            </a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataMahasiswa.addpayment') }}">
                Payment
            </a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataMahasiswa.bulkupload') }}">
                Bulk Upload
            </a>
        </li>
    </ul>

    <hr class="my-4 border-top border-secondary w-100">
</ul>

{{-- -------------  SCRIPTS ------------- --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar  = document.getElementById('accordionSidebar');
        const toggle   = document.getElementById('sidebarToggle');
        const icon     = toggle.querySelector('i');

        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            icon.classList.toggle('fa-angle-left');
            icon.classList.toggle('fa-angle-right');
        });
    });
</script>
