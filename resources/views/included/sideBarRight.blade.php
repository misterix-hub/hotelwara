<div>
    <div class="text-right">
        <small><b>RÉSUMÉ EN CHIFFRES</b></small>
    </div>
    <div class="list-group">
        <a href="{{ route('listeCLient') }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="badge badge-primary pl-3 pr-3" style="font-size: 16px; font-weight: 300; border-radius: 15px;">
                    {{ count(App\Client::all()) }}
                </h5>
                <small class="blue-text">Ouvrir</small>
            </div>
            <p class="mb-1">Clients</p>
            <small>Liste des clients</small>
        </a>
        <a href="{{ route('listeChambre') }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="badge badge-warning pl-3 pr-3" style="font-size: 16px; font-weight: 300; border-radius: 15px;">
                    {{ count(App\Chambre::all()) }}
                </h5>
                <small class="blue-text">Ouvrir</small>
            </div>
            <p class="mb-1">Chambres</p>
            <small>Liste des chambres</small>
        </a>
        <a href="{{ route('listeReservation') }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="badge badge-success pl-3 pr-3" style="font-size: 16px; font-weight: 300; border-radius: 15px;">
                    {{ count(App\Reservation::all()) }}
                </h5>
                <small class="blue-text">Ouvrir</small>
            </div>
            <p class="mb-1">Réservation</p>
            <small>Liste des réservations</small>
        </a>
        <a href="{{ route('listeUtilisateur') }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="badge badge-danger pl-3 pr-3" style="font-size: 16px; font-weight: 300; border-radius: 15px;">
                    {{ count(App\User::all()) }}
                </h5>
                <small class="blue-text">Ouvrir</small>
            </div>
            <p class="mb-1">Utilisateurs</p>
            <small>Liste des utilisateurs</small>
        </a>
        <a href="{{ route('listePersonnel') }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="badge badge-default pl-3 pr-3" style="font-size: 16px; font-weight: 300; border-radius: 15px;">
                    {{ count(App\Personnel::all()) }}
                </h5>
                <small class="blue-text">Ouvrir</small>
            </div>
            <p class="mb-1">Personnel</p>
            <small>Liste du personnel</small>
        </a>
    </div>
</div><br />