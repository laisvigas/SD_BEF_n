<div class="mb-3">
    <label class="form-label">Nome *</label>
    <input type="text" name="name" class="form-control" required
           value="{{ old('name', $book->name ?? '') }}">
    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Valor estimado (€) *</label>
    <input type="number" step="0.01" min="0" name="estimated_price" class="form-control" required
           value="{{ old('estimated_price', $book->estimated_price ?? '') }}">
    @error('estimated_price') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Valor pago (€)</label>
    <input type="number" step="0.01" min="0" name="paid_price" class="form-control"
           value="{{ old('paid_price', $book->paid_price ?? '') }}">
    @error('paid_price') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">User destinatário *</label>
    <select name="user_id" class="form-select" required>
        <option value="">— selecione —</option>
        @foreach($users as $u)
            <option value="{{ $u->id }}" @selected(old('user_id', $book->user_id ?? '') == $u->id)>
                {{ $u->name }} ({{ $u->email }})
            </option>
        @endforeach
    </select>
    @error('user_id') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
