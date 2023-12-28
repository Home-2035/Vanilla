<?php
require_once '../admin/connekt.php';
$sql = $mysqli->prepare("SELECT * FROM const");
$sql->execute();
$result = $sql->get_result();
$res = $result->fetch_assoc();
$sql->close();
$mysqli->close();
?>


<?php
$pageStyles = './../calculator/calculator.css';
require './../Header/Head.php';
?>

<body>
<?php require './../Header/Header.php'; ?>
<main class="main" id="main">
    <div class="container_home">
        <div class="home">
            <!-- {/* ЧАСТИ ДОМА */} -->
            <div class="roof">
                <img src="./pictures/roof.png" alt="roof" id="img_roof" />
                <img src="./pictures/roof_ready.png" alt="roof" id="img_roof_ready" />
            </div>
            <div class="floor1">
                <img src="./pictures/First-floor.png" alt="floor1" id="img_floor1" />
                <img src="./pictures/First-floor_ready.png" alt="floor1" id="img_floor1_ready" />
            </div>
            <div class="floor">
                <img src="./pictures/floor.png" alt="floor1" id="img_floor1" />
                <img src="./pictures/floor_ready.png" alt="floor" />
            </div>

            <div class="foundation">
                <img src="./pictures/Svai_JB.png" alt="floor" id="Svai_JB" />
                <img src="./pictures/Svai_Vint.png" alt="floor" id="Svai_Vint" />
            </div>
            <div class="nothing">
                <img src="./pictures/nothing.png" alt="err" id="nothing" />
            </div>
            <!-- {/* ЛИНИИ ВЫБОРА */} -->
            <div class="container_choice" id="wall">
                <div class="circle" id="circleWall"></div>
                <div class="line" id="lineWall"></div>
                <div class="Empty" id="emptyWall"></div>
            </div>

            <div class="container_choice" id="foundation">
                <div class="circle" id="circleFoundation"></div>
                <div class="line" id="lineFoundation"></div>
                <div class="Empty" id="emptyFoundation"></div>
            </div>
            <div class="container_choice" id="floor">
                <div class="Empty" id="emptyFloor"></div>
                <div class="line" id="lineFloor"></div>
                <div class="circle" id="circleFloor"></div>
            </div>
            <div class="container_choice" id="support">
                <div class="Empty" id="emptySupport"></div>
                <div class="line" id="lineSupport"></div>
                <div class="circle" id="circleSupport"></div>
            </div>
        </div>
        <div class="list">
            <div class="item">
                <div class="matherials_table">
                    <h4>Стоимость материалов дома</h4>
                    <div class="matherials_row"></div>
                    <div class="houseprice"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div>

        <!-- Модалка стен -->
        <div class="modalWall">
            <div class="modal_main">

                <h1>Высота потолка(стен)</h1>
                <button class='modal_btn' id="smallWall">2.5 метра</button>
                <button class='modal_btn' id="bigWall">2.8 метра</button>

                <div class="win2">
                    <div class="smallWall">
                        <h1 class="modalZag">Высота стены 2.5</h1>
                        <p class='modalDescr'>Экономичность: Помещение с потолком высотой 2.5 метра может быть более экономичным в плане использования материалов для отделки и отопления/охлаждения, так как объем помещения меньше.
                            <br> Уют и безопасность: Ниже потолок создает более уютную атмосферу и помогает уменьшить ветровые потоки, особенно в больших помещениях, обеспечивая ощущение комфорта и безопасности.<br />
                            вата - материал сделанный из натурального...
                        </p>

                        <div style="display: flex;">
                            <div class="contWall">
                                <h2>Материалы:</h2>
                                <ul>
                                    <li>СИП панели стен </li>
                                    <li>Пиломатериал на стены </li>
                                </ul>
                            </div>

                            <div class="matherialsWall">
                                <li id="sipPanel"></li>
                                <li id="pilomaterialWall"></li>
                            </div>
                        </div>

                        <div class="price">
                            <h3 id="smallWallPrice"></h3>
                            <button class="modal_btn" id="smallWallBtn" onclick="activeCircleLine('circleWall', 'lineWall', 'emptyWall')">Добавить</button>
                        </div>
                    </div>
                </div>




                <div class="win2">
                    <div class="bigWall">
                        <h1 class="modalZag">Высота стены 2.8</h1>
                        <p class='modalDescr'>Простор и свобода: Высокие потолки дают ощущение простора и свободы в помещении, делая его более величественным и впечатляющим.
                            <br> Комфорт в использовании: Помещение с потолком высотой 2.8 метров может быть более комфортным для проведения деятельности, требующей вертикального пространства, например, для подвешивания светильников или наличия высокой мебели.
                        </p>

                        <div style="display: flex;">
                            <div class="contWall">
                                <h2>Материалы:</h2>
                                <ul>
                                    <li>СИП панели стен </li>
                                    <li>Пиломатериал на стены </li>
                                </ul>
                            </div>

                            <div class="matherialsWall">
                                <li id="sipPanel1"></li>
                                <li id="pilomaterialWall1"></li>
                            </div>
                        </div>

                        <div class="price">
                            <h3 id="bigWallPrice"></h3>
                            <button class="modal_btn" id="bigWallBtn" onclick="activeCircleLine('circleWall', 'lineWall', 'emptyWall')">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- МОДАЛКА КРЫШИ -->
        <div class='modalFloor'>
            <div class="modal_main">
                <h1>Крыша</h1>
                <button class='modal_btn' id="flor">Кровля</button>
                <div class="win2">
                    <div class='flor'>
                        <h1 class="krov">Кровля</h1>
                        <p class='modalDescr'>Кровля — верхний элемент покрытия здания, подвергающийся атмосферным воздействиям. Главной её функцией является защита внутренних помещений от атмосферных осадков и воздействий. </p>
                        <div class="material">
                            <div class="contNames">
                                <h2>Материалы:</h2>
                                <ul>

                                    <li>Пиломатериал под кровлю</li>
                                    <li>Стоимость кровли из металлочерепицы</li>

                                </ul>
                            </div>

                            <div class="contConsts">
                                <li id="pil"></li>
                                <li id="metalCherepica"></li>
                            </div>
                        </div>
                        <div class="prices">
                            <h3 class="summ"></h3>
                            <button class="modal_btn" id="roofPrice" onclick="activeCircleLine('circleFloor', 'lineFloor', 'emptyFloor')">Добавить</button>



                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Модалка фундамента -->
        <div class='modalFoundation'>
            <div class="modal_main">
                <h1>Фундамент</h1>
                <button class='modal_btn' id="mineral">Винтовые сваи</button>
                <button class='modal_btn' id="penopolist">Железобетонные сваи</button>

                <!-- Вторая модалка mineral -->
                <div class="win2">
                    <div class='mineral'>
                        <h1 class="modalZag">Винтовые сваи</h1>
                        <p class='modalDescr'>Винтовая свая — свая, состоящая из металлического наконечника с лопастью или многовитковой спиралью и трубчатого металлического ствола, погружаемая в грунт методом завинчивания в сочетании с вдавливанием. </p>


                        <div class="material">
                            <div class="contName">
                                <h2>Материалы:</h2>
                                <ul>
                                    <li>Фундамент теплового контура</li>
                                    <li><?php echo $res["name"] ?></li>
                                    <li>Крыльцо</li>
                                    <li>Доставка фундамента</li>
                                </ul>
                            </div>

                            <div class="contConst">
                                <li id="fundCost"></li>
                                <li><?php echo $res['costPrice'] ?></li>
                                <li>10 000</li>
                                <li id="dostavkaSvai"></li>
                            </div>
                        </div>

                        <div class="price">
                            <h3 id="totalCost"></h3>
                            <button class="modal_btn" id="vintPricePlus" onclick="activeCircleLine('circleFoundation', 'lineFoundation', 'emptyFoundation')">Добавить</button>
                        </div>
                    </div>
                </div>

                <!-- Вторая модалка пенополист -->
                <div class="win2">
                    <div class='penopolist mineral'>
                        <h1 class="modalZag">Железобетонные сваи</h1>
                        <p class='modalDescr'> Железобетонные сваи - это конструкция вертикального или наклонного расположения, погружаемая в грунт, или формируемая уже в самом грунте – путем армирования и заливки скважины бетонным раствором.</p>


                        <div class="material">
                            <div class="contName">
                                <h2>Материалы:</h2>
                                <ul>
                                    <li>Фундамент теплового контура</li>
                                    <li>Фундамент крыльца</li>
                                    <li>Фундамент террасы</li>
                                    <li>Доставка фундамента</li>
                                </ul>
                            </div>

                            <div class="contConst">
                                <li id="jelezFundCost"></li>
                                <li>14 025</li>
                                <li>8 415</li>
                                <li>15 000</li>
                            </div>
                        </div>

                        <div class="price">
                            <h3 id="jelezTotalCost"></h3>
                            <button class="modal_btn" id="jelezPricePlus" onclick="activeCircleLine('circleFoundation', 'lineFoundation', 'emptyFoundation')">Добавить</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- обвязка -->
        <div class='modalStraping'>
            <div class="modal_main">
                <h1>Обвязка теплового контура</h1>

                <button class='modal_btn' id="vertObv">Обвязка вертикальная</button>
                <button class='modal_btn' id="gorizObv">Обвязка горизонтальная</button>

                <!-- Вторая модалка  -->
                <div class="win2">
                    <div class='frstObv'>

                        <h1 class="modalZag">Обвязка горизонтальная</h1>
                        <p class='modalDescr'>Применяется для горизонтальной обвязки на паллетах упаковок с стеклотарой,
                            стройматериалами (кирпич, плитка), сельхозпродукцией и др. при использовании упаковочных защитных уголков.</p>


                        <div class="price">
                            <h3 id="gorizTtl"></h3>
                            <button class="modal_btn" id="GorizObvDob" onclick="activeCircleLine('circleSupport', 'lineSupport', 'emptySupport')">Добавить</button>
                        </div>
                    </div>
                </div>

                <!-- Вторая модалка пенополист -->
                <div class="win2">
                    <div class='scndObv'>
                        <h1 class="modalZag">Обвязка вертикальная</h1>
                        <p class='modalDescr'>Вертикальная обвязка с использованием картонных защитных уголков применяется для
                            вертикальной обвязки на паллетах упаковок с гофрокартонными ящиками...</p>



                        <div class="material">
                            <div class="contName">


                                <div class="price">
                                    <h3 id="vertTtl"></h3>
                                    <button class="modal_btn" id="vertObvDob" onclick="activeCircleLine('circleSupport', 'lineSupport', 'emptySupport')">Добавить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</main>
<div id="CloseModal">
    <img id="CloseModalButt" src="pictures/close.png">
</div>
<div id="Finalsmeta">
    <div class="itog-flex">
        <div class="container">
            <p class="totalPrice">Стоимость составляющих</p>
            <p class="total-price">
                <span id="totalNumber"></span>
                <span class="currency">руб</span>
            </p>
            <button class="button" id="itogBtn" >Итоговая цена</button>
           
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="./circle.js"></script>
<script type="module" src='math.js'></script>
<script src="./../calculator/modal.js"></script>
<script src='./../main/slider.js'></script>
<script src='./../calculator/modalStage.js'></script>
<script src="./../calculator/send.js"></script>
</body>