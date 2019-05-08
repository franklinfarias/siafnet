<?php
/**
 * HtmlHelpers.php : PHP SIAFNET
 * Website: http://fksapiens.com.br/
 *
 * Copyright (c) 1999 - 2017 Franklin Farias <franklin@fksapiens.com.br>
 * All Rights Reserved.
 *
 * This software is released under the terms of the GNU Lesser General Public License v2.1
 * A copy of which is available from http://www.gnu.org/copyleft/lesser.html
 *
 * Written for PHP 5.4, should work with older PHP 4.x versions.
 *
 * Please submit bug reports, patches, etc to http://wiki.fksapiens.com.br/
 * Thanks. :)
 *
 *
 * @version 1.0
 */

// As funções declaradas aqui podem serem usadas nos templates (front-end)
if ( ! function_exists('time_elapsed_string'))
{
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => __('messages.year'),
            'm' => __('messages.month'),
            'w' => __('messages.week'),
            'd' => __('messages.day'),
            'h' => __('messages.hour'),
            'i' => __('messages.minute'),
            's' => __('messages.second'),
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . '' : 'just now';
    }
}

if ( ! function_exists('formatCpfCnpj'))
{
    function formatCpfCnpj($cpf_cnpj) {
        if (strlen($cpf_cnpj) <= 11){
            return substr($cpf_cnpj,0,3) . '.' . substr($cpf_cnpj,3,3) . '.' .
                    substr($cpf_cnpj,6,3) . '-' . substr($cpf_cnpj,9,2);
        } else {
            return substr($cpf_cnpj,0,2) . '.' . substr($cpf_cnpj,2,3) . '.' .
                    substr($cpf_cnpj,5,3) . '/' . substr($cpf_cnpj,8,4) . '-' .
                    substr($cpf_cnpj,12,2);
        
        }
    }
}

if ( ! function_exists('formatPhones'))
{
    function formatPhones($phones) {
        $fmt = '';
        if (!empty($phones)){
            $fmt .= '(' . substr($phones,0,2) . ')' . substr($phones,2,5) . '-' .
                substr($phones,7,4);
            if (strlen($phones) > 11){
                $fmt .= ' / (' . substr($phones,11,2) . ')' . substr($phones,13,5) . '-' .
                    substr($phones,18,4);
            }
        }
        return $fmt;
    }
}

if ( ! function_exists('formatCodeRegistry'))
{
    function formatCodeRegistry($code) {
        $fmt = '';
        if (!empty($code)){
            $fmt = substr($code,0,2) . '-' .
                substr($code,2,6) . '-' .
                substr($code,8,2);
        }
        return $fmt;
    }
}

if ( ! function_exists('formatDate'))
{
    function formatDate($date) {
        $fmt = '';
        if (!empty($date)){
            $fmt = preg_split('/-/', $date);
            if (\App::isLocale('br')){
                $fmt = $fmt[2] . '/' . $fmt[1] . '/' . $fmt[0];
            } else {
                $fmt = $fmt[1] . '/' . $fmt[2] . '/' . $fmt[0];
            }
        }
        return $fmt;
    }
}

if ( ! function_exists('formatCurrency'))
{
    function formatCurrency($currency) {
        $newValue = '0.00';
        if (!empty($currency)){
            if (\App::isLocale('br')){
                $newValue = number_format($currency, '2', ',', '.');
            } else {
                $newValue = number_format($currency, '2', '.', ',');
            }
        }
        return $newValue;
    }
}