<?php

class YearToDay
{
    public function ay($str)
    {
        $date = strtolower($str);
        switch ($date):
            case 'january':
                return 0;
                break;
            case 'february':
                return 1;
                break;
            case 'march':
                return 2;
                break;
            case 'april':
                return 3;
                break;
            case 'may':
                return 4;
                break;
            case 'june':
                return 5;
                break;
            case 'july':
                return 6;
                break;
            case 'august':
                return 7;
                break;
            case 'september':
                return 8;
                break;
            case 'october':
                return 9;
                break;
            case 'november':
                return 10;
                break;
            case 'december':
                return 11;
                break;
        endswitch;
    }

    public function curl()
    {
        $url = "https://www.m5bilisim.com/tr/tarihte-bugun/_A/js/baglanti.php";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);;
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $headers = array();
        $headers["Content-Type"] = "application/x-www-form-urlencoded";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $date = date('F');
        $data = "gelentarih=" . $this->ay($date) . date('d') . 'a';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function tarih()
    {
        preg_match_all('#<td class="veriicerik">(.*?)</td>#si', $this->curl(), $olay);
        preg_match_all('#<td class="ilksutun">(.*?)</td>#si', $this->curl(), $tarih);

        for ($i = 0; $i < count($tarih[1]); $i++):
            $array[] = ['tarih' => $tarih[1][$i], 'olay' => $olay[1][$i]];
        endfor;
        $dosya = fopen('resp.json', 'w');
        fwrite($dosya, json_encode($array));
        fclose($dosya);
    }
}
