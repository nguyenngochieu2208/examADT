<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    @include('assets.css')

    <script>
        let route_list = '{{ route('list') }}';
        let route_detail = '{{ route('detail') }}';
        let default_img = '{{ asset('images/user.jpg') }}';
    </script>
</head>
<body>
        <div class="d-flex justify-content-center align-items-center mt-4">
            <div class="card" style="min-width: 500px; border-radius: 20px;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3>Employees</h3>
                        </div>
                        <div class="col-12 col-md-6 text-end">
                            <a role="button" id="reload" class="btn btn-primary">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                            <a role="button" id="detail" class="btn btn-success">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body" >
                    <div id="list-employees">
                        @forelse ($employees as $item)
                            <div class="name-box p-1 my-2 d-flex flex-row" data-id="{{ $item['ID'] }}" style="cursor: pointer; border-radius: 20px; background-color: #f6f6f3; ">
                                <div >
                                    <img src="{{ asset('images/user.jpg') }}" class="img-thumbnail rounded-circle" width="50px" alt="">
                                </div>
                                <div class="d-flex align-items-center ms-3">
                                    <div class="name bold">
                                        {{ $item['NAME'] }} {{ $item['LAST_NAME'] }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-warning h6 text-center">
                                No data found.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
@include('assets.script')
</body>
</html>
