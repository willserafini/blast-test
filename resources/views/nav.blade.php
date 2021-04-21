<div class="card text-center my-5">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs py-3">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/about">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/customers">Customers List</a>
        </li>
        @guest
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
        @endguest
        
        </ul>
    </div>
</div>