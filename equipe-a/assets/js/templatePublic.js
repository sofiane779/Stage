
const priceItem = document.getElementsByClassName('priceItem');
const qtItem = document.getElementsByClassName('qtItem');
const sousTotal = document.getElementsByClassName('sousTotal');
let sum = 0;

$('.qtItem').each(function (i) {
    console.log(localStorage.getItem(`q${i}`));
    if (localStorage.getItem(`q${i}`) <= 1) {
        localStorage.setItem(`q${i}`, 1);
        $(this).val(localStorage.getItem(`q${i}`));
    } else {
        $(this).val(localStorage.getItem(`q${i}`));
    }
    $(this).on('change', function () {
        getPrice();
    });
});

getPrice();

function getPrice() {
    sum = 0;
    for (let i = 0; i < priceItem.length; i++) {
        localStorage.setItem(`q${i}`, qtItem[i].value);
        sousTotal[i].innerText = (priceItem[i].value * localStorage.getItem(`q${i}`)).toFixed(2);
        sum += priceItem[i].value * localStorage.getItem(`q${i}`);
    };
    $('#totalG').text(sum.toFixed(2));

}
console.log(priceItem.length);