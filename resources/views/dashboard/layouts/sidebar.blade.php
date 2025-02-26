   <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
     <div class="position-sticky pt-3">
       <ul class="nav flex-column">
         <li class="nav-item">
           <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
             <span data-feather="home"></span>
             Dashboard
           </a>
         </li>
         @can('admin')
           <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/posts">
               <span data-feather="file"></span>
               My Posts
             </a>
           </li>
         </ul>
       @endcan
       @can('admin')
         <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
           <span>Administrator</span>
         </h5>
         <ul class="nav flex-column">
           <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
               <span data-feather="grid"></span>
               Post Categories
             </a>
           </li>
           <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/analytics') ? 'active' : '' }}" href="/dashboard/analytics">
               <span data-feather="grid"></span>
               Analisis View
             </a>
           </li>
           <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }}" href="/dashboard/users">
               <span data-feather="grid"></span>
               Daftar User
             </a>
           </li>
         </ul>
       @endcan
     </div>
   </nav>
