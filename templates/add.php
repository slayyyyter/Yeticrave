
        <form class="form form--add-lot container <?= $form?>" action="../add.php" method="post"> <!-- form--invalid -->
            <h2>Добавление лота</h2>
            <div class="form__container-two">
                <div class="form__item <?= $err['lot_name'] ?? ""?>"> <!-- form__item--invalid -->
                    <label for="lot-name">Наименование <sup>*</sup></label>
                    <input id="lot-name" type="text" name="lot_name" placeholder="Введите наименование лота" value="<?= $_POST['lot_name']?>">
                    <span class="form__error">Введите наименование лота</span>
                </div>
                <div class="form__item <?= $err['catg_name']  ?? ""?>">
                    <label for="category">Категория <sup>*</sup></label>
                    <select id="category" name="category" value="<?=$_POST['catg_name']?>">
                        <option>Выберите категорию</option>
                        <?php
                        foreach($cat as $catd)
                        {
                            ?>
                            <option><?=$catd['catg_name']?></option>
                       <?php
                        }
                            ?>
                    </select>
                    <span class="form__error">Выберите категорию</span>
                </div>
            </div>
            <div class="form__item form__item--wide <?= $err['expl']  ?? ""?>">
                <label for="message">Описание <sup>*</sup></label>
                <textarea id="message" name="description" placeholder="Напишите описание лота"><?=$_POST['expl']?></textarea>
                <span class="form__error">Напишите описание лота</span>
            </div>
            <div class="form__item form__item--file">
                <label>Изображение <sup>*</sup></label>
                <div class="form__input-file">
                    <input name="image" class="visually-hidden" type="file" id="lot-img">
                    <label for="lot-img">
                        Добавить
                    </label>
                </div>
            </div>
            <div class="form__container-three">
                <div class="form__item form__item--small <?= $err['start_price']  ?? ""?>">
                    <label for="lot-rate">Начальная цена <sup>*</sup></label>
                    <input id="initial_price" type="text" name="initial_price" placeholder="0" value="<?=$_POST['start_price']?>">
                    <?= $message['start_price']  ?? ""?>
                </div>
                <div class="form__item form__item--small <?= $err['step']  ?? ""?>">
                    <label for="lot-step">Шаг ставки <sup>*</sup></label>
                    <input name="bid_step" id="lot-step" type="text" placeholder="0" value="<?=$_POST['step']?>">
                    <?= $message['step']  ?? ""?>
                </div>
                <div class="form__item <?= $err['end_date']  ?? ""?>">
                    <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
                    <input name="completion_date" class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="<?=$_POST['end_date']?>">
                    <?= $message['end_date']  ?? ""?>
                </div>
            </div>
            <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
            <button type="submit" class="button">Добавить лот</button>
        </form>
