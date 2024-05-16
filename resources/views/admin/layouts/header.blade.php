       <!-- HEADER DESKTOP-->
       <header class="header-desktop">
           <div class="section__content section__content--p30">
            <div class="container-fluid">
                   <div class="header-wrap justify-content-end">
                       <div class="header-button">
                           <div class="account-wrap">
                               <div class="account-item clearfix js-item-menu">

                                   <div class="content">
                                       <a class="js-acc-btn" href="#"> @isset($user)
                                               {{ $user['username'] }}
                                           @endisset
                                       </a>
                                   </div>
                                   <div class="account-dropdown js-dropdown">

                                       <div class="account-dropdown__footer">
                                           <a href="{{ route('admin-logout') }}">
                                               <i class="zmdi zmdi-power"></i>Logout</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </header>
       <!-- HEADER DESKTOP-->
