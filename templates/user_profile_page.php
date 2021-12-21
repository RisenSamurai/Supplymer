



<section class="sections user-profile-section">
    <h1 class="user-profile-header">Личные данные</h1>

    <form class="checkout-form" method="post" action="">
        <fieldset class="checkout-field-contacts">
            <legend class="checkout-legend-contacts">Ваши контактные данные</legend>

            <div class="checkout-inputs-container">
                <div class="checkout-inputs-surname">
                    <label class="checkout-surname-label" for="checkout-user-surname">Фамилия</label>
                    <input class="checkout-input checkout-input-surname" type="text" name="surname"
                           id="checkout-user-surname"  required readonly value="Иванов">
                </div>

                <div class="checkout-inputs-surname">
                    <label class="checkout-name-label" for="checkout-user-name">Имя</label>
                    <input class="checkout-input checkout-input-name" type="text" name="first_name"
                           id="checkout-user-name"  required readonly value="Иван">
                </div>

                <div class="checkout-inputs-secondname">
                    <label class="checkout-secondname-label" for="checkout-user-secondname">Отчество</label>
                    <input class="checkout-input checkout-input-name" type="text" name="second_name"
                           id="checkout-user-secondname"  required readonly value="Иванович">
                </div>

                <div class="checkout-inputs-phone">
                    <label class="checkout-phone-label" for="checkout-user-phone">Номер телефона</label>
                    <input class="checkout-input checkout-input-name" type="tel" name="phone_number"
                           id="checkout-user-phone"  required
                           pattern="[0-9]{3}[0-9]{2}[0-9]{3}[0-9]{2}[0-9]{2}" autocomplete="on" readonly
                           value="380958237826">
                </div>

                <div class="checkout-inputs-secondname">
                    <label class="checkout-secondname-label" for="checkout-user-secondname">Email</label>
                    <input class="checkout-input checkout-input-name" type="email" name="email"
                           id="checkout-user-secondname"  required readonly value="example@gmail.com">
                </div>

                <div class="checkout-inputs-secondname">
                    <label class="checkout-secondname-label" for="checkout-user-secondname">Город</label>
                    <input class="checkout-input checkout-input-name" type="text" name="city"
                           id="checkout-user-secondname"  required readonly value="Киев">
                </div>


            </div>
        </fieldset>





    </form>


    <h1 class="user-profile-header">Заказы</h1>
    <div class="profile-order-container">
        <table class="orders-table">
            <thead></thead>
            <tbody>
            <tr>
                <th>
                    Дата
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Статус
                </th>
            </tr>
            <tr>
                <td>19.01.2021</td>
                <td>899</td>
                <td>Выполнен</td>

            </tr>
            <tr>
                <td>18.01.2021</td>
                <td>999</td>
                <td>Выполнен</td>

            </tr>

            </tbody>
        </table>
    </div>

</section>