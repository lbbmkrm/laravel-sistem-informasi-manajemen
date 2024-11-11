<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('profile') }}">Profile</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title col-6">Account List</h5>
                <div class="col-6">
                  <a href="{{ route('profile.create') }}">
                    <button wire:click='create' class="btn btn-primary btn-sm float-end mt-3 me-3">
                    <i class="bi bi-person-plus"></i> 
                    Create
                  </button>
                  </a>
                </div>
              </div>
              <table class="table ">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Email</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    @if ($user->is_admin)
                        <td>Admin</td>
                    @else
                        <td>Member</td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->