<div class="bg-dark text-white p-3 vh-100" style="width: 250px;">

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link text-white">

                Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a
            href="{{ route('company.index') }}"
               class="nav-link text-white">

                Companies
            </a>
        </li>

        <li class="nav-item mb-2">
            <a
            href="{{ route('user.index') }}"
               class="nav-link text-white">

                Users
            </a>
        </li>

        <li class="nav-item mb-2">
            <a
             {{-- href="{{ route('roles.index') }}" --}}
               class="nav-link text-white">

                Roles
            </a>
        </li>

        <li class="nav-item">
            <a
             {{-- href="{{ route('logout') }}" --}}
               class="nav-link text-danger">

                Logout
            </a>
        </li>

    </ul>

</div>
