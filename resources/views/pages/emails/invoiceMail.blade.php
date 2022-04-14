<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice Mail</title>
        <style>
            body[yahoo] body{
                padding: 20px;
                font-family: sans-serif;
            }
            .text-bold {
                color: black;
                font-weight: 700;
            }
            .text-extra-bold {
                color: black;
                font-weight: 900;
            }
            body[yahoo].column-text {
                display: flex;
                flex-direction: column;
            }
            body[yahoo].row-text {
                display: flex;
                flex-direction: row;
            }
        </style>
    </head>
    <body yahoo>
        <h1>
            Invoice Spp
        </h1>

        @php
            // Convertion IDR to USD
            try {
                $req_url = "https://v6.exchangerate-api.com/v6/4de7938f23bbd34918b9c82c/latest/IDR";
                $response_json = file_get_contents($req_url);
                if(false !== $response_json) {
                    try {
                        $response = json_decode($response_json);
                            if('success' === $response->result) {
                                $base_price = $sppMonth->price;
                                $result = round(($base_price * $response->conversion_rates->USD), 2);
                            }
                        }
                    catch(Exception $e) {
                        dd('Convertion Failed!');
                    }
                }
            } catch (\Throwable $th) {
                echo 'an error occurred on the server';
            }
        @endphp

        <table>
            <tr>
                <td>
                    <div class="column-text">
                        <p class="text-bold">Student Name </p>
                        <p class="text-bold">Month</p>
                        <p class="text-bold">Program </p>
                        <p class="text-bold">Level </p>
                        <p class="text-bold">Status </p>
                        <p class="text-bold">Price Amount </p>
                    </div>
                </td>
                <td>
                    <div class="column-text">
                        <p class="">: {{$user->name}}</p>
                        <p class="">:
                            @if ($sppMonth->month == 1)
                                January
                            @elseif ($sppMonth->month == 2)
                                February
                            @elseif ($sppMonth->month == 3)
                                March
                            @elseif ($sppMonth->month == 4)
                                April
                            @elseif ($sppMonth->month == 5)
                                May
                            @elseif ($sppMonth->month == 6)
                                June
                            @elseif ($sppMonth->month == 7)
                                July
                            @elseif ($sppMonth->month == 8)
                                August
                            @elseif ($sppMonth->month == 9)
                                September
                            @elseif ($sppMonth->month == 10)
                                October
                            @elseif ($sppMonth->month == 11)
                                November
                            @elseif ($sppMonth->month == 12)
                                December
                            @endif
                        </p>
                        <p class="">: {{$program->name}}</p>
                        <p class="">: {{$level->name}}</p>
                        <p class="">: {{$sppMonth->status}}</p>
                        <p class="">: {{'Rp. '.number_format($sppMonth->price).' / $'.$result}}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="column-text">
                        <p class="text-bold">Total Payment </p>
                    </div>
                </td>
                <td>
                    <div class="column-text">
                        <p class="text-extra-bold">: {{'Rp. '.number_format($sppMonth->price).' / $'.$result}}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="button" style="padding: 0 20px 0 20px; font-size: 14px; font-weight: bold; font-family: sans-serif; text-align: center;" height="45">
                          <a style="text-decoration: none; color: #fff;" href="{{route('spp-payment', $sppMonth->id)}}">Pay Now</a>
                        </td>
                      </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
