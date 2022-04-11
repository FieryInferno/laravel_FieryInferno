<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>{{ $title }}</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link {{ $active == 'rumahSakit' ? 'active' : ''}}" href="/rumah_sakit">Rumah Sakit</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ $active == 'pasien' ? 'active' : ''}}" href="/pasien">Pasien</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        @yield('content')
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
      const deleteData = (type, id) => {
        $.ajax({
          method: 'DELETE',
          url: `${type}/hapus/${id}`,
          data: { _token: '{{ csrf_token() }}' },
          success: function (data) {
            alert('Data berhasil dihapus');
            let container = ``;
            let no = 1;

            data.data.forEach(element => {
              container += `
                <tr>
                  <th scope="row">${no++}</th>
                  <td>${element.nama}</td>
                  <td>${element.alamat}</td>
                  <td>${element.email}</td>
                  <td>${element.telepon}</td>
                  <td>
                    <a class="btn btn-primary" href="/rumah_sakit/edit/${element.id}">Edit</a>
                    <button class="btn btn-danger" onclick="deleteData('rumah_sakit', '${element.id}')">Hapus</button>
                  </td>
                </tr>`;
            });

            $('#container').html(container);
          }
        })
      }
    </script>
  </body>
</html>
