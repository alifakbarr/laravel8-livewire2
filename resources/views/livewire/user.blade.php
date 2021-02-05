<div>
    @section('title','User')

    <div class="card">
        <div class="card-header">
          Data User
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
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
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
</div>
