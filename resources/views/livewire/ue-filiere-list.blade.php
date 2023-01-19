<div>
    @if (session('success'))
        <script>
            setTimeout(() => {
                showSwal('mixin', "{{ session('success') }}")
            }, 200)
        </script>
    @endif
    <div class="table-responsive my-3" style="max-height: 700px; overflow: auto">
        <div class="d-flex justify-content-end">
            <button type="button" wire:click="submit" class="btn btn-info me-2 mb-2 mb-md-0">Ajouter</button>
        </div>
        <table class="table table-striped">
            <thead class="fixed">
            <tr>
                <th>Libelle</th>
                <th>Description</th>
                <th class="col-1"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input placeholder="Nouveau libelle" class="form-control @error('libelle') is-invalid @enderror" type="text" wire:model="libelle">
                    @error('libelle') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </td>
                <td>
                    <input placeholder="Nouvelle description" class="form-control @error('description') is-invalid @enderror" type="text" wire:model="description">
                    @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </td>
                <td></td>
            </tr>
            @foreach($filiere->ues as $ue)
                <tr>
                    <td>{{ $ue->libelle }}</td>
                    <td>{{ Str::limit($ue->description, 40) }}</td>
                    <td>
                        <a href="{{ route('ues.index') }}" class="btn btn-sm btn-info">Voir</a>
                        <a href="{{ route('ues.edit', $ue->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                        <button type="button" wire:click="delete({{ $ue->id }})" class="btn btn-sm btn-danger">Supprimer</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
