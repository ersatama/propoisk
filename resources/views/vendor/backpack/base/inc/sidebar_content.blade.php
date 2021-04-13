<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-title"><span class="text-primary">Администратор</span></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('statistics') }}'><i class='nav-icon las la-chart-bar'></i> Статистика</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle font-weight-normal" href="#"><i class='nav-icon las la-user-edit'></i> Основное</a>
    <ul class="nav-dropdown-items">

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-users'></i> Пользователи</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('company') }}'><i class='nav-icon las la-building'></i> Компании</a></li>
    </ul>
</li>




<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle font-weight-normal" href="#"><i class='nav-icon las la-cogs'></i> Управление</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('settings') }}'><i class='nav-icon las la-cog'></i> Настройки</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('payments') }}'><i class='nav-icon las la-credit-card'></i> Платежи</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('api') }}'><i class='nav-icon las la-tools'></i> API</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle font-weight-normal" href="#"><i class='nav-icon las la-globe'></i> Местоположение</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('country') }}'><i class='nav-icon las la-flag'></i> Страны</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('region') }}'><i class='nav-icon las la-compass'></i> Регионы</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('city') }}'><i class='nav-icon las la-map-marker'></i> Города</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle font-weight-normal" href="#"><i class='nav-icon las la-bars'></i> Категорий</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon las la-bars'></i> Категорий</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('globalfilter') }}'><i class='nav-icon las la-filter'></i> Фильтр</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle font-weight-normal" href="#"><i class='nav-icon las la-ellipsis-h'></i> Разделы</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('subcategory') }}'><i class='nav-icon las la-ellipsis-h'></i> Разделы</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('filter') }}'><i class='nav-icon las la-filter'></i> Фильтр</a></li>
    </ul>
</li>

<li class="nav-title"><span class="text-primary">Модератор</span></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('advertising') }}'><i class='nav-icon las la-ad'></i> Реклама</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('announcement') }}'><i class='nav-icon las la-tasks'></i> Обьявление</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('task') }}'><i class='nav-icon las la-flag'></i> Задачи</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('notification') }}'><i class='nav-icon las la-bell'></i> Уведомление</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('chat') }}'><i class='nav-icon las la-comments'></i> Чат</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('support') }}'><i class='nav-icon las la-info-circle'></i> Служба поддержки</a></li>
