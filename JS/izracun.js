/**
 * Created by Miro on 30.03.15..
 */
var cijena;
var potrosnja;
var brojKmh;

function calc() {
    cijena = document.moja.poc.value;
    potrosnja = document.moja.cok.value;
    brojKmh = document.forma.kilometar.value;

    if(brojKmh <= 0 || isNaN(Number(brojKmh)) ) {
        alert("Niste unijeli pravilan iznos!");
        document.forma.kilometar.value = "";
    }

    else {
        costs(parseFloat(cijena), parseFloat(potrosnja), parseFloat(brojKmh));
    }
}

function costs(cijena, potrosnja, brojKmh) {
    var trosak = (potrosnja/100) * brojKmh;
    var troskovi = trosak * cijena;

    document.getElementById('trosak').value = round(troskovi, 2);
}

//funkcija koja zaokružuje broj na dvije decimale
function round(broj, dec) {
    return (Math.round(broj*Math.pow(10,dec))/ Math.pow(10,dec)).toFixed(dec);
}