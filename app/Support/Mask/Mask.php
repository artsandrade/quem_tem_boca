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
}
