<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receipt Mail</title>
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
            Receipt Spp
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
                                $base_price = $data->price;
                                $result = round(($base_price * $response->conversion_rates->USD), 2);
                            }
                        }
                    catch(Exception $e) {
                        dd('Convertion Failed!');
                    }
                }
            } catch (\Throwable $th) {
                dd('an error occurred on the server, check your network again');
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
                        <p class="">: {{$data->student->name}}</p>
                        <p class="">:
                            @if ($data->month == 1)
                                January
                            @elseif ($data->month == 2)
                                February
                            @elseif ($data->month == 3)
                                March
                            @elseif ($data->month == 4)
                                April
                            @elseif ($data->month == 5)
                                May
                            @elseif ($data->month == 6)
                                June
                            @elseif ($data->month == 7)
                                July
                            @elseif ($data->month == 8)
                                August
                            @elseif ($data->month == 9)
                                September
                            @elseif ($data->month == 10)
                                October
                            @elseif ($data->month == 11)
                                November
                            @elseif ($data->month == 12)
                                December
                            @endif
                        </p>
                        <p class="">: {{$data->level->program->name}}</p>
                        <p class="">: {{$data->level->name}}</p>
                        <p class="">: {{$data->status}}</p>
                        <p class="">: {{'Rp.'.number_format($data->price).' / $'.$result}}</p>
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
                        <p class="text-extra-bold">: {{'Rp.'.number_format($data->price).' / $'.$result}}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="column-text">
                        <p class="text-extra-bold">
                            Thank You So Much...
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
