{{-- ------------- STYLES ------------- --}}
<style>
    #accordionSidebar {
        width: 250px;
        min-height: 100vh;
        background-color: #1E1E2D;
        transition: width .3s ease;
        overflow-x: hidden;
    }

    #accordionSidebar.collapsed {
        width: 60px;
    }

    #accordionSidebar.collapsed > *:not(.sidebar-brand) {
        display: none !important;
    }

    #accordionSidebar .sidebar-brand {
        height: 56px;
          /* background-color:red; */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 10px;
    }

    .sidebar-dark #sidebarToggle {
    background-color: #1E1E2D;
    margin-bottom: 0rem;
}

 .sidebar.toggled {
        overflow: visible;
        width: 3rem !important;

}
    #sidebarToggle {
        background-color:red;
        border: none;
        color: #fff;
        font-size: 1.25rem;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        cursor: pointer;
    }

    #sidebarToggle:focus {
        outline: none;
    }

    @media (min-width: 768px) {
        .sidebar .nav-item .nav-link {
            display: block;
            width: 100%;
            text-align: left;
            padding: 5px;
            font-size: 13.6px;
        }
    }
</style>

{{-- ------------- SIDEBAR ------------- --}}
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Sidebar Brand with Toggle on Right --}}
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="text-white text-decoration-none d-flex align-items-center">
            <div class="sidebar-brand-text mx-2">Stewardship</div>
        </a>
        <button id="sidebarToggle" aria-label="Toggle sidebar">

        </button>
    </div>
 <hr class="my-4 border-top border-secondary w-100">
    {{-- Dashboard --}}
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Dashboard</span>
        </a>
    </li>


    {{-- Membership Section --}}
    <ul class="nav flex-column px-0" style="width:100%;">
        <li class="nav-item mb-2">
            <a class="nav-link fw-bold text-white" href="{{ route('dataMahasiswa') }}">
                <i class="fas fa-fw fa-users me-2"></i> Membership
            </a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataMahasiswa') }}">
                Members
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




    {{-- Pastor Section
    <ul class="nav flex-column px-0" style="width:100%;">
        <li class="nav-item mb-2">
            <a class="nav-link fw-bold text-white" href="{{ route('dataPastor.pastorlist') }}">
                <i class="fas fa-user-tie fa-fw me-2"></i> Pastors
            </a>
        </li>

        <!-- <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataPastor.pastorlist') }}">
                Pastors
            </a>
        </li> -->


    </ul>

--}}

       {{-- Church Section --}}
    <ul class="nav flex-column px-0" style="width:100%;">
        <li class="nav-item mb-2">
            <a class="nav-link fw-bold text-white" href="{{ route('dataRepresentative.representativelist') }}">
                <i class="fas fa-church fa-fw me-2"></i> Representative
            </a>
        </li>

        <!-- <li class="nav-item mb-2" style="margin-left:30px;">
            hlist') }}">
                Church List
            </a>
        </li> -->


    </ul>

       {{-- Org Section
    <ul class="nav flex-column px-0" style="width:100%;">
        <li class="nav-item mb-2">
            <a class="nav-link fw-bold text-white" href="{{ route('dataOrganization.organizationlist') }}">
                <i class="fas fa-sitemap fa-fw me-2"></i> Organizations
            </a>
        </li>

        <!-- <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataOrganization.organizationlist') }}">
                OrgList
            </a>
        </li> -->


    </ul>
--}}

       {{-- Claims Section --}}
    <ul class="nav flex-column px-0" style="width:100%;">
        <li class="nav-item mb-2">
            <a class="nav-link fw-bold text-white" href="{{ route('dataIncedentClaims.incidentlist') }}">
               <i class="fas fa-file-invoice-dollar fa-fw me-2"></i> Claims Request
            </a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataIncedentClaims.incidentlist') }}">
                Incident Request
            </a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataIncedentClaims.claimsreleasing') }}">
                Releasing
            </a>
        </li>

    </ul>

           {{-- Contribution Section --}}
    <ul class="nav flex-column px-0" style="width:100%;">
        <li class="nav-item mb-2">
            <a class="nav-link fw-bold text-white" href="{{ route('dataContribution.contributionlist') }}">
             <i class="fas fa-money-bill-wave fa-fw me-2"></i> Contribution
            </a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataContribution.contributionlist') }}">
                Contributions
            </a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataContribution.add_Incedent_contribution') }}">
                 Incident Contribution
            </a>
        </li>

    </ul>



           {{-- Reports Section --}}
    <ul class="nav flex-column px-0" style="width:100%;">
        <li class="nav-item mb-2">
            <a class="nav-link fw-bold text-white" href="">
             <i class="fas fa-file-alt fa-fw me-2"></i> Reports</a>
        </li>

        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="">
                Members List
            </a>
        </li>
        <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="">
               Pastor List
            </a>
        </li>
        <!-- <li class="nav-item mb-2" style="margin-left:30px;">
            <a class="nav-link text-secondary ps-3" href="{{ route('dataContribution.add_Incedent_contribution') }}">
                 Incident Contribution
            </a>
        </li> -->

    </ul>

</ul>

{{-- ------------- SCRIPTS ------------- --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('accordionSidebar');
        const toggleBtn = document.getElementById('sidebarToggle');
        const icon = toggleBtn.querySelector('i');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            icon.classList.toggle('fa-angle-left');
            icon.classList.toggle('fa-angle-right');
        });
    });
</script>
