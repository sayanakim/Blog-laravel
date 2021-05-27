<?php

// первый способ сделать активную ссылку на ГЛАВНАЯ и КАТАЛОГ СТАТЕЙ

if (! function_exists('activeMainLink'))
{
    function activeMainLink()
    {
        if (request()->is('/'))
        {
            return 'menu-link__active';
        }
        return '';
    }
}



if (! function_exists('activeArticleLink'))
{
    function activeArticleLink()
    {
        if ((request()->is('articles') or request()->is('articles/*')))
        {
            return 'menu-link__active';
        }
        return '';
    }
}

// конец активной ссылки

if (! function_exists('true_wordform'))
{
    /*
     * $num - число от кот. будет зависеть форма слова
     * $form_for_1 - первая форма слова, напр. комментарий
     * $form_for_2 - вторая форма слова - комментария
     * $form_for_5 - третья форма слова - комментариев
     */

    function true_wordform($num, $form_for_0, $form_for_1, $form_for_2, $form_for_5)
    {
        $num = abs($num) % 100; // берем число по модулю и сбрасываем сотки(делим на 100, а остаток присваиваем перем. $num
        $num_x = $num % 10; // сбрасываем десятки и записываем в новую переменную
        if ($num == 0) // если число = 0
        {
            return $form_for_0;
        }
        if ($num > 10 && $num < 20) // если число придлежит отрезку 11-19
        {
            return $form_for_5;
        }
        if ($num_x > 1 && $num_x < 5) // если число оканчивается на 2, 3, 4
        {
            return $form_for_2;
        }
        if ($num_x == 1) // если число оканчивается на 1
        {
            return $form_for_1;
        }
        return $form_for_5;

    }
}
