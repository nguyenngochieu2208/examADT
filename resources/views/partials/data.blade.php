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
