<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations de Pêche Maritime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .destination-card {
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            border-radius: 8px;
            overflow: hidden;
        }
        .destination-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/fishing-background.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="hero-section text-center">
        <div class="container">
            <h1>Destinations de Pêche Maritime</h1>
            <p class="lead">Découvrez nos plus belles destinations de pêche en mer</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-4">
            @forelse($destinations as $destination)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card destination-card h-100 shadow-sm">
                        <div class="position-relative">
                            @if($destination->image)
                                <img src="{{ asset('storage/' . $destination->image) }}" class="card-img-top" alt="{{ $destination->nom }}">
                            @else
                                <img src="{{ asset('images/default-destination.jpg') }}" class="card-img-top" alt="{{ $destination->nom }}">
                            @endif
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-primary rounded-pill">{{ $destination->ville }}</span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $destination->nom }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($destination->description, 100) }}</p>
                            <p class="card-text text-muted small">
                                <i class="fas fa-map-marker-alt me-1"></i>{{ $destination->adresse }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $destination->id }}">
                                <i class="fas fa-info-circle me-1"></i>Voir les détails
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Modal pour chaque destination -->
                <div class="modal fade" id="detailsModal{{ $destination->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $destination->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h5 class="modal-title" id="detailsModalLabel{{ $destination->id }}">{{ $destination->nom }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        @if($destination->image)
                                            <img src="{{ asset('storage/' . $destination->image) }}" class="img-fluid rounded shadow" alt="{{ $destination->nom }}">
                                        @else
                                            <img src="{{ asset('images/default-destination.jpg') }}" class="img-fluid rounded shadow" alt="{{ $destination->nom }}">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <span class="badge bg-primary mb-2">{{ $destination->ville }}</span>
                                            <h5>Informations</h5>
                                            <hr class="my-2">
                                            <p>
                                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                <strong>Adresse:</strong> {{ $destination->adresse }}
                                            </p>
                                        </div>
                                        <div class="mt-4">
                                            <h5>Description</h5>
                                            <hr class="my-2">
                                            <p>{{ $destination->description ?: 'Aucune description disponible.' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <a href="https://maps.google.com/?q={{ urlencode($destination->adresse) }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-map-marked-alt me-1"></i>Voir sur la carte
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Aucune destination n'est disponible pour le moment.
                    </div>
                    <p class="mt-3">Revenez bientôt pour découvrir nos nouvelles destinations!</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>