@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📑 Liste des Contrats</h5>
                    <a href="{{ route('admin.contracts') }}" class="btn btn-light btn-sm rounded-pill">
                        ➕ Nouveau Contrat
                    </a>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Client</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Véhicule</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Période</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Prix</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Statut</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contracts as $contract)
                                    <tr>
                                        <!-- Client -->
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-dark">{{ $contract->client->name ?? 'N/A' }}</span>
                                                <small class="text-muted">{{ $contract->client->email ?? '' }}</small>
                                            </div>
                                        </td>

                                        <!-- Véhicule -->
                                        <td>
                                            <span class="fw-semibold">{{ $contract->vehicle->marque ?? '' }} {{ $contract->vehicle->model ?? '' }}</span>
                                        </td>

                                        <!-- Période -->
                                        <td>
                                            <span class="badge bg-gradient-info">
                                                {{ $contract->start_date }} → {{ $contract->end_date }}
                                            </span>
                                        </td>

                                        <!-- Prix -->
                                        <td>
                                            <span class="fw-bold text-success">{{ number_format($contract->price, 2) }} DH</span>
                                        </td>

                                        <!-- Statut -->
                                        <td>
                                            @if ($contract->status === 'active')
                                                <span class="badge bg-success">✅ Actif</span>
                                            @elseif ($contract->status === 'pending')
                                                <span class="badge bg-warning">⏳ En attente</span>
                                            @else
                                                <span class="badge bg-secondary">✔️ Terminé</span>
                                            @endif
                                        </td>

                                        <!-- Actions -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info rounded-pill">👁 Voir</a>
                                            <a href="#" class="btn btn-sm btn-warning rounded-pill">✏️ Modifier</a>
                                            <a href="#" class="btn btn-sm btn-danger rounded-pill">🗑 Supprimer</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted py-4">Aucun contrat trouvé.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
