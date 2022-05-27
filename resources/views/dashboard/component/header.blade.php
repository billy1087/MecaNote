<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <a class="navbar-brand" href="#">MecaNote</a>

    <div class="dropleft my-2 my-lg-0 ml-auto ">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-person-fill"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/profil/{{ auth()->user()->id }}/edit">Profil</a>

            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-link p-2">
                    Log Out
                </button>
            </form>
        </div>
    </div>
    </div>
</nav>
