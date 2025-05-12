$('.select-user').click(() => {
    $('.user-block-items').toggleClass('active');
    $('.icon-arrow').toggleClass('active-icon');
})

$('.icon-close').click(() => {
    $('.user-block-items').toggleClass('active');
    $('.icon-arrow').toggleClass('active-icon');
})

// 
var totalUsers = 1;
var userPresent = {
    adult: 1,
    child: 0
};

function addUser(value) {
    if (totalUsers == 8) {
        totalUsers = ++totalUsers;
        $("#total-user").text(totalUsers);
        $('.user-block-items .add-btn').attr('disabled', 'disabled');
        return false;
    } else {
        totalUsers = ++totalUsers;        
        switch (value) {
            case 'adult':
                userPresent.adult = userPresent.adult + 1;
                break;
            case 'child':
                userPresent.child = userPresent.child + 1;
                break;
            default:
                break;
        }
        $("#total-user").text(totalUsers);
        $('.user-block-items .add-btn').removeAttr('disabled');
        $('.user-block-items .minus-btn').removeAttr('disabled');        
    }
}

function minusUser() {
    if (totalUsers == 2) {
        totalUsers = --totalUsers;
        $("#total-user").text(totalUsers);

        return false;
    } else {
        totalUsers = --totalUsers;
        $("#total-user").text(totalUsers);
        $('.user-block-items .add-btn').removeAttr('disabled');
        $('.user-block-items .minus-btn').removeAttr('disabled');
    }    
}

$('.add-btn').click(function () {
    let currentNumberUser = Number($(this).siblings("div").text());
    currentNumberUser = currentNumberUser + 1;
    $(this).siblings("div").text(currentNumberUser)
    addUser($(this).data('value'))
});

$('.minus-btn').click( function () {
    let currentNumberUser = Number($(this).siblings("div").text());
    if (currentNumberUser == 0 || totalUsers == 1) {
        console.log('Bạn phải chọn số lượng ghế!');
        return false;
    } else {
        currentNumberUser = currentNumberUser - 1;
        $(this).siblings("div").text(currentNumberUser)
        minusUser()
        switch ($(this).data('value')) {
            case 'adult':
                userPresent.adult = userPresent.adult - 1;
                break;
            case 'child':
                userPresent.child = userPresent.child - 1;
                break;
            default:
                break;
        }
    }
});