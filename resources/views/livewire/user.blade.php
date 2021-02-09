<div>
    @section('title','User')

    <div class="card">
        <div class="card-header">
          Data User
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addData">
            Tambah
          </button>
        </div>
        
        @if (session('pesan'))
            {{ session('pesan') }}
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php ($no=1)

                    @foreach ($users as $user)    
                    <tr>
                      <th>{{ $no++ }}</th>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->password }}</td>
                      <td>
                        {{-- wire:click.prevent="DetailData({{ $user->id }})" mengirim data berdasarkan id --}}
                        <button wire:click.prevent="DetailData({{ $user->id }})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editData">Edit</button>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
      <!-- Modal Add Data-->
      {{-- wire:ignore.self agar saat di submit ngeclose --}}
        <div wire:ignore.self class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" wire:model="name" class="form-control" id="name">
                    @error('name') <label class="text-danger">{{ $message }}</label> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" wire:model="email" class="form-control" id="email">
                    @error('email') <label class="text-danger">{{ $message }}</label> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input name="password" type="password" wire:model="password" class="form-control" id="password">
                    @error('password') <label class="text-danger">{{ $message }}</label> @enderror
                  </div>
                  
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="SimpanData()">Simpan</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Akhir Modal Add Data-->
        
        <!-- Modal Edit Data-->
        {{-- wire:ignore.self agar saat di submit ngeclose --}}
        <div wire:ignore.self class="modal fade" id="editData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  {{-- <input name="ids" wire:model="ids" class="form-control" id="ids"> --}}
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" wire:model="name" class="form-control" id="name">
                    @error('name') <label class="text-danger">{{ $message }}</label> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" wire:model="email" class="form-control" id="email">
                    @error('email') <label class="text-danger">{{ $message }}</label> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input name="password" type="password" wire:model="password" class="form-control" id="password">
                    @error('password') <label class="text-danger">{{ $message }}</label> @enderror
                  </div>
                  
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" wire:click.prevent="EditData()">Edit</button>
              </div>
            </div>
          </div>
        </div>
        {{-- Akhir Modal Edit Data --}}
        <script>
          window.livewire.on('addData',()=>{
            $('#addData').modal('hide');
          });
          window.livewire.on('editData',()=>{
            $('#editData').modal('hide');
          });

        </script>
</div>
