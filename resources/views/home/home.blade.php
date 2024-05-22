<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCMB Kur</title>

    <style>
        .table>:not(caption)>*>* {

            background-color: transparent !important;
        }
    </style>
</head>

<body >

    <div class="container h-10">

         <div class="row h-100 justify-content-center align-items-center">
 <div class="col-12 text-center pb-4">
            <img class="img-fluid"  src="{{ asset('assets/img/TCMB_logo.png') }}" alt="logo" style="height: 80px;">
        </div>
            <div class="col-sm-4 col-xl-4 pb-2">
                <div class="card">
                    <p class="card-title widget-card-title mb-2">{{ date('d.m.Y', strtotime('-1 year')) }} (Geçen Yıl Bugün)</p>
                    @foreach ($convertedJson as $data)
                        <div class="d-flex align-items-center mb-2">
                            <div>
                                <h6 class="mb-2">{{ $data['name'] }}</h6>
                                <p class="m-0 text-success">{{ 'Alış' . ' : ' . round($data['buying'], 2) }} ₺</p>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-4 col-xl-4 pb-2">
                <div class="card">
                    <p class="card-title widget-card-title mb-2">{{ date('d.m.Y', strtotime('-1 year')) }} (Geçen Yıl Bugün)</p>
                    @foreach ($convertedJson as $data)
                        <div class="d-flex align-items-center mb-2">
                            <div>
                                <h6 class="mb-2">{{ $data['name'] }}</h6>

                                <p class="m-0 text-danger">{{ 'Satış' . ' : ' . round($data['selling'], 2) }} ₺</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-8 pt-2">
                <div class="card widget-card border-light shadow-sm">
                    <div class="card-body p-4">
                        <p class="card-title widget-card-title mb-4">{{ date('d.m.Y', strtotime('-1 day')) }}(Dün)</p>
                        <div class="table-responsive">
                            <table class="table bsb-table-xl text-nowrap align-middle m-0 bg-transparent">
                                <thead>
                                    <tr>
                                        <th>Para Birimi</th>
                                        <th>Alış</th>
                                        <th>Satış</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($convertedXml as $data)
                                        <tr>
                                            <td>
                                                <div>
                                                    <h6 class="m-0">{{ $data['name'] }}</h6>
                                                </div>
                                            </td>
                                            <td class="text-success">
                                                {{ round($data['buying'], 2) }} ₺
                                            </td>
                                            <td class="text-danger">
                                                {{ round($data['selling'], 2) }} ₺
                                            </td>
                                            <td>
                                                <img src="{{ 'assets/img/flags/' . $data['flag'] }}" alt="flag"
                                                    width="25" height="25">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    var data = @json($convertedXml);
    document.addEventListener('DOMContentLoaded', function() {
        console.log(data);
        if (data == null) {
            Swal.fire({
                title: 'Hata!',
                text: 'Daha sonra tekrar deneyin.',
                icon: 'error',
                confirmButtonText: 'Kapat'
            });
        }
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>
