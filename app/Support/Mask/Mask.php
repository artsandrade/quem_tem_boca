<?php

namespace App\Support\Mask;

class Mask
{
  public function toPhoneHtml(string $number)
  {
    if (strstr($number, "*", true)) {
      $number = $number;
    } else {
      $number = str_replace(" ", "", $number);
      $number = str_replace("-", "", $number);
      $number = str_replace("(", "", $number);
      $number = str_replace(")", "", $number);
      $number = str_replace("/", "", $number);
      $number = str_replace(".", "", $number);
      $number = str_replace("+", "", $number);
      $number = str_replace(",", "", $number);


      $phone = substr($number, 0, 2);
      if ($phone == "08") {
        $phone1 = substr($number, 0, 4);
        $phone2 = substr($number, 4, 3);
        $phone3 = substr($number, 7, 4);
        $number = "" . $phone1 . "-" . $phone2 . "-" . $phone3;
        $number = trim($number);
      } else {
        if ((strlen($number) > 5) && (strlen($number) <= 10)) {
          $phone1 = substr($number, 0, 2);
          $phone2 = substr($number, 2, 8);
          $phone3 = substr($number, 2, 4);
          $phone4 = substr($number, 6, 4);
          $number = "(" . $phone1 . ") " . $phone3 . "-" . $phone4;
          $number = trim($number);
        } else if ((strlen($number) > 5) && (strlen($number) <= 12)) {
          $phone1 = substr($number, 0, 2);
          $phone2 = substr($number, 2, 8);
          $phone3 = substr($number, 2, 5);
          $phone4 = substr($number, 7, 6);
          $number = "(" . $phone1 . ") " . $phone3 . "-" . $phone4;
          $number = trim($number);
        } else {
          $number = $number;
        }
      }
    }
    $number = htmlentities($number);
    return $number;
  }

  public function removeCharacters(string $value)
  {
    $value = strtolower($value);
    $value = str_replace(" ", "", $value);
    $value = str_replace("/", "", $value);
    $value = str_replace(".", "", $value);
    $value = str_replace("-", "", $value);
    $value = str_replace(",", "", $value);
    $value = str_replace("=", "", $value);
    $value = str_replace("(", "", $value);
    $value = str_replace(")", "", $value);
    $value = str_replace("@", "", $value);
    $value = str_replace("*", "", $value);
    $value = str_replace(";", "", $value);
    $value = trim(strtoupper($value));
    return $value;
  }

  public static function toNumberDb($number)
  {
    $number = str_replace(".", "", $number);
    $number = str_replace(",", ".", $number);
    return $number;
  }

  public static function toNumberHtml($number)
  {
    return number_format($number, 2, ",", "");
  }

  public static function toWeekdayPt(string $weekday)
  {
    switch ($weekday) {
      case 'sunday':
        $weekday = 'Domingo';
        break;
      case 'monday':
        $weekday = 'Segunda-feira';
        break;
      case 'tuesday':
        $weekday = 'Terça-feira';
        break;
      case 'wednesday':
        $weekday = 'Quarta-feira';
        break;
      case 'thursday':
        $weekday = 'Quinta-feira';
        break;
      case 'friday':
        $weekday = 'Sexta-feira';
        break;
      case 'saturday':
        $weekday = 'Sábado';
        break;
      default:
        $weekday = 'Domingo';
        break;
    }

    return $weekday;
  }
}
