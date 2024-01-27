const period1 = document.querySelectorAll(".p1");
period1.forEach(function (item) {
    var checkBox = item.firstElementChild.checked ? 1 : 0;
    item.lastElementChild.value = checkBox;
    item.addEventListener('click', function () {
        var checkBox = item.firstElementChild.checked ? 1 : 0;
        item.lastElementChild.value = checkBox;

    });
});
const period2 = document.querySelectorAll(".p2");
period2.forEach(function (item) {
    var checkBox = item.firstElementChild.checked ? 1 : 0;
    item.lastElementChild.value = checkBox;
    item.addEventListener('click', function () {
        var checkBox = item.firstElementChild.checked ? 1 : 0;
        item.lastElementChild.value = checkBox;

    });
});
const period3 = document.querySelectorAll(".p3");
period3.forEach(function (item) {
    var checkBox = item.firstElementChild.checked ? 1 : 0;
    item.lastElementChild.value = checkBox;
    item.addEventListener('click', function () {
        var checkBox = item.firstElementChild.checked ? 1 : 0;
        item.lastElementChild.value = checkBox;
    });
});
const period4 = document.querySelectorAll(".p4");
period4.forEach(function (item) {
    var checkBox = item.firstElementChild.checked ? 1 : 0;
    item.lastElementChild.value = checkBox;
    item.addEventListener('click', function () {
        var checkBox = item.firstElementChild.checked ? 1 : 0;
        item.lastElementChild.value = checkBox;
    });
});
const period5 = document.querySelectorAll(".p5");
period5.forEach(function (item) {
    var checkBox = item.firstElementChild.checked ? 1 : 0;
    item.lastElementChild.value = checkBox;
    item.addEventListener('click', function () {
        var checkBox = item.firstElementChild.checked ? 1 : 0;
        item.lastElementChild.value = checkBox;

    });
});
const items = document.querySelectorAll('.item');
const subItem = document.querySelectorAll('.subItem');

items.forEach(function (item) {
    // console.log(item);
    item.addEventListener('click', function () {
        var periods = this.getAttribute("data-id");
        var period = document.querySelectorAll('.' + periods);

        removeActiveClasses();
        period.forEach(function (items) {
            items.classList.add('active');
        });
        item.classList.add('active');
    });
});
function removeActiveClasses() {
    items.forEach(function (item) {
        item.classList.remove('active');
    });
    subItem.forEach(function (item) {
        item.classList.remove('active');
    });
}