$(document).ready(function() {
    $('#myForm').validate({
        rules: {
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            passwordNew: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            confirmPassword: {
                required: true,
                minlength: 6,
                maxlength: 20
            }
        },
        messages: {
            username: {
                required: "Vui lòng không bỏ trống trường này"
            },
            email: {
                required: "Vui lòng không bỏ trống trường này",
                email: "Chưa đúng định dạng email"
            },
            password: {
                required: "Vui lòng không bỏ trống trường này",
                minlength: "Mật khẩu tối thiểu 6 ký tự",
                maxlength: "Mật khẩu tối đa 20 ký tự"
            },
            passwordNew: {
                required: "Vui lòng không bỏ trống trường này",
                minlength: "Mật khẩu tối thiểu 6 ký tự",
                maxlength: "Mật khẩu tối đa 20 ký tự"
            },
            confirmPassword: {
                required: "Vui lòng không bỏ trống trường này",
                minlength: "Mật khẩu tối thiểu 6 ký tự",
                maxlength: "Mật khẩu tối đa 20 ký tự"
            }
        }
    });
});
$(document).ready(function() {
    $('#formConfirm').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            code: {
                required: true,
                minlength: 6,
                maxlength: 6
            }
        },
        messages: {
            email: {
                required: "Vui lòng không bỏ trống trường này",
                email: "Chưa đúng định dạng email"
            },
            code: {
                required: "Vui lòng không bỏ trống trường này",
                minlength: "Mật khẩu tối thiểu 6 ký tự",
                maxlength: "Mật khẩu tối đa 6 ký tự"
            }
        }
    });
});

$(document).ready(function() {
    $('#formAdmin').validate({
        rules: {
            name: {
                required: true,
                minlength: 4,
                maxlength: 100
            }
        },
        messages: {
            name: {
                required: "Vui lòng không bỏ trống trường này",
                minlength: "Độ dài tối thiểu 4 ký tự",
                maxlength: "Độ dài tối đa 100 ký tự"
            }
        }
    });
});