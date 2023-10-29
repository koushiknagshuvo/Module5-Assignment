// $(".sidebar ul li").on('click', function () {
//     $(".sidebar ul li.active").removeClass('active');
//     $(this).addClass('active');
// });

// $('.open-btn').on('click', function () {
//     $('.sidebar').addClass('active');

// });


// $('.close-btn').on('click', function () {
//     $('.sidebar').removeClass('active');

// })


function myDelete(lineToRemove) {
    swal({
      title: "Do You Want to delete user ?",
      text: "Delete",
      icon: "error",
      buttons: true,
      dangerMode: true,
    })
    .then((isOkay) =>{
      if(isOkay){
        window.location.href = "delete.php?data="+lineToRemove;
      }
    });
    return false;
}


function myEdit(information) {
    swal({
      title: "Do You Want to edit user ?",
      text: "Edit",
      icon: "error",
      buttons: true,
      dangerMode: true,
    })
    .then((isOkay) =>{
      if(isOkay){
        window.location.href = "edit.php?data="+information;
      }
    });
    return false;
}


function makeAdmin(lineNumber) {
    swal({
      title: "Do You Want to Make Admin ?",
      text: "Admin Change",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((isOkay) =>{
      if(isOkay){
        window.location.href = "make_admin.php?data="+lineNumber;
      }
    });
    return false;
}