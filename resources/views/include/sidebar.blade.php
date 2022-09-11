 <aside id="sidebar" class="sidebar" dir="ltr">

     <ul class="sidebar-nav" id="sidebar-nav">

         <!-- Dashboard -->
         <li class="nav-item">
             <a class="nav-link " href="{{ route('main') }}">
                 <i class="bi bi-grid"></i>
                 <span class="myfont">الرئيسية</span class="myfont">
             </a>
         </li>
         <!-- End Dashboard Nav -->

         {{-- Reservations --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" data-bs-target="#reservation-nav" data-bs-toggle="collapse" href="{{ route('index.patients') }}">
                 <i class="bi bi-calendar "></i><span>المواعيد</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="reservation-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('add.reservation.page') }}">
                         <i class="bi bi-circle"></i><span>إضافة موعد</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('index.reservation') }}">
                         <i class="bi bi-circle"></i><span>جدول المواعيد</span>
                     </a>
                 </li>
             </ul>
         </li>
         {{-- end Reservation --}}


         {{-- Patients --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" data-bs-target="#patient-nav" data-bs-toggle="collapse" href="{{ route('index.patients') }}">
                 <i class="bi bi-universal-access"></i><span>المرضى</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="patient-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('add.patient.page') }}">
                         <i class="bi bi-circle"></i><span>إضافة مريض</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('index.patients') }}">
                         <i class="bi bi-circle"></i><span>سجل المرضى</span>
                     </a>
                 </li>
             </ul>
         </li>
         {{-- End Patients --}}

         {{-- Visits --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" data-bs-target="#visits-nav" data-bs-toggle="collapse" href="{{ route('index.patients') }}">
                 <i class="bi bi-check-circle"></i><span>الزيارات</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="visits-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('index.visit') }}">
                         <i class="bi bi-circle"></i><span>سجل الزيارات</span>
                     </a>
                 </li>
             </ul>
         </li>
         {{-- end Visits --}}


         {{-- expenses --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" data-bs-target="#expenses-nav" data-bs-toggle="collapse" href="{{ route('index.patients') }}">
                 <i class="bi bi-cart-plus"></i><span>مصاريف العيادة</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="expenses-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('index.expenses') }}">
                         <i class="bi bi-circle"></i><span>سجل مصاريف العيادة</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('add.expense.page') }}">
                         <i class="bi bi-circle"></i><span>إضافة مصروف</span>
                     </a>
                 </li>
             </ul>
         </li>
         {{-- end expenses --}}

         {{-- incomes --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" data-bs-target="#incomes-nav" data-bs-toggle="collapse" href="{{ route('index.patients') }}">
                 <i class="bi bi-cash"></i><span>دخل العيادة</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="incomes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('index.incomes') }}">
                         <i class="bi bi-circle"></i><span>سجل دخل العيادة</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('add.income.page') }}">
                         <i class="bi bi-circle"></i><span>إضافة دخل جديد
                         </span>
                     </a>
                 </li>
             </ul>
         </li>
         {{-- end of incomes --}}





          {{-- given --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" data-bs-target="#given-nav" data-bs-toggle="collapse" href="">
                 <i class="bi bi-dash-circle"></i><span>سندات الدفع</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="given-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('index.givens') }}">
                         <i class="bi bi-circle"></i><span>سجل سندات الدفع</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('add.given.page') }}">
                         <i class="bi bi-circle"></i><span>إضافة سند دفع</span>
                     </a>
                 </li>
             </ul>
         </li>
         {{-- end given --}}

         {{-- taken --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" data-bs-target="#taken-nav" data-bs-toggle="collapse" href="">
                 <i class="bi bi-cash-coin"></i><span>سندات القبض</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="taken-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('index.takens') }}">
                         <i class="bi bi-circle"></i><span>سجل سندات قبض العيادة</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('add.taken.page') }}">
                         <i class="bi bi-circle"></i><span>إضافة سند قبض جديد
                         </span>
                     </a>
                 </li>
             </ul>
         </li>
         {{-- end of taken --}}




         {{-- wallet --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" href="{{ route('index.balance') }}">
                 <i class="bi bi-safe"></i>
                 <span>الصندوق</span>
             </a>
         </li>
         {{-- end wallet --}}


         {{-- Earnings --}}
         <li class="nav-item myfont">
             <a class="nav-link collapsed" href="{{ route('earnings') }}">
                 <i class="bi bi-currency-dollar"></i>
                 <span>الأرباح</span>
             </a>
         </li>
         {{-- end Earnings --}}



 </aside>
 <!-- End Sidebar-->
