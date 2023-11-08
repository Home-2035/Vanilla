export function roof(length, width) {
    let volumFlor = (length + width) * 2 * 0.15 * 0.05;

    // Объём пиламатериала на промежуточный мауэрлат и опоры под стропилами
    let volumPil = (length * 2) * (0.15 * (0.05 * 2));

    // высота кровли в коньке
    Math.radians = function (degrees) {
        return degrees * Math.PI / 180;
    }
    let heightKrov = (width / 2) * Math.tan(Math.radians(30));

    //   Стойки опорные под промежуточный мауэрлат
    let stoyka = ((length / 0.6 + 1) * 2 * (heightKrov / 2) * (0.15 * 0.05));

    // Длина ската 
    let lengthKrov = width / 2 / Math.cos(Math.radians(30)) + 0.5;
    lengthKrov = lengthKrov;

    // конёк соединительные доски
    let kon = (length * 3) * 0.15 * 0.05;

    // лобовые доски
    let lob = (length * 2 + lengthKrov * 2) * (0.15 * 0.05);

    // укосины
    let ykos = length * 2 * 0.15 * 0.05;

    // Объём
    let volum = (length / 0.6 + 1) * 2 * lengthKrov * 0.15 * 0.05 + kon + lob + ykos;

    // на запас
    let zapaz = 0.3;

    // Объём пиломатериала на стропильную систему
    let volumStrop = volum + volum * zapaz;

    // Объём досок на обрешетку
    let volumObreshotka = (lengthKrov / 0.35 + 2) * 2 * width * 0.15 * 0.025;

    // Объём пиломатериала на контробрешетку
    let volueKontrobreshotka = (length / 0.6 + 1) * 2 * lengthKrov * 0.05 * 0.05;

    // Стойки на фронтоны
    let stoykaFron = (width * 2 + lengthKrov * 2) * 1.5 * 0.15 * 0.05;

    // на запас2
    let zapaz2 = 0.1;

    // запас
    let itogZapas = (volumFlor + volumPil + stoyka + volumStrop + volumObreshotka + volueKontrobreshotka + stoykaFron) * zapaz2;

    // Объём пиломатериала под кровлю
    let volueKrov = (volumFlor + volumPil + stoyka + volumStrop + volumObreshotka + volueKontrobreshotka + stoykaFron + itogZapas);

    // Пиломатериал под кровлю
    let Pilomat = volueKrov * 24725;

    // Количество металлочерепицы ОШИБКА В СМЕТЕ
    let cherepica = (length + 0.5) * lengthKrov * 2;

    // Стоимость кровли из металлочерепицы
    let metalCherepica = cherepica * 2070;

    // Стоимость кровли
    let summ = Math.round(Pilomat + metalCherepica);
    document.getElementById("summ").innerHTML = summ + ' руб.';
    document.querySelector('.totalPriceRoof').innerHTML = summ + ' руб.';

    return summ;
}