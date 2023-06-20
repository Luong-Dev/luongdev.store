// let form = document.querySelector(".form");
// form.addEventListener("click", function(e) {
//     e.preventDefault();
//     var test = "<?php echo json_encode($a); ?>";
//     console.log(test);
// })

// @isset($page_number)
// const prev_page = document.querySelector('.js-prev-page');
// const next_page = document.querySelector('.js-next-page');
// let page_number = "<?php echo $page_number; ?>";
// let pagi_quantity = "<?php echo $pagi_quantity; ?>";
// page_number = Number(page_number)
// pagi_quantity = Number(pagi_quantity)
// // console.log(page_number)
// // console.log(pagi_quantity)
// prev_page.addEventListener('click', function(e) {
//     // console.log(location.href)
//     if (page_number > 1) {
//         location.href = `/admin/employees/` + (page_number - 1)
//     }
// })
// next_page.addEventListener('click', function(e) {
//     // console.log(location.href)
//     if (page_number < pagi_quantity) {
//         location.href = `/admin/employees/` + (page_number + 1)
//     } else {
//         location.href = `/admin/employees/` + (pagi_quantity)
//     }
// })
// @endisset