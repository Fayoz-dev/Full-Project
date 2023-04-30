<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="index.html"> <img alt="image" src="/admin/assets/img/logo.png" class="header-logo" /> <span
           class="logo-name">Otika</span>
       </a>
     </div>
     <ul class="sidebar-menu">
       <li class="menu-header">Main</li>
         @role('admin')
       <li class="dropdown">
           <a href="#" class="menu-toggle nav-link has-dropdown">
               <i data-feather="users"></i>
           </a>
           <ul class="dropdown-menu">
               <li ><a class="nav-link" href="/admin/users">Users</a></li>
               <li ><a class="nav-link" href="/admin/roles">Roles</a></li>
               <li ><a class="nav-link" href="/admin/permissions">Permissions</a></li>
           </ul>
       </li>
         @endrole
         <a href="{{route('admin.dashboard')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
       </li>

         <li class="dropdown">
         <a href="{{route('admin.categories.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Categories</span></a>
       </li>

          <li class="dropdown">
         <a href="{{route('admin.posts.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Posts</span></a>
       </li>

       <li class="dropdown">
        <a href="{{route('admin.tags.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Tags</span></a>
      </li>

      <li class="dropdown">
        <a href="{{route('admin.ads.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Ads</span></a>
      </li>
       {{-- <li class="dropdown">
         <a href="#" class="menu-toggle nav-link has-dropdown"><i
             data-feather="briefcase"></i><span>Widgets</span></a>

       </li> --}}

     </ul>
   </aside>
 </div>


