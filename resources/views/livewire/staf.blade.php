<div>
    @section('title','Staf')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
              Tambah Staf
            </div>
            <div class="card-body">
                <form wire:submit.prevent="SimpanData">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input wire:model="nama" class="form-control" id="nama">
                      @error('nama') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input wire:model="email" class="form-control" id="email">
                      @error('email') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                    <div class="mb-3">
                      <label for="telp" class="form-label">Telpon</label>
                      <input wire:model="telp" class="form-control" id="telp">
                      @error('telp') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <br>
                    {{ $sukses }}
                  </form>
            </div>
          </div>
    </div>
</div>
