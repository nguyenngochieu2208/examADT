<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script type="text/javascript">

    let employee_id = null;

    function formatDate(dateString) {
        return moment(dateString).format('DD/MM/YYYY');
    }

    // sự kiện đưa con trỏ chuột lên tên nhân viên
    $(document).on('mouseenter', '.name-box', function() {
        $(this).css('transform', 'scale(1.05)');
    });

    $(document).on('mouseleave', '.name-box', function() {
        $(this).css('transform', 'scale(1)');
    });

    // sự kiện click vào tên nhân viên
    $(document).on('click', '.name-box', function() {
        $('.name-box').css('background-color', '#f6f6f3');
        $(this).css('background-color', '#bfefff');


        if(employee_id == $(this).data('id')) {
            $('.name-box').css('background-color', '#f6f6f3');
            employee_id = null;
        }else{
            employee_id = $(this).data('id');
        }

    });

    // sự kiện click vào nút làm mới danh sách nhân viên
    $(document).on('click', '#reload', function() {

        $.ajax({
            method: 'POST',
            url: route_list,
            success: function (response){
                employee_id = null;
                $('#list-employees').html(response);
            },
            error: function (response) {
                employee_id = null;
                alert('Lỗi lấy danh sách');
            }
        });

    });

    // sự kiện click vào nút xem chi tiết nhân viên đang có hightlight
    $(document).on('click', '#detail', function() {
        if (employee_id == null) {
            alert('Vui lòng chọn nhân viên');
        }else{
            $.ajax({
                method: 'POST',
                url: route_detail,
                data: {
                    id: employee_id,
                },
                success: function (response){
                    console.log(response.data[0]);

                    let employeeActive = (response.data[0].ACTIVE) ? '<p class="mb-2"><span class="bg-success px-1 rounded bold">Active</span></p>' : '<p class="mb-2"><span class="bg-danger px-1 rounded bold">Inactive</span></p>';
                    let employeeOnline = (response.data[0].IS_ONLINE == "Y") ? '<p class="mb-2"><span class="bg-success px-1 rounded bold">Online</span></p>' : '<p class="mb-2"><span class="bg-danger px-1 rounded bold">Offline</span></p>';

                    let employeeId = response.data[0].ID;
                    let employeeName = response.data[0].NAME + ' ' + response.data[0].LAST_NAME;
                    let employeeEmail = response.data[0].EMAIL;
                    let employeeBirthday = (response.data[0].PERSONAL_BIRTHDAY != "") ? formatDate(response.data[0].PERSONAL_BIRTHDAY) : '---';
                    let workPosition = response.data[0].WORK_POSITION;

                    let lastLogin = (response.data[0].LAST_LOGIN != "") ? formatDate(response.data[0].LAST_LOGIN) : '---';
                    let dateRegister = (response.data[0].DATE_REGISTER != "") ? formatDate(response.data[0].DATE_REGISTER) : '---';

                    let modalHtml = `
                        <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="employeeModalLabel">Employee Details : <strong> #${employeeId} </strong> </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 col-md-6 text-center">
                                                <img class="img-thumbnail rounded" width="100px" src="{{ asset('images/user.jpg') }}">
                                            </div>
                                            <div class="col-12 col-md-6 text-start">
                                                <p class="h5 mb-2"> ${employeeName} </p>
                                                ${employeeActive}
                                                ${employeeOnline}
                                            </div>
                                        </div>

                                        <hr class="my-2">

                                        <h5 class="mb-4">More Information</h5>

                                        <p><strong>Email:</strong> ${employeeEmail}</p>
                                        <p><strong>Birthday:</strong> ${employeeBirthday}</p>
                                        <p><strong>Work Position:</strong> ${workPosition}</p>
                                        <p><strong>Date Register:</strong> ${dateRegister}</p>
                                        <p><strong>Last Login:</strong> ${lastLogin}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btn-dismiss-modal" class="btn btn-secondary" data-dismiss="employeeModal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    $('body').append(modalHtml);

                    $('#employeeModal').modal('show');

                    $('#btn-dismiss-modal').on('click', function() {
                        $('#employeeModal').modal('hide');
                    });

                    $('#employeeModal').on('hidden.bs.modal', function () {
                        $(this).remove();
                    });
                },
                error: function (response) {
                    alert('Lỗi lấy chi tiết nhân viên');
                }
            });
        }
    });


</script>


