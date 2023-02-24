$(document).ready(function() {
    $('#rupiah').maskMoney({
        prefix: 'Rp ',
        thousands: '.',
        decimal: ',',
        precision: 0
    });
});